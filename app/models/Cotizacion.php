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
    }