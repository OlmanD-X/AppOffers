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

        public function leer_cotizaciones_personalizadas($idEmpresa){
            $this->db->query("EXEC SP_Leer_cotizaciones_personalizadas @idEmpresa=:idEmpresa");
            $this->db->bind(':idEmpresa',$idEmpresa);
            $data = $this->db->getRegisties();
            return $data;
        }

        public function leer_cotizacion_producto($idEmpresa){
            $this->db->query("EXEC sp_leer_cotizacion_Producto @idEmpresa=:idEmpresa");
            $this->db->bind(':idEmpresa',$idEmpresa);
            $data = $this->db->getRegisties();
            return $data;
        }
    }