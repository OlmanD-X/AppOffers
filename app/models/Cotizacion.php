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

        public function get_solicitud_empresa($user){
            $this->db->query("SELECT SP.idSolicitud, P.nombre, RSE.stateEmpresa FROM Rel_SolicitudEmpresa RSE INNER JOIN Producto P ON RSE.idProducto=P.idProducto INNER JOIN SolicitudesPersonalizadas SP ON SP.idSolicitud=RSE.idSolicitud WHERE SP.idUsuario='$user'");
            $data = $this->db->getRegisties();
            return $data;
        }

        public function get_rpta_empresa($idSolicitud){
            $this->db->query("SELECT P.idProducto,P.imagen,P.stock,STUFF((SELECT ', ' + caracteristica +' '+ valor from Caracteristicas_Producto C JOIN Caracteristicas CA on C.id = CA.idCaracteristica AND  C.idProducto=P.idProducto for xml path('')),1,1,'') AS caracteristica,P.nombre,P.precio,P.stock,P.imagen,E.razonSocial AS empresa, E.direccion, E.telefono, E.ruc, CONVERT(VARCHAR(8),SP.fecha,105) fecha, SP.numero FROM Producto P INNER JOIN Empresas E ON P.idEmpresa=E.idEmpresa 
            INNER JOIN Rel_SolicitudEmpresa RSE ON RSE.idProducto=P.idProducto INNER JOIN SolicitudesPersonalizadas SP ON SP.idSolicitud=RSE.idSolicitud WHERE RSE.idSolicitud=:idSolicitud");
            $this->db->bind(':idSolicitud',$idSolicitud);
            $data = $this->db->getRegisties();
            return $data;
        }

        public function actualizar_estado($idSolicitud){
            $this->db->query("UPDATE Rel_SolicitudEmpresa SET stateUser='2' WHERE idSolicitud=:idSolicitud");
            $this->db->bind(':idSolicitud',$idSolicitud);
            return $this->db->execute();
        }

        public function validar_estado($idSolicitud){
            $this->db->query("SELECT stateUser FROM Rel_SolicitudEmpresa WHERE idSolicitud=$idSolicitud");
            $data = $this->db->getRegisties();
            return $data;
        }

        public function actualizar_estado_aceptado($idSolicitud){
            $this->db->query("UPDATE Rel_SolicitudEmpresa SET stateUser='3' WHERE idSolicitud=:idSolicitud");
            $this->db->bind(':idSolicitud',$idSolicitud);
            return $this->db->execute();
        }
        
    }