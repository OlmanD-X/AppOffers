<?php

    class Solicitud{
        private $db;

        public function __construct(){
            $this->db = new Connection;
        }

        public function getSolicitudes(){
            $this->db->query("EXEC sp_obtenerSolicitudes");
            $data = $this->db->getRegisties();
            return $data;
        }

        public function getSolicitud($idCompany){
            $this->db->query("EXEC sp_obtenerSolicitud @idEmpresa=:idEmpresa");
            $this->db->bind(':idEmpresa',$idCompany);
            $data = $this->db->getRegisty();
            return $data;
        }

        public function deleteSolicitud($idCompany){
            $this->db->query("EXEC sp_deleteSolicitud @idEmpresa=:idEmpresa");
            $this->db->bind(':idEmpresa',$idCompany);
            return $this->db->execute();
        }

        public function activarEmpresa($idEmpresa){
            $this->db->query("EXEC sp_activarEmpresa @idEmpresa=:idEmpresa");
            $this->db->bind(':idEmpresa',$idEmpresa);
            return $this->db->execute();
        }
    }