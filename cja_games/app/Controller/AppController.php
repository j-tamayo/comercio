<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Folder', 'Utility');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('DebugKit.Toolbar',
		'Session', 
		'Auth' => array(
			
            'loginRedirect' => array('controller' => 'Principal', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'Principal', 'action' => 'index'),
            'authError' => 'Deberias Ingresar',
			'loginError' => 'Contraseña o Usuario Invalidos, Trata de nuevo',
		
        ));
	public $layout = 'layout';

	function beforeFilter() {
		 
		//$this->Auth->autoRedirect = ; /* this allows us to run further checks on login() action.*/
		$this->Auth->allow('register', 'index', 'view', 'edit','login','logout', 'dispatch'); 
		//$this->Auth->fields = array('username' => 'username', 'password' => 'password');
		//$this->Auth->userScope = array('User.is_banned' => 0); /* admin can ban a user by updating `is_banned` field of users table to '1' */
	}

      public function isAuthorized($user) {
		// Here is where we should verify the role and give access based on role
		
		return true;
	}
	
}
