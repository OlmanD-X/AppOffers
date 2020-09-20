<?php
    class Producto extends Controller{
        public function __construct(){
            $this->modelProduct = $this->model('ModelProducto');
        }

        public function index(){
            session_start(); 
            if(!isset($_SESSION['usuario']))
            header("location:../Login/index.php");
            $this->view(get_class($this).'/index'); //file 
        }

        public function addProducto(){  
            session_start();
            $caracteristicas = validateParameter('caracteristicas',json_decode($_POST['caracteristicas']),ARREGLO);
            $nombre = validateAlfaNumeric('nombre',validateParameter('nombre',trim($_POST['nombre']),STRING),'Alfanumeric');
            $descripcion = validateAlfaNumeric('descripcion',validateParameter('descripcion',trim($_POST['descripcion']),STRING),'Alfanumeric');
            $precio = validateParameter('precio',trim($_POST['precio']),NUMERIC);
            $stock = validateParameter('stock',trim($_POST['stock']),NUMERIC);
            $stockminimo = validateParameter('stockminimo',trim($_POST['stockminimo']),NUMERIC);
            $oferta = $_POST['oferta'];
            $selectsub = validateParameter('subcategorias',$_POST['subcategorias'],NUMERIC);
            $imagen = validateParameter('imagen',$_FILES['imagen'],FILE);

            $isRegisty = $this->modelProduct->validateProducto($nombre);
            if($isRegisty){
                throwError(DESC_IS_INVALID,'El producto '.$nombre.' ya ha sido registrado');
            }
            $registyOk = $this->modelProduct->agregarProducto($nombre,$descripcion,(double)$precio,(int)$stock,(int)$stockminimo,$imagen,(double)$oferta,(int)$selectsub,$caracteristicas,(int)$_SESSION['usuario']['idEmpresa'],$_SESSION['usuario']['rucEmpresa']);
            if($registyOk){
                returnResponse(REGISTY_INSERT_SUCCESSFULLY,'El producto '.$nombre.' fue registrado con éxito');
            }
            else{
                throwError(INSERTED_DATA_NOT_COMPLETE,'Se produjo un error al insertar los datos');
            }
        }
        public function getAllProducto()
        {
            session_start();
            $data = $this->modelProduct->mostrarTodosProductos($_SESSION['usuario']['idEmpresa']);
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }
        public function deleteProducto($idProducto){   
            $registyOk = $this->modelProduct->eliminarProducto($idProducto);
            if($registyOk){
                returnResponse(REGISTY_DELETE_SUCCESSFULLY,'El producto fue eliminado con éxito');
            }
            else{
                throwError(DELETED_DATA_NOT_COMPLETE,'Se produjo un error al eliminar los datos');
            }
        }
    }