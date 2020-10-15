<?php

    class ModelProducto{
        private $db;

        public function __construct(){
            $this->db = new Connection;
        }

        public function validateProducto($nombre){
            $this->db->query("SELECT nombre FROM producto WHERE nombre=:nombre;");
            $this->db->bind(':nombre',$nombre);
            $data = $this->db->getRegisty();
            if(!empty($data->nombre))
                return true;
            else
                return false; 
        }
        public function validateEliminar($idProducto){
            $this->db->query("SELECT*FROM Producto p INNER JOIN DetalleSolicitudProducto d ON p.idProducto=d.idProducto
            WHERE p.idProducto=:id");
            $this->db->bind(':id',$idProducto);
            $data = $this->db->getRegisty();
            if(!empty($data->nombre))
                return true;
            else
                return false; 
        }
        public function agregarProducto($nombre,$descripcion,$precio,$stock,$stockminimo,$imagen,$oferta,$selectsub,$caracteristicas,$idEmpresa,$ruc){
            $path = '../public/img/Products/';
            $nombreimagen = validate_upload_file($imagen,$path,$ruc.'-'.$nombre,'IMAGE');
            $this->db->query("INSERT INTO Producto(nombre,descripcion,precio,stock,stockMin,imagen,precioOferta,estado,idSubcategoria,idEmpresa) VALUES(:nombre,:descripcion,:precio,:stock,:stockMin,:imagen,:oferta,'1',:sub,:id)");
            $this->db->bind(':nombre',$nombre);
            $this->db->bind(':descripcion',$descripcion);
            $this->db->bind(':precio',$precio);
            $this->db->bind(':stock',$stock);
            $this->db->bind(':stockMin',$stockminimo);
            $this->db->bind(':imagen',$nombreimagen);
            $this->db->bind(':oferta',$oferta);
            $this->db->bind(':sub',$selectsub);
            $this->db->bind(':id',$idEmpresa);
            if($this->db->execute()){
                $this->db->query("SELECT MAX(idProducto) AS ID FROM Producto");
                $data = $this->db->getRegisty();
                $id =$data->ID;
                foreach ($caracteristicas as $item) {                   
                    $this->db->query("INSERT INTO Caracteristicas_Producto(caracteristica,valor,idProducto) VALUES(:carac,:valor,:id)");
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
        public function eliminarProducto($idProducto){
            $this->db->query("DELETE FROM Caracteristicas_Producto WHERE idProducto=:id");
            $this->db->bind(':id',$idProducto);
            $this->db->execute();
            $this->db->query("DELETE FROM Producto WHERE idProducto=:id");
            $this->db->bind(':id',$idProducto);
            return $this->db->execute();
        }

        public function mostrarTodosProductos($idEmpresa){
            $this->db->query("SELECT *  FROM Producto where idEmpresa='$idEmpresa'");
            $data = $this->db->getRegisties();
            return $data;
        }
    }