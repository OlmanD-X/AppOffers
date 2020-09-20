<?php

    class DetallesModel{
        private $db;

        public function __construct(){
            $this->db = new Connection;
        }

        public function getProducto($idProducto){
            $this->db->query("SELECT P.idProducto,P.descripcion,P.nombre,P.precio,P.stock,P.imagen,E.razonSocial FROM Producto P INNER JOIN Empresas E ON P.idEmpresa=E.idEmpresa WHERE P.idProducto=:idProducto AND estado=1");
            $this->db->bind(':idProducto',$idProducto);
            $data = $this->db->getRegisty();
            return $data;
        }
    }