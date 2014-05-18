<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PrincipalController extends AppController{
 	
	public function index(){
	
		/*if ($page=='principal'){
			$this->set('Principal', 'layout');
		}*/
		$this->render('principal', 'layout1');
	}
}


?>