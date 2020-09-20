<?php
    class CotizacionEmpresa extends Controller{
        public function __construct(){
            $this->modelCotizacion = $this->model('ModelCotizacionEmpresa');
        }

        public function index(){
            session_start(); 
            if(!isset($_SESSION['usuario']))
            header("location:../Login/index.php");
            $this->view(get_class($this).'/index'); //file 
        }
    }