<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Scaffolds
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="<?php echo $pluralVar; ?> index">
<h2><?php echo $pluralHumanName; ?></h2>
<table cellpadding="0" cellspacing="0" id="datatables">
<thead>
<?php foreach ($scaffoldFields as $_field): ?>
	<?php if($_field == "id") continue; ?>
	<th><?php echo $_field; ?><br/><input class="search_init" type="text" name="<?php echo $_field; ?>" /></th>
<?php endforeach; ?>
	<th><?php echo __d('cake', 'Actions'); ?></th>
</thead>
<?php
foreach (${$pluralVar} as ${$singularVar}):
	echo '<tr>';
		foreach ($scaffoldFields as $_field) {
			if($_field == "id") continue;
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $_alias => $_details) {
					if ($_field === $_details['foreignKey']) {
						$isKey = true;
						echo '<td>' . $this->Html->link(${$singularVar}[$_alias][$_details['displayField']], array('controller' => $_details['controller'], 'action' => 'view', ${$singularVar}[$_alias][$_details['primaryKey']])) . '</td>';
						break;
					}
				}
			}
			if ($isKey !== true) {
				$value = h(${$singularVar}[$modelClass][$_field]);
				if(is_numeric($value)) $value = sprintf("%03d", $value);
				echo '<td>' . $value . '</td>';
			}
		}

		echo '<td class="actions">';
		echo $this->Html->link(__d('cake', 'View'), array('action' => 'view', ${$singularVar}[$modelClass][$primaryKey]));
		echo ' ' . $this->Html->link(__d('cake', 'Edit'), array('action' => 'edit', ${$singularVar}[$modelClass][$primaryKey]));
		echo ' ' . $this->Form->postLink(
			__d('cake', 'Delete'),
			array('action' => 'delete', ${$singularVar}[$modelClass][$primaryKey]),
			null,
			__d('cake', 'Are you sure you want to delete').' #' . ${$singularVar}[$modelClass][$primaryKey]
		);
		echo '</td>';
	echo '</tr>';

endforeach;

?>
<tfoot>
<?php foreach ($scaffoldFields as $_field): ?>
        <?php if($_field == "id") continue; ?>
        <th><?php echo $_field; ?></th>
<?php endforeach; ?>
        <th><?php echo __d('cake', 'Actions'); ?></th>
</tfoot>
</table>
</div>
<div class="actions">
	<h3><?php echo __d('cake', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('cake', 'New %s', $singularHumanName), array('action' => 'add')); ?></li>
<?php
		$done = array();
		foreach ($associations as $_type => $_data) {
			foreach ($_data as $_alias => $_details) {
				if ($_details['controller'] != $this->name && !in_array($_details['controller'], $done)) {
					echo '<li>';
					echo $this->Html->link(
						__d('cake', 'List %s', Inflector::humanize($_details['controller'])),
						array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'index')
					);
					echo '</li>';

					echo '<li>';
					echo $this->Html->link(
						__d('cake', 'New %s', Inflector::humanize(Inflector::underscore($_alias))),
						array('plugin' => $_details['plugin'], 'controller' => $_details['controller'], 'action' => 'add')
					);
					echo '</li>';
					$done[] = $_details['controller'];
				}
			}
		}
?>
	</ul>
</div>
