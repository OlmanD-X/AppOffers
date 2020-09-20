<?php
    class Detalles extends Controller{
        public function __construct(){
            $this->modelProduct = $this->model('DetallesModel');
        }

        public function index(){
            session_start();
            $usuario = null;
            if(isset($_SESSION['usuario']))
                $usuario = $_SESSION['usuario'];
            $data = ['usuario'=>$usuario];
            $this->view(get_class($this).'/index',$data); //file 
            // $example = $this->modelProduct->myFunction();
            // print_r($example);
            // $example = $this->modelProduct->myFunction2();
            // echo '<br>';
            // print_r($example);
            //$example = $this->modelProduct->f3();
            //print_r($example);
            // $data = ['categorias' => $example];
            // $this->view(get_class($this).'/index',$data);
        }

    }