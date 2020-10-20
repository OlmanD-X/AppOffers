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
        public function getAllPedidos()
        {
            $data = $this->modelPedido->mostrarTodosPedidos();
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }
        public function getAllPedidosPersonalizados()
        {   
            session_start();
            $data = $this->modelPedido->mostrarTodosPedidosPersonalizados($_SESSION['usuario']['idEmpresa']);
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }

        public function aceptar($idSolicitud)
        {
            $registyOk = $this->modelPedido->aceptarPedido($idSolicitud);
            if($registyOk){
                returnResponse(REGISTY_UPDATE_SUCCESSFULLY,'El estado del pedido fue actualizado con éxito');
            }
            else{
                throwError(UPDATED_DATA_NOT_COMPLETE,'Se produjo un error al actualizar los datos');
            }
        }
        public function aceptarPersonalizado($idSolicitud)
        {
            $registyOk = $this->modelPedido->aceptarPedidoPersonalizado($idSolicitud);
            if($registyOk){
                returnResponse(REGISTY_UPDATE_SUCCESSFULLY,'El estado del pedido fue actualizado con éxito');
            }
            else{
                throwError(UPDATED_DATA_NOT_COMPLETE,'Se produjo un error al actualizar los datos');
            }
        }
        public function rechazar($idSolicitud)
        {
            $registyOk = $this->modelPedido->rechazarPedido($idSolicitud);
            if($registyOk){
                returnResponse(REGISTY_UPDATE_SUCCESSFULLY,'El estado del pedido fue rechazado');
            }
            else{
                throwError(UPDATED_DATA_NOT_COMPLETE,'Se produjo un error al actualizar los datos');
            }
        }
        public function rechazarPersonalizado($idSolicitud)
        {
            $registyOk = $this->modelPedido->rechazarPedidoPersonalizado($idSolicitud);
            if($registyOk){
                returnResponse(REGISTY_UPDATE_SUCCESSFULLY,'El estado del pedido fue rechazado');
            }
            else{
                throwError(UPDATED_DATA_NOT_COMPLETE,'Se produjo un error al actualizar los datos');
            }
        }
        public function getDetalle($idSolicitud)
        {
            $data = $this->modelPedido->mostrarDetallePedido($idSolicitud);
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }
        public function getDetallePersonalizado($idSolicitud)
        {
            session_start();
            $data = $this->modelPedido->mostrarDetallePedidoPersonalizado($idSolicitud,$_SESSION['usuario']['idEmpresa']);
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }
        public function detallePedido($idSolicitud){
            session_start();
            $usuario = null;
            if(isset($_SESSION['usuario']))
                $usuario = $_SESSION['usuario'];
            $data = ['usuario'=>$usuario];
            $this->view(get_class($this).'/detalle_pedido',$data);
        }
        public function detallePedidoPersonalizado($idSolicitud){
            session_start();
            $usuario = null;
            if(isset($_SESSION['usuario']))
                $usuario = $_SESSION['usuario'];
            $data = ['usuario'=>$usuario];
            $this->view(get_class($this).'/detalle_pedido_personalizado',$data);
        }
    }