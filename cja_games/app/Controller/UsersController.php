<?php
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
App::uses('AppController', 'Controller','sanitize');
App::uses('AuthComponent', 'Controller/Component');

App::uses('CakeEmail', 'Network/Email');
App::uses('Folder', 'Utility');

class UsersController extends AppController {

/**
 * Components
 * var $components = array('Email','Auth');
 * var array
 */
	public $components = array('Paginator','Email');
	// var $helpers = array('Html', 'Form');

/**
 * index method
 *
 * return void
	 */
   
    public function beforeFilter() {
    	//$this->Email->delivery = 'debug'; /* used to debug email message */
    	//$this->Email->delivery = 'smtp';
        parent::beforeFilter();
        $this->Auth->allow('add','activate'); 
    }
     

	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}


 	 public function login() {
        if ($this->request->is('Post')) {
            /* login and redirect to url set in app controller */

            if ($this->Auth->login()) {

            	 $results = $this->User->find('first',array('conditions' =>array('User.username' => $this->data['User']['username']), array('User.activate')));
                                // Check to see if the User's account isn't active
      			if ($results['User']['activate'] == 0) {
                    // Uh Oh!
                    $this->Session->setFlash('Tu cuenta no se a Activado Todavia. Tienes que Confirmar Tu cuenta');
                    $this->Auth->logout();
                    $this->redirect('/users/login');
	            }else{
					$this->Session->setFlash(__('Bienvenido(a)'. $this->Auth->user('username')));
					$this->redirect($this->Auth->redirectUrl());
					return 1;
	            }



            	
            }
            $this->Session->setFlash(__('Contraseña o Usuario Invalido, trata de nuevo'));
        }
    }

    public function logout() {
         /* logout and redirect to url set in app controller */
        return $this->redirect($this->Auth->logout());
    }

	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
 
	

	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
		
		if (empty($this->request->data['User']['activate'])) {
			$this->request->data['User']['activate'] = FALSE;
		}
		if (empty($this->request->data['User']['register_date'])) {
			$this->request->data['User']['register_date'] = NULL;
		}

		if($this->request->data['User']['password']==$this->request->data['User']['confirm_password']){

				
				$this->User->set($this->request->data);
				if ($this->User->validates()) {	
					$this->createU($this->request->data);
					$this->User->save($this->request->data);
					// SI HAY INTERNET Y SE CONFIGURO EMAIL, DESCOMENTAR LA SIGUIENTE LINEA PARA ENVIAR EL CORREO
					//$this->__sendActivationEmail($this->User->getLastInsertID());
					$this->Session->setFlash(__('El usuario A sido Registrado.Confirma Tu Cuenta Porfavor'));
					return $this->redirect(array('action' => 'login'));
				} else {
					$this->Session->setFlash(__('El Usuario No A sido Guardado.Porfavor Intenta de Nuevo'));
				}
			}else{
				$this->Session->setFlash(__('Confirma Bien tu Contraseña Porfavor'));

			}
		}
		$cities = $this->User->City->find('list');
		$carts = $this->User->Cart->find('list');
		$products = $this->User->Product->find('list');
		$this->set(compact('cities', 'carts', 'products'));
	}

	function createU($usern){
		new Folder(WWW_ROOT . "img\Users".DS.$usern["User"]["username"],true,0755);
		if (!empty($usern["User"]['img_perfil']['tmp_name'])) {
			// check file is uploaded
			if (!is_uploaded_file($usern["User"]['img_perfil']['tmp_name'])) {
				$this->request->data["User"]['img_perfil'] ="";
				return FALSE;
			}
			$filename = WWW_ROOT .'img\Users'.DS.$usern["User"]['username'].DS.'perfil.'.pathinfo($usern["User"]['img_perfil']['name'], PATHINFO_EXTENSION);
			$fileN='Users/'.$usern["User"]['username'].'/perfil.'.pathinfo($usern["User"]['img_perfil']['name'], PATHINFO_EXTENSION);
			if (!move_uploaded_file($usern["User"]['img_perfil']['tmp_name'], $filename)) {
				$this->request->data["User"]['img_perfil'] ="";
				return FALSE;
			} else {
				// save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
				$this->request->data["User"]['img_perfil'] =  $fileN ;		
			}
		}else{
			$this->request->data["User"]['img_perfil'] ="";
		}	
		
		return 1;

	}
	function deleteU($usuario){
		$dir = new Folder(WWW_ROOT . 'img\Users'.DS.$usuario);
		if($dir->delete())
			return 1;
		else
			return 0;

	}
	function editU($nameE,$nameN){
		$folder1 = new Folder(WWW_ROOT . 'img\Users'.DS.$nameE);
		$folder1->copy(WWW_ROOT . 'img\Users'.DS.$nameN);
		$folder1 = new Folder(WWW_ROOT . 'img\Users'.DS.$nameE);
		if ($folder1->delete()) return 1;
		else return 0;
	}

	function activate($user_id = null, $in_hash = null) {
 
      $this->User->id = $user_id;
	  

	  if ($this->User->exists() && ($in_hash == $this->User->getActivationHash())) {
	    if (empty($this->data)) {
	   
		    $u=$this->User->find('first',array('conditions' => array('User.id'=>$user_id)));
		    if($u['User']['activate']==false){
			    $this->User->id = $user_id;
				$this->User->set('activate', true);
			    $this->User->save();
			    $this->Session->setFlash('Tu Cuenta a sido Activada, porfavor Ingresa Abajo');
			    $this->redirect('login');
		    	
		    }else{
 				$this->Session->setFlash('Tu Cuenta ya estaba Activada, Si quieres Ingresa');
			    $this->redirect('login');
		    }
	    }
	  }else{
	  	
	  	$this->Session->setFlash('algo fallo');
		$this->redirect('login');
	  }
	   
	       // Activation failed, render '/views/user/activate.ctp' which should tell the user.
	 }


/* function to send activation email */
 	function __sendActivationEmail($user_id) {
        $user = $this->User->find('first', array('conditions' => array('User.id' => $user_id)));
		if ($user === false) {
                debug(__METHOD__." failed to retrieve User data for user.id: {$user_id}");
                return false;
        }
        // Set data for the "view" of the Email
        $this->set('activate_url', 'http://' . env('SERVER_NAME') . '/users/activate/' . $user['User']['id'] . '/' );
        $this->set('username', $this->data['User']['username']);


		$Email = new CakeEmail('gmail');
		$Email->from(array('me@example.com' => 'CJA_GAMES'));
	    $Email->to( $user['User']['email']);
	    $Email->subject('Cuenta CJA_GAMES – Porfavor Confirma Tu direccion De Correo Electronico');
	    $Email->template('user_confirm');
	    $Email->emailFormat('html');
	   	$Email->viewVars(array('activate_url'=>'http://' . env('SERVER_NAME') . '/cja_games/users/activate/' . $user['User']['id'] . '/'.$this->User->getActivationHash(),'username'=> $this->data['User']['username'],'user'=>$user));
	   
        if($Email->send()){
        	return true; 
        }else{

        	echo "error"; die();
        }
    }



/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$cities = $this->User->City->find('list');
		$carts = $this->User->Cart->find('list');
		$products = $this->User->Product->find('list');
		$this->set(compact('cities', 'carts', 'products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null,$name=null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->deleteU($name);
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
