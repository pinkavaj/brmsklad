<?php

class Language extends AppModel {

	var $displayField = "language";
	var $hasMany = array('Book');

}
