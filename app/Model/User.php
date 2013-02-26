<?php

class User extends AppModel {

	var $hasMany = array('Item','Book');
	var $order = "User.name ASC";

}
