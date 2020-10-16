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
            $this->db->query("EXEC sp_obtener_solicitudempresas @user='$user'");
            $data = $this->db->getRegisties();
            return $data;
        }

        public function get_rpta_empresa($idSolicitud){
            $this->db->query("EXEC sp_obtenerrpta_empresa @idSolicitud=:idSolicitud");
            $this->db->bind(':idSolicitud',$idSolicitud);
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
        
    }