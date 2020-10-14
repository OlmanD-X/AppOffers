<?php

    class VProductoModel{
        private $db;

        public function __construct(){
            $this->db = new Connection;
        }

        public function getProductos(){
            $this->db->query("EXEC sp_obtenerProductos");
            $data = $this->db->getRegisties();
            return $data;
        }

        public function getProducto($idProducto){
            $this->db->query("EXEC sp_Detalle_producto_usuario @idProducto=:idProducto");
            $this->db->bind(':idProducto',$idProducto);
            $data = $this->db->getRegisty();
            return $data;
        }

    }