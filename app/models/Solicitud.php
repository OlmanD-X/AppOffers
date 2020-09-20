<?php

    class Solicitud{
        private $db;

        public function __construct(){
            $this->db = new Connection;
        }

        public function validateRuc($ruc){
            $this->db->query("SELECT EMP_RUC FROM EMPRESAS WHERE EMP_RUC=:ruc;");
            $this->db->bind(':ruc',$ruc);
            $data = $this->db->getRegisty();
            if(!empty($data->EMP_RUC))
                return true;
            else
                return false; 
        }


        public function getSolicitudes(){
            $this->db->query("SELECT idEmpresa,ruc,razonSocial,direccion,telefono,imagen FROM Empresas WHERE stateEmpresa='1' AND isVerified='0'");
            $data = $this->db->getRegisties();
            return $data;
        }

        public function getSolicitud($idCompany){
            $this->db->query("SELECT idEmpresa,ruc,razonSocial,direccion,telefono,imagen FROM Empresas WHERE idEmpresa=:idCompany AND stateEmpresa='1' AND isVerified='0'");
            $this->db->bind(':idCompany',$idCompany);
            $data = $this->db->getRegisty();
            return $data;
        }

        public function deleteSolicitud($idCompany){
            $this->db->query("UPDATE Empresas SET stateEmpresa='0' WHERE idEmpresa=:idCompany");
            $this->db->bind(':idCompany',$idCompany);
            return $this->db->execute();
        }

        public function activarEmpresa($idEmpresa){
            $this->db->query("UPDATE Empresas SET isVerified='1' WHERE idEmpresa=:idEmpresa");
            $this->db->bind(':idEmpresa',$idEmpresa);
            return $this->db->execute();
        }
    }