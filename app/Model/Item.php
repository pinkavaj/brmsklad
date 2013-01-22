<?php

class Item extends AppModel {

	var $belongsTo = array('User');
	var $order = "Item.barcode ASC";

}
