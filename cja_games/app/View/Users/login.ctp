<div class="users form">
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo 'hola ';

//print_r($this->Session->read());

	echo $this->Session->flash('auth'); 
	echo $this->form->create('User');
	echo $this->form->input('username');
	echo $this->form->input('password');
	echo $this->form->end(__('Login'));


?></div>