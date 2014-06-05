<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

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
	public function index($flag = true) {
	
		if(!$flag){
		$this->Category->recursive = 0;
		$this->set('categories', $this->Paginator->paginate());
		}else{
		$this->set('categories', $this->Paginator->paginate());
		$this->render('user_view', 'layout1');
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}
	
	public function user_view($id = null) {
		$this->loadModel('Product');

		$products = $this->Product->find('all', array(
        	'conditions' => array('Product.category_id' => $id),
    	));
		/*print_r($products);die;*/

		$this->set('products', $products);
		$this->render('user_view', 'layout1');
	
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved.'));
				$this->createC($this->request->data['Category']['name']);
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La categoria no pudo ser guardada.Porfavor Trata de nuevo.'));
			}
		}
	}

	function createC($category){
		$dir = new Folder(WWW_ROOT . 'img/Games_Categories/'.$category,true,0755);
		return 1;

	}

	function deleteC($category){
		$dir = new Folder(WWW_ROOT . 'img/Games_Categories/'.$category);
		if($dir->delete())
			return 1;
		else
			return 0;

	}
	function editFile($nameE,$nameN){
		$folder1 = new Folder(WWW_ROOT . 'img/Games_Categories/'.$nameE);
		$folder1->copy(WWW_ROOT . 'img/Games_Categories/'.$nameN);
		$folder1 = new Folder(WWW_ROOT . 'img/Games_Categories/'.$nameE);
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
	public function edit($id = null,$name) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				if($name!=$this->request->data['Category']['name'])
					$this->editFile($name,$this->request->data['Category']['name']);
				$this->Session->setFlash(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null,$name=null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}

		$this->request->onlyAllow('post', 'delete');
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('The category has been deleted.'));
			$this->deleteC($name);
		} else {
			$this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
