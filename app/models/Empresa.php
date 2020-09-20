<?php

    class Empresa{
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

        public function addCompany($nombre,$ruc,$email,$telefono,$logo){
            $this->db->query("INSERT INTO EMPRESAS(EMP_RS,EMP_RUC,EMP_EMAIL,EMP_TELEFONO,EMP_LOGO,EMP_ESTADO) VALUES(:nombre,:ruc,:email,:telefono,:logo,'ACTIVO')");
            $this->db->bind(':nombre',$nombre);
            $this->db->bind(':ruc',$ruc);
            $this->db->bind(':email',$email);
            $this->db->bind(':telefono',$telefono);
            $this->db->bind(':logo',$logo);
            return $this->db->execute();
        }

        public function getCompanies(){
            $this->db->query("SELECT idEmpresa,ruc,razonSocial,direccion,telefono,imagen FROM Empresas WHERE stateEmpresa='1' AND isVerified='1'");
            $data = $this->db->getRegisties();
            return $data;
        }

        public function getCompany($idCompany){
            $this->db->query("SELECT idEmpresa,ruc,razonSocial,direccion,telefono,imagen FROM Empresas WHERE idEmpresa=:idCompany AND stateEmpresa='1' AND isVerified='1'");
            $this->db->bind(':idCompany',$idCompany);
            $data = $this->db->getRegisty();
            return $data;
        }

        public function deleteEmpresa($idCompany){
            $this->db->query("UPDATE Empresas SET stateEmpresa='0' WHERE idEmpresa=:idCompany");
            $this->db->bind(':idCompany',$idCompany);
            return $this->db->execute();
        }

        public function updateEmpresa($idEmpresa,$telefono,$direccion){
            $this->db->query("UPDATE Empresas SET telefono=:telefono, direccion=:direccion WHERE idEmpresa=:idEmpresa");
            $this->db->bind(':telefono',$telefono);
            $this->db->bind(':direccion',$direccion);
            $this->db->bind(':idEmpresa',$idEmpresa);
            return $this->db->execute();
        }

        public function getCompany_solicitud($idCompany){
            $this->db->query("SELECT idEmpresa,ruc,razonSocial,direccion,telefono,imagen FROM Empresas WHERE idEmpresa=:idCompany AND stateEmpresa='1' AND isVerified='0'");
            $this->db->bind(':idCompany',$idCompany);
            $data = $this->db->getRegisty();
            return $data;
        }
    }