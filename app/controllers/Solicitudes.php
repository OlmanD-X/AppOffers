<?php
    class Solicitudes extends Controller{
        public function __construct(){
            $this->modelSolicitud = $this->model('Solicitud');
        }

        public function index(){
            session_start();
            if(!isset($_SESSION['usuario']))
                header("location:../Login/index.php");
            $this->view(get_class($this).'/index');
        }

        public function getSolicitudes(){
            $data = $this->modelSolicitud->getSolicitudes();
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }

        public function getSolicitud($idempresa){
            $data = $this->modelSolicitud->getSolicitud($idempresa);
            
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }

        public function deleteEmpresa($id){   
            $id = validateParameter('id',(int)$id,INTEGER);
            $registyOk = $this->modelSolicitud->deleteSolicitud($id);
            if($registyOk){
                returnResponse(REGISTY_DELETE_SUCCESSFULLY,'La empresa fue eliminada con éxito');
            }
            else{
                throwError(INSERTED_DATA_NOT_COMPLETE,'Se produjo un error al eliminar los datos');
            }
        }

        public function activarEmpresa(){   
            $id = validateParameter('id',(int) $_POST['id'],INTEGER);
            $registyOk = $this->modelSolicitud->activarEmpresa($id);
            if($registyOk){
                returnResponse(REGISTY_INSERT_SUCCESSFULLY,'Se activo perfil de empresa con éxito');
            }
            else{
                throwError(INSERTED_DATA_NOT_COMPLETE,'Se produjo un error al activar perfil de empresa');
            }
        }

    }