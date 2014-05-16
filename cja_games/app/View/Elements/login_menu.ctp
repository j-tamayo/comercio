<?php 
 if(!$this->Session->check('Auth.User')){
  echo $this->html->link('Login','/login');
  } else {
   $username = $this->Session->read('Auth.User.username');
   $var=$this->Session->read();
   echo $this->html->link($username, "/users/view/".$var['Auth']['User']['id'], array(), null, false);
   echo $this->html->link("(logout)", "/logout", array(), null, false);
  }
?>