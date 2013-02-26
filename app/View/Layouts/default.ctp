<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            BrmSklad:
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('cake.generic');
        echo $this->Html->script(array('jquery.min','jquery.dataTables.min'));
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <script type="text/javascript">
 	    var asInitVals = new Array();
            $(document).ready(function(){
                var oTable = $('#datatables').dataTable({iDisplayLength:50});
                $("thead input").keyup( function () {
                    /* Filter on the column (the index) of this element */
                    oTable.fnFilter( this.value, $("thead input").index(this) );
                } );
	
	
	
                /*
                 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
                 * the footer
                 */
                $("thead input").each( function (i) {
                    asInitVals[i] = this.value;
                } );
	
                $("thead input").focus( function () {
                    if ( this.className == "search_init" )
                    {
                        this.className = "";
                        this.value = "";
                    }
                } );
	
                $("thead input").blur( function (i) {
                    if ( this.value == "" )
                    {
                        this.className = "search_init";
                        this.value = asInitVals[$("thead input").index(this)];
                    }
                } );

            });
        </script>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1><?php echo $this->Html->image("brmlab.png",array("height" => "30px")); ?><?php echo $this->Html->link('  BrmSklad', "/"); ?></h1>
		<ul id="mainmenu">
			<li><?php echo $this->html->link('Items', "/items"); ?></li>
			<li><?php echo $this->html->link('Books', "/books"); ?></li>
			<li><?php echo $this->html->link('Users', "/users"); ?></li>
			<li><?php echo $this->html->link('Languages', "/languages"); ?></li>
		</ul>
		<br class="clear"/>
            </div>
            <div id="content">

                <?php echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
