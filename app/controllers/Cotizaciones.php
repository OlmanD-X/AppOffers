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

    }

    //This master branch
