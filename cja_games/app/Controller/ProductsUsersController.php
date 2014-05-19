<?php
/**
 * ProductsUsers Controller
 *
 * @property ProductsUser $ProductsUser
 * @property PaginatorComponent $Paginator
 */

App::uses('AppController', 'Controller','HttpSocket', 'Network/Http');

App::import('Utility', 'Xml');

class ProductsUsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Security', 'RequestHandler','Paginator');

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
	var $a=null;
	public function dispatch($id = null) {
		$this->layout = 'layout1';
		Controller::loadModel('Product');
		$this->Product->id=$id;
		$p=$this->Product->read();

		$this->set('producto',$p);
		$this->set('valor',$p['Product']['price']);
		if ($this->request->is('post')) {
			$this->ProductsUser->create();
			$this->request->data['ProductsUser']['product_id']=$id;
			$this->request->data['ProductsUser']['user_id']=$this->Session->read('Auth.User.id');
			$this->request->data['ProductsUser']['status']=$id;
			$this->request->data['ProductsUser']['date']=null;
			$this->request->data['ProductsUser']['total']=$this->request->data['ProductsUser']['quantity']*$p['Product']['price'];
			if ($this->ProductsUser->validates()){
				$response_dispatch=$this->dispatch_service($p,$this->request->data);
				$this->request->data['ProductsUser']['costo_envio']=$response_dispatch['respuesta']['costo'];
				$this->request->data['ProductsUser']['total']=$this->request->data['ProductsUser']['total']+$response_dispatch['respuesta']['costo'];
				$this->ProductsUser->save($this->request->data);
				
				return $this->redirect(array('action' => 'buy/'.$this->ProductsUser->getLastInsertID().'/'.$response_dispatch['respuesta']['fechaEntrega']));
			} else {
				$this->Session->setFlash(__('The buy could not be finished. Please, try again.'));
			}
		}
	}

	public function buy($id=null,$fecha=null) {
		
		$this->layout = 'layout1';
		$this->ProductsUser->id=$id;
		$p=$this->ProductsUser->read();
		$total=$p['ProductsUser']['total'];
		$this->set('costo',$p['ProductsUser']['costo_envio']);
		$this->set('valor',$total);
		$this->set('fecha',$fecha);

		if ($this->request->is('post')) {
			$this->ProductsUser->create();
			if ($this->ProductsUser->validates()){
				$response_pay=$this->payment_service($id,$total,$this->request->data);
 	
		         if($response_pay['respuesta']['statuses']['status']=='1000'){
					$this->Session->setFlash(__('The buy has finished with Success.'));
					return $this->redirect(array('controller'=>'Principal','action' => 'index'));
		         }else{
			       	if($response_pay['respuesta']['statuses']['status']=='2000'){
						$this->Session->setFlash(__('Lo lamentamos pago Rechazado.Porfavor Trata De nuevo'));
			         }else{
			         	if($response_pay['respuesta']['statuses']['status']=='2001'){
							$this->Session->setFlash(__('Lo lamentamos tarjeta bloqueada.Porfavor Trata De nuevo'));
						}
			         }
				}
				

			//	$this->ProductsUser->save($this->request->data);
			} else {
				$this->Session->setFlash(__('The buy could not be finished. Please, try again.'));
			}
		}
	}



 public function payment_service($id,$total,$data){
        
      
          
            $xml_array = array();
            $xml_array['pago']['solicitudPago']['id'] = $id;
            $xml_array['pago']['solicitudPago']['comercio'] = array(
                'rif'   => 'J-12345678',
                'nombre'=> 'CJA Games',
                'cuenta'=> '210098765422192312'
            );
            $xml_array['pago']['solicitudPago']['datosmetodo_pago']['monto'] = $total;
            $xml_array['pago']['solicitudPago']['datosmetodo_pago']['nombrePagador'] = $this->Session->read('Auth.User.name');
            $xml_array['pago']['solicitudPago']['datosmetodo_pago']['apellidoPagador'] = $this->Session->read('Auth.User.lastname');	
            $xml_array['pago']['solicitudPago']['datosmetodo_pago']['nroTDC'] = $data['ProductsUser']['creditCard'];
            $xml_array['pago']['solicitudPago']['datosmetodo_pago']['cvcTDC'] = $data['ProductsUser']['cvc'];
            $xml_array['pago']['solicitudPago']['datosmetodo_pago']['vencimientoTDC'] = $data['ProductsUser']['creditCard'];
			
		
  			 $xml =  Xml::fromArray( $xml_array, array('format' => 'tags'));
	         $link = 'http://192.168.1.113:8000/wseps/solicitud';
	       	 $httpSocket = new HttpSocket();
	       	 $options = array( 
	            'header' => array( 
	                'Accept' => 'application/xml', 
	                'Content-Type' => 'application/xml' 
	            ) 
	        );

	       	  $response2=array();
		        $response2['respuesta']['id']=1;
		        $response2['respuesta']['statuses']['status']='2001';
		   		$xmlPrueb =  Xml::fromArray($response2, array('format' => 'tags'));

		        $xmlString = $xmlPrueb->asXML();//aqui colocamos el xml a transformar a array
				$response = Xml::toArray(Xml::build($xmlString));
				return $response;
      
         		 $response = $httpSocket->post($link, $xml->asXML(), $options);
       
    }




 public function dispatch_service ($pro,$data){

 	debug($pro);
 	debug($data);
 	
        /*$http = new HttpSocket();
		$response = $http->post('http://192.168.1.113:8000/wseps/solicitud');
		echo '<pre>';print_r($response);die;*/

        //$xml = Xml::build('http://bakery.cakephp.org/articles.rss', array('return' => 'simplexml'));
        // $xml now is a instance of SimpleXMLElement
        $message_text = array();

        $message_text['despacho']['id'] = 1;

        $message_text['despacho']['comercio'] = array(
            'rif'   => 'J-12345678',
            'nombre'=> 'CJA Games'
        );

        //echo '<pre>';print_r($products);die; 

       /* foreach($products as $product){
            $message_text['despacho']['productos'] = $product['Product'];
        }*/
        $message_text['despacho']['productos']['producto'] = array(
            'id'        => $pro['Product']['id'],
            'nombre'    => $pro['Product']['name'],
            'cantidad'  => $data['ProductsUser']['quantity'],
            'medidas'   => array(
                'peso'  => 1000*$data['ProductsUser']['quantity'],
                'largo' => 20*$data['ProductsUser']['quantity'],
                'ancho' => 20*$data['ProductsUser']['quantity'],
                'alto'  => 20*$data['ProductsUser']['quantity']
            )
        );

        $message_text['despacho']['datosEnvio'] = array(
            'nombreDestinatario'=> $this->Session->read('Auth.User.name').' '.$this->Session->read('Auth.User.lastname'),
            'telefonos'         => array(
                'telefonoContacto' => $data['ProductsUser']['telephone']
            ),
            'direccion'         => $data['ProductsUser']['direccion'],
            'zip'               => $data['ProductsUser']['zip'],
            'ciudad'            => $data['ProductsUser']['city'],
            'pais'              => $data['ProductsUser']['country']
        );

       // echo '<pre>';print_r($message_text);die;
        $xml =  Xml::fromArray($message_text, array('format' => 'tags'));
        //echo '<pre>';print_r($xml->asXML());die;
        $link = 'http://192.168.1.113:8000/wseps/solicitud';
        $httpSocket = new HttpSocket();
        $options = array( 
            'header' => array( 
                'Accept' => 'application/xml', 
                'Content-Type' => 'application/xml' 
            ) 
        );
		        //Old method:
		
        $response2=array();
        $response2['respuesta']['costo']=70;
        $response2['respuesta']['fechaEntrega']='2014-05-20';
        $response2['respuesta']['tracking']=70;
        $response2['respuesta']['estado']='despacho';
   		$xmlPrueb =  Xml::fromArray($response2, array('format' => 'tags'));

        $xmlString = $xmlPrueb->asXML();//aqui colocamos el xml a transformar a array
		$response = Xml::toArray(Xml::build($xmlString));
		return $response;
       
        $response = $httpSocket->post($link, $xml->asXML(), $options);
       
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
