<?php
    class Inicio extends Controller{
        public function __construct(){
            
        }

        public function index(){
            session_start();
            $usuario = null;
            if(isset($_SESSION['usuario']))
                $usuario = $_SESSION['usuario'];
            $data = ['usuario'=>$usuario];
            $this->view(get_class($this).'/index',$data);
        }

    }