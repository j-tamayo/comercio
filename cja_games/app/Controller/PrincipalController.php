<?php
App::uses('AppController', 'Controller');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PrincipalController extends AppController{
 	
	public function index(){
		$this->layout = 'layout1';
		Controller::loadModel('Product');
		$productos=$this->Product->find('all',array('limit' => 7));
		$this->set('productos',$productos);
		
	}
}


?>