<?php
    class Caracteristica extends Controller{
        public function __construct(){
            $this->modelCaracteristica = $this->model('ModelCaracteristica');
        }

        public function index(){
            session_start();
            if(!isset($_SESSION['usuario']))
                header("location:../Login/index.php");
            $this->view(get_class($this).'/index'); //file 
        }

        public function addCategoria(){  
            session_start();
            $descripcion = validateAlfaNumeric('descripcion',validateParameter('descripcion',trim($_POST['descripcion']),STRING),'Alfanumeric');
            $isRegisty = $this->modelCaracteristica->validateCategoria($descripcion);
            if($isRegisty){
                throwError(DESC_IS_INVALID,'La categoria '.$descripcion.' ya ha sido registrado');
            }
            $registyOk = $this->modelCaracteristica->agregarCategoria($descripcion);
            if($registyOk){
                returnResponse(REGISTY_INSERT_SUCCESSFULLY,'Categoria registrada con éxito');
            }
            else{
                throwError(INSERTED_DATA_NOT_COMPLETE,'Se produjo un error al insertar los datos');
            }
        }

        public function getAllCategoria()
        {
            session_start();
            $data = $this->modelCaracteristica->mostrarTodasCategorias();
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }
        public function getCategoria($idCategoria)
        {
            session_start(); 
            $data = $this->modelCaracteristica->obtenerUnaCategoria($idCategoria);
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }
        public function updateCategoria(){  
            session_start();
            $idCategoria = $_POST['idCategoria'];
            $descripcion = validateAlfaNumeric('descripcion',validateParameter('descripcion',trim($_POST['descripcion']),STRING),'Alfanumeric');
            $isRegisty = $this->modelCaracteristica->validateCategoria($descripcion);
            if($isRegisty){
                throwError(DESC_IS_INVALID,'La categoria '.$descripcion.' ya ha sido registrado');
            }
            $registyOk = $this->modelCaracteristica->actualizarCategoria($idCategoria,$descripcion);
            if($registyOk){
                returnResponse(REGISTY_UPDATE_SUCCESSFULLY,'Categoria actualizada con éxito');
            }
            else{
                throwError(UPDATED_DATA_NOT_COMPLETE,'Se produjo un error al actualizar los datos');
            }
        }
        public function deleteCategoria($idCategoria){   
            $isRegisty = $this->modelCaracteristica->validateEliminarCategoria($idCategoria);
            if($isRegisty){
                throwError(DESC_IS_INVALID,'La categoria no puede ser eliminada');
            }
            $registyOk = $this->modelCaracteristica->eliminarCategoria($idCategoria);
            if($registyOk){
                returnResponse(REGISTY_DELETE_SUCCESSFULLY,'La categoria fue eliminado con éxito');
            }
            else{
                throwError(DELETED_DATA_NOT_COMPLETE,'Se produjo un error al eliminar los datos');
            }
        }

        public function addSubcategoria(){  
            session_start();
            $descripcion = validateAlfaNumeric('descripcion',validateParameter('descripcion',trim($_POST['descripcion']),STRING),'Alfanumeric');
            $selectcategorias = validateParameter('categorias',json_decode($_POST['categorias']),ARREGLO);

            $isRegisty = $this->modelCaracteristica->validateSubcategoria($descripcion);
            if($isRegisty){
                throwError(DESC_IS_INVALID,'La subcategoria '.$descripcion.' ya ha sido registrado');
            }
            $registyOk = $this->modelCaracteristica->agregarSubcategoria($descripcion,$selectcategorias);
            if($registyOk){
                returnResponse(REGISTY_INSERT_SUCCESSFULLY,'Subcategoria registrada con éxito');
            }
            else{
                throwError(INSERTED_DATA_NOT_COMPLETE,'Se produjo un error al insertar los datos');
            }
        }
        
        public function getAllSubcategoria()
        {
            session_start();
            $data = $this->modelCaracteristica->mostrarTodasSubcategorias();
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }

        public function getAllSubcategoriaByCategory($id)
        {
            session_start();
            $data = $this->modelCaracteristica->mostrarTodasSubcategoriasByCategory($id);
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }

        public function addCaracteristica(){  
            session_start();
            $descripcion = validateAlfaNumeric('descripcion',validateParameter('descripcion',trim($_POST['descripcion']),STRING),'Alfanumeric');
            $selectsub = validateParameter('subcategorias',json_decode($_POST['subcategorias']),ARREGLO);

            $isRegisty = $this->modelCaracteristica->validateCaracteristica($descripcion,$selectsub);
            if($isRegisty){
                throwError(DESC_IS_INVALID,'La caracteristica '.$descripcion.' ya ha sido registrado');
            }
            $registyOk = $this->modelCaracteristica->agregarCaracteristica($descripcion,$selectsub);
            if($registyOk){
                returnResponse(REGISTY_INSERT_SUCCESSFULLY,'Caracteristica registrada con éxito');
            }
            else{
                throwError(INSERTED_DATA_NOT_COMPLETE,'Se produjo un error al insertar los datos');
            }
        }
        public function getAllCaracteristica()
        {
            session_start();
            $data = $this->modelCaracteristica->mostrarTodasCaracteristicas();
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }

        // public function getAllCaracteristicaBySubcategoria($id)
        // {
        //     session_start();
        //     $data = $this->modelCaracteristica->mostrarTodasCaracteristicasBySubcategoria($id);
        //     if(empty($data)){
        //         throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
        //     }
        //     else{
        //         returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
        //     }
        // }

        public function getCaracteristica($idSubcategoria)
        {
            session_start();
            $data = $this->modelCaracteristica->obtenerUnaCaracteristica($idSubcategoria);
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }

    }