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
	public function index($flag = true) {
	
		if (!$flag){
			$this->Product->recursive = 0;
			$this->set('products', $this->Paginator->paginate());
		}else{
			$this->set('products', $this->Paginator->paginate());
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
			$this->Product->set($this->request->data);
			if ($this->Product->validates()){
				$v=$this->createP($this->request->data);
				$this->Product->save($this->request->data);
				$this->Session->setFlash(__('The product has been saved.'.$v));
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


function createP($data){
		$categoria=$this->Product->Category->find('first',array('conditions' => array('Category.id'=>$data['Product']['category_id'])));
		$nombreP=$data['Product']['name'];
		$dirB="Games_Categories/".$categoria["Category"]["name"].'/'.$nombreP.'/';
		$dir=new Folder(WWW_ROOT . "img\Games_Categories".DS.$categoria["Category"]["name"].DS.$nombreP,true,0755);
		if (!empty($data["Product"]['image']['tmp_name'])) {
			// check file is uploaded
			if (!is_uploaded_file($data["Product"]['image']['tmp_name'])) {
				$this->request->data["Product"]['image'] ="";
				return FALSE;
			}
			

			$filename = $dir->path.DS.'game_0.'.pathinfo($data["Product"]['image']['name'], PATHINFO_EXTENSION);
		
			if (!move_uploaded_file($data["Product"]['image']['tmp_name'], $filename)) {
				$this->request->data["Product"]['image'] ="";
				return FALSE;
			} else {
				// save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
				$this->request->data["Product"]['image'] =  $dirB.'game_0.'.pathinfo($data["Product"]['image']['name'], PATHINFO_EXTENSION);		
			}
		}else{
			$this->request->data["Product"]['image'] ="";
			return FALSE;
		}	
		
		return true;
}
	function deleteP($cate,$Produ){
		$dir = new Folder(WWW_ROOT . 'img/Games_Categories/'.$cate.'/'.$Produ);
		debug($dir);
		debug($cate);
		debug($Produ);
		if($dir->delete())
			return 1;
		else
			return 0;

	}
	function editP($nameCV=null,$nameCN=null,$namePV=null,$namePN=null){

		if($nameCN==null){
			$folder1 = new Folder(WWW_ROOT . 'img/Games_Categories/'.$nameCV.'/'.$namePV);
			$folder1->copy(WWW_ROOT . 'img/Games_Categories/'.$nameCV.'/'.$namePN);
			$folder1 = new Folder(WWW_ROOT . 'img/Games_Categories/'.$nameCV.'/'.$namePV);
			$files = $folder1->find('.*');
			$this->request->data['Product']['image']='Games_Categories/'.$nameCV.'/'.$namePN.'/'.$files[0];
			if ($folder1->delete()) return 1;
			else return 0;
		}elseif($namePN==null){
			$folder1 = new Folder(WWW_ROOT . 'img/Games_Categories/'.$nameCV.'/'.$namePV);
			$folder1->copy(WWW_ROOT . 'img/Games_Categories/'.$nameCN.'/'.$namePV);
			$folder1 = new Folder(WWW_ROOT . 'img/Games_Categories/'.$nameCV.'/'.$namePV);
			$files = $folder1->find('.*');
			$this->request->data['Product']['image']='Games_Categories/'.$nameCN.'/'.$namePV.'/'.$files[0];
			if ($folder1->delete()) return 1;
			else return 0;
		}else{
			$folder1 = new Folder(WWW_ROOT . 'img/Games_Categories/'.$nameCV.'/'.$namePV);
			$folder1->copy(WWW_ROOT . 'img/Games_Categories/'.$nameCN.'/'.$namePN);
			$folder1 = new Folder(WWW_ROOT . 'img/Games_Categories/'.$nameCV.'/'.$namePV);
			$files = $folder1->find('.*');
			$this->request->data['Product']['image']='Games_Categories/'.$nameCN.'/'.$namePN.'/'.$files[0];
			
			if ($folder1->delete()) return 1;
			else return 0;
		}	

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null,$name=null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$var=$this->Product->find('first',array('conditions' => array('Product.id'=>$id)));
			
		$this->set('img', $var['Product']['image']);
		
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->validates()) {
				$var2=$this->Product->Category->find('first',array('conditions' => array('Category.id'=>$this->request->data['Product']['category_id'])));
				if($var['Product']['category_id']!=$this->request->data['Product']['category_id']){
					if($name!=$this->request->data['Product']['name'])
						$this->editP($var['Category']['name'],$var2['Category']['name'],$name,$this->request->data['Product']['name']);
					else
						$this->editP($var['Category']['name'],$var2['Category']['name'],$name,null);
				}else{
						if($name!=$this->request->data['Product']['name'])
						$this->editP($var['Category']['name'],null,$name,$this->request->data['Product']['name']);
				
				}
				$this->Product->save($this->request->data);
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
	public function delete($id = null,$c=null,$p=null) {
		$this->Product->id = $id;
		$ca=$this->Product->Category->find('first',array('conditions' => array('Category.id'=>$c)));
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Product->delete()) {
			$v=$this->deleteP($ca['Category']['name'],$p);
			$this->Session->setFlash(__('The product has been deleted.'.$v));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
