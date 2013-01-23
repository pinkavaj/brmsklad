<?php

class ItemsController extends AppController {

	public $scaffold;
	public $paginate = array(
		'limit' => 1000,
		'maxLimit' => 1000
	);

        public function json_all(){
                die(json_encode($this->Item->find('all')));
        }

        public function json_find($id = null){
                if($id == null || !is_numeric($id)) die(json_encode(array("error"=>true)));
                else die(json_encode($this->Item->find('all',array('conditions'=>array('barcode ='=>$id)))));
        }

}
