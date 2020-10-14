<?php

    class DetallesModel{
        private $db;

        public function __construct(){
            $this->db = new Connection;
        }

        public function getProducto($idProducto){
            $this->db->query("EXEC sp_producto_detallesmodel @idProducto=:idProducto");
            $this->db->bind(':idProducto',$idProducto);
            $data = $this->db->getRegisty();
            return $data;
        }
    }