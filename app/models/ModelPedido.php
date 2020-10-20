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
        public function PedidoLeido($idSolicitud){
            $this->db->query("EXECUTE SP_LeerPedido @id=:id");
            $this->db->bind(':id',$idSolicitud);
            return $this->db->execute();
        }
        public function PedidoPersonalizadoLeido($idSolicitud){
            $this->db->query("EXECUTE SP_LeerPedidoPersonalizado @id=:id");
            $this->db->bind(':id',$idSolicitud);
            return $this->db->execute();
        }
        public function Contraoferta($idSolicitud){
            $this->db->query("EXECUTE SP_Contraofertar @id=:idEmpresa");
            $this->db->bind(':idEmpresa',$idSolicitud);
            $data = $this->db->getRegisties();
            return $data;
        }

        public function addContraoferta($idSolicitud,$idEmpresa,$caracteristicas){
            $this->db->query("INSERT INTO Contraofertas(idSolicitud,idEmpresa,precio,estado,stateUser) VALUES(:idSolicitud,:idEmpresa,0.00,'1','1')");
            $this->db->bind(':idSolicitud',$idSolicitud);
            $this->db->bind(':idEmpresa',$idEmpresa);
            if($this->db->execute()){
                $this->db->query("SELECT MAX(idContraoferta) AS ID FROM Contraofertas");
                $data = $this->db->getRegisty();
                $id =$data->ID;
                foreach ($caracteristicas as $item) {                   
                    $this->db->query("INSERT INTO CaracteristicaContraoferta(descripcion,idCaracteristica,idContraoferta) VALUES(:carac,:valor,:id)");
                    $this->db->bind(':id',$id);
                    $this->db->bind(':carac',$item->caract);
                    $this->db->bind(':valor',$item->valor);
                    $this->db->execute();
                }
                return true;
            }
            else{
                return false;
            }
        }
    }