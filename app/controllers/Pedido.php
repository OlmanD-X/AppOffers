<?php
    class Pedido extends Controller{
        public function __construct(){
            $this->modelPedido = $this->model('ModelPedido');
        }

        public function index(){
            session_start(); 
            if(!isset($_SESSION['usuario']))
            header("location:../Login/index.php");
            $this->view(get_class($this).'/index'); //file 
        }
    }