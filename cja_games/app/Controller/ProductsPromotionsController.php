<?php
App::uses('AppController', 'Controller');
/**
 * ProductsPromotions Controller
 *
 * @property ProductsPromotion $ProductsPromotion
 * @property PaginatorComponent $Paginator
 */
class ProductsPromotionsController extends AppController {

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
		$this->ProductsPromotion->recursive = 0;
		$this->set('productsPromotions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProductsPromotion->exists($id)) {
			throw new NotFoundException(__('Invalid products promotion'));
		}
		$options = array('conditions' => array('ProductsPromotion.' . $this->ProductsPromotion->primaryKey => $id));
		$this->set('productsPromotion', $this->ProductsPromotion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProductsPromotion->create();
			if ($this->ProductsPromotion->save($this->request->data)) {
				$this->Session->setFlash(__('The products promotion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products promotion could not be saved. Please, try again.'));
			}
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
		if (!$this->ProductsPromotion->exists($id)) {
			throw new NotFoundException(__('Invalid products promotion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProductsPromotion->save($this->request->data)) {
				$this->Session->setFlash(__('The products promotion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The products promotion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProductsPromotion.' . $this->ProductsPromotion->primaryKey => $id));
			$this->request->data = $this->ProductsPromotion->find('first', $options);
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
		$this->ProductsPromotion->id = $id;
		if (!$this->ProductsPromotion->exists()) {
			throw new NotFoundException(__('Invalid products promotion'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProductsPromotion->delete()) {
			$this->Session->setFlash(__('The products promotion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The products promotion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
