<?php
    class Chat extends Controller{
        public function __construct(){
            $this->modelCotizaciones = $this->model('Cotizacion');
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