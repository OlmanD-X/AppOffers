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

        public function leer_cotizaciones_personalizadas(){
            session_start();
            $data = $this->modelCotizacion->leer_cotizaciones_personalizadas($_SESSION['usuario']['idEmpresa']);
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }

        public function leer_cotizacion_producto(){
            session_start();
            $data = $this->modelCotizacion->leer_cotizacion_producto($_SESSION['usuario']['idEmpresa']);
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }
    }