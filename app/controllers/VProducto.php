<?php
    class VProducto extends Controller{
        public function __construct(){
            $this->modelProduct = $this->model('VProductoModel');
        }

        public function index(){
           $this->view(get_class($this)."/index");
        }

        public function getProductos(){

            $data = $this->modelProduct->getProductos();

            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }

        public function getProducto($id)
        {
            $data = $this->modelProduct->getProducto($id);
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No se encontró el registro');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvo el registro exitosamente',$data);
            }
        }
    }