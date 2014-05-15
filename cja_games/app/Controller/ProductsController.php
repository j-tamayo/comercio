<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			$this->request->data['Product']['image']="";
			debug($this->request->data);
			die();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El Producto no se pudo guardar.Porfavor Intenta De nuevo'));
			}
		}
		$categories = $this->Product->Category->find('list');
		$carts = $this->Product->Cart->find('list');
		$promotions = $this->Product->Promotion->find('list');
		$users = $this->Product->User->find('list');
		$this->set(compact('categories', 'carts', 'promotions', 'users'));
	}


function createP($Producto){
		new Folder(WWW_ROOT . "img\Users".DS.$Producto["User"]["username"],true,0755);
		if (!empty($Producto["Product"]['img_perfil']['tmp_name'])) {
			// check file is uploaded
			if (!is_uploaded_file($Producto["Product"]['img_perfil']['tmp_name'])) {
				return FALSE;
			
			$filename = WWW_ROOT .'img\Users/'.$Producto["Product"]['username'].'/perfil.'.pathinfo($Producto["Product"]['img_perfil']['name'], PATHINFO_EXTENSION);
		
			if (!move_uploaded_file($Producto["Product"]['img_perfil']['tmp_name'], $filename)) {
				return FALSE;
			} else {
				// save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
				$this->request->data["Product"]['img_perfil'] =  $filename ;		
			}
		}	
		return 1;

	}
}
	function deleteP($usuario){
		$dir = new Folder(WWW_ROOT . 'img/Users/'.$usuario);
		if($dir->delete())
			return 1;
		else
			return 0;

	}
	function editP($nameE,$nameN){
		$folder1 = new Folder(WWW_ROOT . 'img/Users/'.$nameE);
		$folder1->copy(WWW_ROOT . 'img/Users/'.$nameN);
		$folder1 = new Folder(WWW_ROOT . 'img/Users/'.$nameE);
		if ($folder1->delete()) return 1;
		else return 0;
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
		$categories = $this->Product->Category->find('list');
		$carts = $this->Product->Cart->find('list');
		$promotions = $this->Product->Promotion->find('list');
		$users = $this->Product->User->find('list');
		$this->set(compact('categories', 'carts', 'promotions', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('The product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
