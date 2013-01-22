<?php

class User extends AppModel {

	var $hasMany = array('Item');
	var $order = "User.name ASC";

}
