<?php
App::uses('AppController', 'Controller','HttpSocket', 'Network/Http');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
App::import('Utility', 'Xml');
class TestServiceController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Security', 'RequestHandler');
/**
 * Components
 *
 * @var array
 */
    
   
    public function dispatch (){
        $this->loadModel('Product');
              /*$http = new HttpSocket();
$response = $http->post('http://192.168.1.113:8000/wseps/solicitud');
echo '<pre>';print_r($response);die;*/

        //$xml = Xml::build('http://bakery.cakephp.org/articles.rss', array('return' => 'simplexml'));
        // $xml now is a instance of SimpleXMLElement
        $message_text = array();

        $message_text['despacho']['id'] = 1;

        $message_text['despacho']['comercio'] = array(
            'rif'   => 'J-197536639',
            'nombre'=> 'CJA Games'
        );

        $products = $this->Product->find('all');
        //echo '<pre>';print_r($products);die; 

       /* foreach($products as $product){
            $message_text['despacho']['productos'] = $product['Product'];
        }*/
        $message_text['despacho']['productos']['producto'] = array(
            'id'        => 1000,
            'nombre'    => 'Call of duty',
            'cantidad'  => 2,
            'medidas'   => array(
                'peso'  => '1000',
                'largo' => '20',
                'ancho' => '20',
                'alto'  => '20'
            )
        );

        $message_text['despacho']['datosEnvio'] = array(
            'nombreDestinatario'=> 'Horacio',
            'telefonos'         => array(
                'telefonoContacto' => '02127765463'
            ),
            'direccion'         => 'Av las palmas',
            'zip'               => 1060,
            'ciudad'            => 'Caracas',
            'pais'              => 'Venezuela'
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
        $response = $httpSocket->post($link, $xml->asXML(), $options);
        echo '<pre>';print_r($response);die;

        echo '<pre>';print_r($xml->asXML());
        //($xml);die;
        echo "hey";die;die;
    }

    public function getState(){
       // http://localhost/p/repo1/public/agencias/estado/2
       // http://localhost/p/repo1/public/estados

         // remotely post the information to the server
        $link =  "http://" . '' . '/p/repo1/public/agencias/estados';
 
        $data = null;
        $httpSocket = new HttpSocket();
        $response = $httpSocket->get($link, $data );
        $this->set('response_code', $response->code);
        $this->set('response_body', $response->body);
         
        $this -> render('/Client/request_response');
    }

    public function payment(){
        if($this->request->is('post')){

            $text = '
            <pago>
                <solicitudPago>
                    <id>1</id>
                    <comercio>
                        <rif>J-197536639</rif>
                        <nombre>CJA Games</nombre>
                        <cuenta>210098765422192312</cuenta>
                    </comercio>
                    <datosmetodo_pago>
                        <monto>1500</monto>
                        <nombrePagador>Horacio</nombrePagador>
                        <apellidoPagador>Oliveira</apellidoPagador>
                        <nroTDC>1087653898210076</nroTDC>
                        <cvcTDC>653</cvcTDC>
                        <vencimientoTDC>05/2018</vencimientoTDC>
                    </datosmetodo_pago>
                </solicitudPago>
            </pago>
            ';

            $xml_array = array();
            $xml_array['pago']['solicitudPago']['id'] = 1;
            $xml_array['pago']['solicitudPago']['comercio'] = array(
                'rif'   => 'J-197536639',
                'nombre'=> 'CJA Games',
                'cuenta'=> 210098765422192312,
            );
            $xml_array['pago']['solicitudPago']['datosmetodo_pago']['monto'] = 1500;
            $xml_array['pago']['solicitudPago']['datosmetodo_pago']['nombrePagador'] = 'Horacio';
            $xml_array['pago']['solicitudPago']['datosmetodo_pago']['apellidoPagador'] = 'Oliveira';
            $xml_array['pago']['solicitudPago']['datosmetodo_pago']['nroTDC'] = 1087653898210076;
            $xml_array['pago']['solicitudPago']['datosmetodo_pago']['cvcTDC'] = 653;
            $xml_array['pago']['solicitudPago']['datosmetodo_pago']['vencimientoTDC'] = '05/2018';
			
			echo '<pre>';print_r($xml->asXML());
        
        }
    }

}