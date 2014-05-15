<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
App::import('Utility', 'Xml');
class TestServiceController extends AppController {
    public $components = array('Security', 'RequestHandler');
/**
 * Components
 *
 * @var array
 */
    
   
    public function dispatch (){
        $this->loadModel('Product');
         
        //$xml = Xml::build('http://bakery.cakephp.org/articles.rss', array('return' => 'simplexml'));
        // $xml now is a instance of SimpleXMLElement
        $message_text = array();

        $message_text['despacho']['id'] = 1;

        $message_text['despacho']['comercio'] = array(
            'rif'   => 'J-19009765',
            'nombre'=> 'CJA Games'
        );

        $products = $this->Product->find('all');
        //echo '<pre>';print_r($products);die; 

        foreach($products as $product){
            $message_text['despacho']['productos'] = $product['Product'];
        }

       // echo '<pre>';print_r($message_text);die;
        $xml =  Xml::fromArray($message_text, array('format' => 'tags'));

        //($xml);die;
        echo "hey";die;
    }

    public function getState(){
       // http://localhost/p/repo1/public/agencias/estado/2
       // http://localhost/p/repo1/public/estados

         // remotely post the information to the server
       /* $link =  "http://" . $_SERVER['HTTP_HOST'] . $this->webroot.'rest_phones/'.$id.'.json';
 
        $data = null;
        $httpSocket = new HttpSocket();
        $response = $httpSocket->get($link, $data );
        $this->set('response_code', $response->code);
        $this->set('response_body', $response->body);
         
        $this -> render('/Client/request_response');*/
    }


}