<?php 

    class ProductsController extends AppController{


        public function index(){
            $posts = $this->Product->find('all');
            
        }
    }

 ?>