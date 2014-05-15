<?php
App::uses('AppController', 'Controller');
/**
 * CreditCards Controller
 *
 * @property CreditCard $CreditCard
 * @property PaginatorComponent $Paginator
 */
class CreditCardsController extends AppController {

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
		$this->CreditCard->recursive = 0;
		$this->set('creditCards', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CreditCard->exists($id)) {
			throw new NotFoundException(__('Invalid credit card'));
		}
		$options = array('conditions' => array('CreditCard.' . $this->CreditCard->primaryKey => $id));
		$this->set('creditCard', $this->CreditCard->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CreditCard->create();
			if ($this->CreditCard->save($this->request->data)) {
				$this->Session->setFlash(__('The credit card has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The credit card could not be saved. Please, try again.'));
			}
		}
		$users = $this->CreditCard->User->find('list');
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
		if (!$this->CreditCard->exists($id)) {
			throw new NotFoundException(__('Invalid credit card'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CreditCard->save($this->request->data)) {
				$this->Session->setFlash(__('The credit card has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The credit card could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CreditCard.' . $this->CreditCard->primaryKey => $id));
			$this->request->data = $this->CreditCard->find('first', $options);
		}
		$users = $this->CreditCard->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CreditCard->id = $id;
		if (!$this->CreditCard->exists()) {
			throw new NotFoundException(__('Invalid credit card'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CreditCard->delete()) {
			$this->Session->setFlash(__('The credit card has been deleted.'));
		} else {
			$this->Session->setFlash(__('The credit card could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
