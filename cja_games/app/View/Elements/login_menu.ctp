<?php 
 if(!$this->Session->check('Auth.User')){
  echo '<li>'.$this->html->link('Login','/login').'</li>';
  } else {
  // $username = $this->Session->read('Auth.User.username');
   $var=$this->Session->read();
   echo '<li>'.$this->html->link('My Profile', "/users/view/".$var['Auth']['User']['id'], array(), null, false).'</li>';
   echo '<li>'.$this->html->link("logout", "/logout", array(), null, false).'</li>';
  }
?>