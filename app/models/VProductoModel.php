<?php

    class VProductoModel{
        private $db;

        public function __construct(){
            $this->db = new Connection;
        }

        public function getProductos(){
            $this->db->query("SELECT P.idProducto,P.descripcion,P.nombre,P.precio,P.stock,P.imagen,E.razonSocial AS empresa FROM Producto P INNER JOIN Empresas E ON P.idEmpresa=E.idEmpresa WHERE P.estado=1");
            $data = $this->db->getRegisties();
            return $data;
        }

        public function getProducto($idProducto){
            $this->db->query("SELECT P.idProducto,STUFF((SELECT ', ' + caracteristica +' '+ valor from Caracteristicas_Producto C JOIN Caracteristicas CA on C.id = CA.idCaracteristica AND  C.idProducto=P.idProducto for xml path('')),1,1,'') AS caracteristica,P.nombre,P.precio,P.stock,P.imagen,E.razonSocial AS empresa, E.ruc, E.direccion, E.telefono, CONVERT(VARCHAR(8),getDate(),105) fecha  FROM Producto P INNER JOIN Empresas E ON P.idEmpresa=E.idEmpresa
            WHERE P.idProducto=:idProducto AND P.estado=1");
            $this->db->bind(':idProducto',$idProducto);
            $data = $this->db->getRegisty();
            return $data;
        }

    }