<?php

    class ModelPedido{
        private $db;

        public function __construct(){
            $this->db = new Connection;
        }
        public function mostrarTodosPedidos(){
            $this->db->query("EXECUTE SP_LeerSolicitudProducto");
            $data = $this->db->getRegisties();
            return $data;
        }
        public function mostrarTodosPedidosPersonalizados($idEmpresa){
            $this->db->query("EXECUTE SP_LeerSolicitudPersonalizado @idEmpresa=:id");
            $this->db->bind(':id',$idEmpresa);
            $data = $this->db->getRegisties();
            return $data;
        }
        public function aceptarPedido($idSolicitud){
            $this->db->query("EXECUTE SP_AceptarPedido @id=:id");
            $this->db->bind(':id',$idSolicitud);
            return $this->db->execute();
        }
        public function aceptarPedidoPersonalizado($idSolicitud){
            $this->db->query("EXECUTE SP_AceptarPedidoPersonalizado @id=:id");
            $this->db->bind(':id',$idSolicitud);
            return $this->db->execute();
        }
        public function rechazarPedido($idSolicitud){
            $this->db->query("EXECUTE SP_RechazarPedido @id=:id");
            $this->db->bind(':id',$idSolicitud);
            return $this->db->execute();
        }
        public function rechazarPedidoPersonalizado($idSolicitud){
            $this->db->query("EXECUTE SP_RechazarPedidoPersonalizado @id=:id");
            $this->db->bind(':id',$idSolicitud);
            return $this->db->execute();
        }
        public function mostrarDetallePedido($idSolicitud){
            $this->db->query("EXECUTE SP_DetallePedido @id=:id");
            $this->db->bind(':id',$idSolicitud);
            $data = $this->db->getRegisties();
            return $data;
        }
        public function mostrarDetallePedidoPersonalizado($idSolicitud,$idEmpresa){
            $this->db->query("EXECUTE SP_DetallePedidoPersonalizada @id=:id, @idEmpresa=:idEmpresa");
            $this->db->bind(':id',$idSolicitud);
            $this->db->bind(':idEmpresa',$idEmpresa);
            $data = $this->db->getRegisties();
            return $data;
        }
    }