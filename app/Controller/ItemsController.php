<?php

class ItemsController extends AppController {

	public $scaffold;
	public $paginate = array(
		'limit' => 1000,
		'maxLimit' => 1000
	);

}
