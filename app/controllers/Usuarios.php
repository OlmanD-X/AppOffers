<?php
    class Usuarios extends Controller{
        public function __construct(){
            $this->modelUsuarios = $this->model('Usuario');
        }

        public function index(){
            session_start();
            if(!isset($_SESSION['usuario']))
                header("location:../Login/index.php");
           $this->view(get_class($this)."/index");
        }

        public function getUsuarios(){

            $data = $this->modelUsuarios->getUsuarios();

            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }

        public function getUsuario($id)
        {
            $data = $this->modelUsuarios->getUsuario($id);
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No se encontró el registro');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvo el registro exitosamente',$data);
            }
        }

        public function deleteUsuario($id){   
            $id = validateParameter('id',(int)$id,INTEGER);
            $registyOk = $this->modelUsuarios->deleteUsuario($id);
            if($registyOk){
                returnResponse(REGISTY_DELETE_SUCCESSFULLY,'El usuario fue eliminado con éxito');
            }
            else{
                throwError(INSERTED_DATA_NOT_COMPLETE,'Se produjo un error al eliminar los datos');
            }
        }

        /*
        public function addUsuario(){  
            $nombre = validateAlfaNumeric('nombre',validateParameter('nombre',trim($_POST['nombre']),STRING),'Alfanumeric');
            $ruc = validateRuc(validateParameter('ruc',trim($_POST['ruc']),NUMERIC));
            $phone = validatePhone(validateParameter('teléfono',trim($_POST['phone']),NUMERIC));
            $email = validateEmail(validateParameter('email',trim($_POST['email']),STRING));
            $units = validateParameter('unidades de negocio',json_decode($_POST['units']),ARREGLO);
            $image = validateParameter('logo',$_FILES['logo'],FILE);
            $isRegisty = $this->modelPerson->validateRuc($ruc,$_SESSION['usuario']['empresa']);
            if($isRegisty){
                throwError(RUC_IS_INVALID,'El ruc '.$ruc.' ya ha sido registrado');
            }
            $isRegisty = $this->modelPerson->validateEmail($email,$_SESSION['usuario']['empresa']);
            if($isRegisty){
                throwError(EMAIL_IS_INVALID,'El email '.$email.' ya ha sido registrado');
            }
            $isRegisty = $this->modelPerson->validatePhone($phone,$_SESSION['usuario']['empresa']);
            if($isRegisty){
                throwError(PHONE_IS_INVALID,'El teléfono '.$phone.' ya ha sido registrado');
            }
            $nameImage = validate_upload_image_cad($image,$ruc);
            $registyOk = $this->modelPerson->addPerson($nombre,$ruc,$email,$phone,$nameImage,$units,$_SESSION['usuario']['empresa']);
            if($registyOk){
                returnResponse(REGISTY_INSERT_SUCCESSFULLY,'El proveedor '.$nombre.' fue registrado con éxito');
            }
            else{
                throwError(INSERTED_DATA_NOT_COMPLETE,'Se produjo un error al insertar los datos');
            }
        }*/
    }