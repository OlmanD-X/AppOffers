<?php

    class ModelCotizacionEmpresa{
        private $db;

        public function __construct(){
            $this->db = new Connection;
        }
        
        public function mostrarTodosPedidos(){
            $this->db->query("EXECUTE SP_LeerSolicitudProducto");
            return $this->db->execute();
        }

    }