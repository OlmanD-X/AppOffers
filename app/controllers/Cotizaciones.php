<?php
    class Cotizaciones extends Controller{
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

        public function index_cotizacion(){
            session_start();
            $usuario = null;
            if(isset($_SESSION['usuario']))
                $usuario = $_SESSION['usuario'];
            $data = ['usuario'=>$usuario];
            $this->view(get_class($this).'/index_cotizacion',$data);
        }

        public function detalles_cotizacion(){
            session_start();
            $usuario = null;
            if(isset($_SESSION['usuario']))
                $usuario = $_SESSION['usuario'];
            $data = ['usuario'=>$usuario];
            $this->view(get_class($this).'/detalles_cotizacion',$data);
        }

        public function addSolicitacion(){
            session_start();
            $idSubcategoria = $_POST['subcategoria'];
            $datos = json_decode($_POST['datos']);
            $query = 'DECLARE @tablita CaracteristicaSolicitud GO INSERT INTO @tablita(descripcion,idCaracteristica) VALUES';
            foreach ($datos as $value) {
                $query .= "('".$value->valor."',".$value->caract."),";
            }
            rtrim($query,',');
            $query.=' GO';
            $isRegistyOk = $this->modelCotizaciones->addSoli((int) $_SESSION['usuario']['idUsuario'],(int) $idSubcategoria,$query);
            if($isRegistyOk){
                returnResponse(REGISTY_INSERT_SUCCESSFULLY,'Solicitación enviada con éxito');
            }
            else{
                throwError(INSERTED_DATA_NOT_COMPLETE,'Se produjo un error al insertar los datos');
            }
        }

        public function get_solicitud_empresa(){
            session_start();
            $data = $this->modelCotizaciones->get_solicitud_empresa($_SESSION['usuario']['idUsuario']);
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }

        public function get_rpta_empresa($idSolicitud){
            $data = $this->modelCotizaciones->get_rpta_empresa($idSolicitud);
            if(empty($data)){
                throwError(GET_DATA_NOT_COMPLETE,'No existen registros');
            }
            else{
                returnResponse(GET_REGISTIES_SUCCESSFULLY,'Se obtuvieron los registros exitosamente',$data);
            }
        }

        public function actualizar_estado($idSolicitud){    
            $data = $this->modelCotizaciones->validar_estado($idSolicitud);   
            if(!($data[0]->stateUser=='3')){
                $registyOk = $this->modelCotizaciones->actualizar_estado($idSolicitud);
                if($registyOk){
                    returnResponse(REGISTY_INSERT_SUCCESSFULLY,'Los datos fueron actualizados con éxito');
                }
                else{
                    throwError(INSERTED_DATA_NOT_COMPLETE,'Se produjo un error al actualizar los datos');
                }
            }          
        }

        public function actualizar_estado_aceptado($idSolicitud){    
            $registyOk = $this->modelCotizaciones->actualizar_estado_aceptado($idSolicitud);
            if($registyOk){
                returnResponse(REGISTY_INSERT_SUCCESSFULLY,'Los datos fueron actualizados con éxito');
            }
            else{
                throwError(INSERTED_DATA_NOT_COMPLETE,'Se produjo un error al actualizar los datos');
            }  
        }
    }

    //This master branch
