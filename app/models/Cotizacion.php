<?php

    class Cotizacion{
        private $db;

        public function __construct(){
            $this->db = new Connection;
        }

        public function addSoli($user,$idSub,$datos){
            $this->db->query("$datos GO EXEC sp_SaveSolicitud @cantidad=:cantidad,@idUsuario=:user,@idSubcategoria=:idSub,@Caracteristicas=@tablita");
            $this->db->bind(':user',$user);
            $this->db->bind(':idSub',$idSub);
            $this->db->bind(':cantidad',1);
            return $this->db->execute();
        }

        public function get_solicitud_empresa($user){
            $this->db->query("EXEC sp_obtener_solicitud_empresa @user='$user'");
            $data = $this->db->getRegisties();
            return $data;
        }

        public function get_solicitudPersonalizada_empresa($user){
            $this->db->query("EXEC sp_obtener_solicitudempresas @user='$user'");
            $data = $this->db->getRegisties();
            return $data;
        }

        public function get_rptaSP_empresa($idSolicitud,$idEmpresa){
            $this->db->query("EXEC sp_obtenerrpta_empresa @idSolicitud=:idSolicitud,@idEmpresa=:idEmpresa");
            $this->db->bind(':idSolicitud',$idSolicitud);
            $this->db->bind(':idEmpresa',$idEmpresa);
            $data = $this->db->getRegisties();
            return $data;
        }

        public function get_rpta_empresa($idSolicitud,$idEmpresa){
            $this->db->query("EXEC sp_obtener_rpta_empresa @idSolicitud=:idSolicitud,@idEmpresa=:idEmpresa");
            $this->db->bind(':idSolicitud',$idSolicitud);
            $this->db->bind(':idEmpresa',$idEmpresa);
            $data = $this->db->getRegisties();
            return $data;
        }

        public function actualizar_estado($idSolicitud){
            $this->db->query("EXEC sp_actualizar_estado @idSolicitud=:idSolicitud");
            $this->db->bind(':idSolicitud',$idSolicitud);
            return $this->db->execute();
        }

        public function validar_estado($idSolicitud){
            $this->db->query("EXEC sp_validar_estado @idSolicitud='$idSolicitud'");
            $data = $this->db->getRegisties();
            return $data;
        }

        public function actualizar_estado_aceptado($idSolicitud){
            $this->db->query("EXEC sp_actualizar_estado_aceptado @idSolicitud=:idSolicitud");
            $this->db->bind(':idSolicitud',$idSolicitud);
            return $this->db->execute();
        }
        
        public function enviar_solicitud($idUsuario){
            $this->db->query("INSERT INTO SolicitudProducto(numero,estado,fecha,stateUser,idUsuario)VALUES('001-0001','1',getDate(),'1',:idUsuario)");
            $this->db->bind(':idUsuario',$idUsuario);
            return $this->db->execute();
        }

        public function eliminar_solicitud_personalizada($idSolicitud,$idEmpresa){
            $this->db->query("EXEC sp_eliminar_solicitud_personalizada @idSolicitud=:idSolicitud, @idEmpresa=:idEmpresa");
            $this->db->bind(':idSolicitud',$idSolicitud);
            $this->db->bind(':idEmpresa',$idEmpresa);
            return $this->db->execute();
        }

        public function eliminar_solicitud($idSolicitud){
            $this->db->query("EXEC sp_eliminar_solicitud @idSolicitud=:idSolicitud");
            $this->db->bind(':idSolicitud',$idSolicitud);
            return $this->db->execute();
        }
    }