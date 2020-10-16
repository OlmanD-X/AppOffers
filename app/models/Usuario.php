<?php

    class Usuario{
        private $db;

        public function __construct(){
            $this->db = new Connection;
        }

        public function login($user){
            $this->db->query("EXEC sp_login @nameUser=:username");
            $this->db->bind(':username',$user);
            return $this->db->getRegisty();
        }


        public function getUsuarios(){
            $this->db->query("EXEC sp_obtenerUsuarios");
            $data = $this->db->getRegisties();
            return $data;
        }

        public function getUsuario($idUser){
            $this->db->query("EXEC sp_obtenerUsuario @idUser=:iduser ");
            $this->db->bind(':iduser',$idUser);
            $data = $this->db->getRegisty();
            return $data;
        }

        public function deleteUsuario($idUsuario){
            $this->db->query("EXEC sp_deleteUsuario @idUser=:idUsuario");
            $this->db->bind(':idUsuario',$idUsuario);
            return $this->db->execute();
        }

        public function getEmpresa($id){
            $this->db->query("EXEC sp_obtenerUser_Empresa @idUser=:idUsuario");
            $this->db->bind(':idUsuario',$id);
            return $this->db->getRegisty();
        }
        
        /*
        public function addUsuario($firstName,$lastName,$email,$usuario,$password,$idtipo,$idempresa){
            $createDate=getdate();
            $this->db->query("INSERT INTO Usuarios(firstName,lastName,email,nameUser,pass,idTipoUsuario,idEmpresa,createDate) VALUES(:firstName,:lastName,:email,:usuario,:pass,'Activo',:id)");
            $this->db->bind(':nombre',$nombre);
            $this->db->bind(':ruc',$ruc);
            $this->db->bind(':email',$email);
            $this->db->bind(':telefono',$telefono);
            $this->db->bind(':logo',$nameImage);
            $this->db->bind(':id',$idCompany);
            if($this->db->execute()){
                $this->db->query("SELECT MAX(PROV_ID) AS ID FROM PROVEEDORES");
                $data = $this->db->getRegisty();
                $id =$data->ID;
                foreach ($units as $item) {
                    $this->db->query("INSERT INTO REL_PROV_UN(PROV_ID,UN_ID) VALUES(:id,:un)");
                    $this->db->bind(':id',$id);
                    $this->db->bind(':un',$item->id);
                    $this->db->execute();
                }
                return true;
            }
            else{
                return false;
            }
        }*/
    }