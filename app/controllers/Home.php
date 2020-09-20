<?php
    class Home extends Controller{
        public function __construct(){
            $this->modelCompany = $this->model('Empresa');
        }

        public function index(){
            session_start();
            if(!isset($_SESSION['usuario']))
                header("location:../Login/index.php");
            $this->view(get_class($this).'/index');
        }

        public function index_detalles($idCompany=null){
            session_start();
            if(!isset($_SESSION['usuario']))
                header("location:../Login/index.php");
            $this->view(get_class($this).'/index_empresa_detalles');
        }

        public function index_solicitud($idCompany=null){
            session_start();
            if(!isset($_SESSION['usuario']))
                header("location:../Login/index.php");
            $this->view(get_class($this).'/index_solicitud_detalles');
        }

        public function addCompany(){   
            $company = validateAlfaNumeric('nombre',validateParameter('nombre',trim($_POST['company']),STRING),'Alfanumeric');
            $ruc = validateRuc(validateParameter('ruc',trim($_POST['ruc']),NUMERIC));
            $phone = validatePhone(validateParameter('teléfono',trim($_POST['phone']),NUMERIC));
            $email = validateEmail(validateParameter('email',trim($_POST['email']),STRING));
            $image = validateParameter('logo',$_FILES['logo'],FILE);
            $isRegisty = $this->modelCompany->validateRuc($ruc);
            if($isRegisty){
                throwError(RUC_IS_INVALID,'El ruc '.$ruc.' ya ha sido registrado');
            }
            $nombre = '';
            $nameImage = validate_upload_file($image,$ruc,$nombre,'IMAGE');
            $registyOk = $this->modelCompany->addCompany($company,$ruc,$email,$phone,$nameImage);
            if($registyOk){
                returnResponse(REGISTY_INSERT_SUCCESSFULLY,'La empresa '.$company.' fue registrada con éxito');
            }
            else{
                throwError(INSERTED_DATA_NOT_COMPLETE,'Se produjo un error al insertar los datos');
            }
        }

        public function getCompanies(){
            $data = $this->modelCompany->getCompanies();
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }

        public function getCompany($idempresa){
            $data = $this->modelCompany->getCompany($idempresa);
            
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }

        public function getCompany_solicitud($idempresa){
            $data = $this->modelCompany->getCompany_solicitud($idempresa);
            
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }

        public function updateEmpresa(){   
            $telefono = validatePhone(validateParameter('telefono',trim($_POST['telefono']),NUMERIC));
            $direccion = trim($_POST['direccion']);
            $id = validateParameter('id',(int) $_POST['id'],INTEGER);
            //$image = validateParameter('imagen',$_FILES['imagen'],FILE);
            //$nameImage = validate_upload_image_cad($image,$ruc);
            $registyOk = $this->modelCompany->updateEmpresa($id,$telefono,$direccion);
            if($registyOk){
                returnResponse(REGISTY_INSERT_SUCCESSFULLY,'Los datos fueron actualizados con éxito');
            }
            else{
                throwError(INSERTED_DATA_NOT_COMPLETE,'Se produjo un error al actualizar los datos');
            }
        }

        public function delete($id){   
            $id = validateParameter('id',(int)$id,INTEGER);
            $registyOk = $this->modelCompany->deleteEmpresa($id);
            if($registyOk){
                returnResponse(REGISTY_DELETE_SUCCESSFULLY,'La empresa fue eliminada con éxito');
            }
            else{
                throwError(INSERTED_DATA_NOT_COMPLETE,'Se produjo un error al eliminar los datos');
            }
        }

    }

    //Este es una pruebecita desde master