<?php 
 if(!$this->Session->check('Auth.User')){
  echo $this->html->link('Login','/login');
  } else {
   $username = $this->Session->read('Auth.User.username');
   echo " Hello ". $username ."&nbsp;";
   echo $this->html->link("(logout)", "/logout", array(), null, false);
  }
?>