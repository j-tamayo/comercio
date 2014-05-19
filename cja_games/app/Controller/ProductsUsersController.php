<?php
App::uses('AppController', 'Controller');
/**
 * ProductsUsers Controller
 *
 * @property ProductsUser $ProductsUser
 * @property PaginatorComponent $Paginator
 */
class ProductsUsersController extends AppController {

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
		$this->ProductsUser->recursive = 0;
		$this->set('productsUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProductsUser->exists($id)) {
			throw new NotFoundException(__('Invalid products user'));
		}
		$options = array('conditions' => array('ProductsUser.' . $this->ProductsUser->primaryKey => $id));
		$this->set('productsUser', $this->ProductsUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */

	public function buy($id = null) {
		$this->layout = 'layout1';
		Controller::loadModel('Product');
		$this->Product->id=$id;
		$p=$this->Product->read();

		$this->set('producto',$p);
		$this->set('valor',$p['Product']['price']);
		if ($this->request->is('post')) {
			$this->ProductsUser->create();
			debug($this->request->data);
			die();
			if ($this->ProductsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The products user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products user could not be saved. Please, try again.'));
			}
		}
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->ProductsUser->create();
			if ($this->ProductsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The products user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products user could not be saved. Please, try again.'));
			}
		}
		$users = $this->ProductsUser->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProductsUser->exists($id)) {
			throw new NotFoundException(__('Invalid products user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The products user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProductsUser.' . $this->ProductsUser->primaryKey => $id));
			$this->request->data = $this->ProductsUser->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProductsUser->id = $id;
		if (!$this->ProductsUser->exists()) {
			throw new NotFoundException(__('Invalid products user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProductsUser->delete()) {
			$this->Session->setFlash(__('The products user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The products user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
