<?php

    class ModelCaracteristica{
        private $db;

        public function __construct(){
            $this->db = new Connection;
        }

        public function validateCategoria($descripcion){
            $this->db->query("SELECT descripcion FROM Categorias WHERE descripcion=:descripcion;");
            $this->db->bind(':descripcion',$descripcion);
            $data = $this->db->getRegisty();
            if(!empty($data->descripcion))

                return true;
            else
                return false; 
        }
        public function validateEliminarCategoria($idCategoria){
            $this->db->query("SELECT * FROM Categorias c inner join Subcategorias s on c.idCategoria=s.idCategoria
            WHERE c.idCategoria=:id;");
            $this->db->bind(':id',$idCategoria);
            $data = $this->db->getRegisty();
            if(!empty($data->idCategoria))
                return true;
            else
                return false; 
        }
        public function agregarCategoria($descripcion){
            $this->db->query("INSERT INTO Categorias(descripcion) VALUES(:descripcion)");
            $this->db->bind(':descripcion',$descripcion);
            return $this->db->execute();        
        }

        public function actualizarCategoria($idCategoria,$descripcion){
            $this->db->query("UPDATE Categorias SET descripcion=:descripcion WHERE idCategoria=:id");
            $this->db->bind(':descripcion',$descripcion);
            $this->db->bind(':id',$idCategoria);
            return $this->db->execute();        
        }
        public function eliminarCategoria($idCategoria){
            $this->db->query("DELETE FROM Categorias WHERE idCategoria=:id");
            $this->db->bind(':id',$idCategoria);
            return $this->db->execute();
        }

        public function mostrarTodasCategorias(){
            $this->db->query("SELECT * FROM Categorias");
            $data = $this->db->getRegisties();
            return $data;
        }

        public function obtenerUnaCategoria($idCategoria){
            $this->db->query("SELECT idCategoria,descripcion FROM Categorias WHERE idCategoria=:id");
            $this->db->bind(':id',$idCategoria);
            $data = $this->db->getRegisty();
            return $data;
        }
        public function validateSubcategoria($descripcion){
            $this->db->query("SELECT descripcion FROM Subcategorias WHERE descripcion=:descripcion");
            $this->db->bind(':descripcion',$descripcion);
            $data = $this->db->getRegisty();
            if(!empty($data->descripcion))

                return true;
            else
                return false; 
        }
        public function agregarSubcategoria($descripcion,$selectcategorias){
            foreach ($selectcategorias as $item) {
                $this->db->query("INSERT INTO Subcategorias(descripcion,idCategoria) VALUES(:descripcion,:cat)");
                $this->db->bind(':descripcion',$descripcion);
                $this->db->bind(':cat',$item->id);
                return $this->db->execute();
            }
        }
        public function mostrarTodasSubcategorias(){
            $this->db->query("SELECT s.idSubcategoria,s.descripcion,c.descripcion as categoria FROM Subcategorias s INNER JOIN categorias c ON s.idCategoria=c.idCategoria");
            $data = $this->db->getRegisties();
            return $data;
        }

        public function mostrarTodasSubcategoriasByCategory($id){
            $this->db->query("SELECT s.idSubcategoria,s.descripcion,c.descripcion as categoria FROM Subcategorias s INNER JOIN categorias c ON s.idCategoria=c.idCategoria WHERE c.idCategoria = $id");
            $data = $this->db->getRegisties();
            return $data;
        }

        public function validateCaracteristica($descripcion,$selectsub){
            foreach ($selectsub as $item){
                $this->db->query("SELECT descripcion FROM Caracteristicas WHERE descripcion=:descripcion AND idSubcategoria=:sub");
                $this->db->bind(':descripcion',$descripcion);
                $this->db->bind(':sub',$item->id);
                $data = $this->db->getRegisty();
                if(!empty($data->descripcion))
                    return true;
                else
                    return false; 
            }
        }

        public function agregarCaracteristica($descripcion,$selectsub){
            foreach ($selectsub as $item) {
                $this->db->query("INSERT INTO Caracteristicas(descripcion,idSubcategoria) VALUES(:descripcion,:sub)");
                $this->db->bind(':descripcion',$descripcion);
                $this->db->bind(':sub',$item->id);
                return $this->db->execute();
            }
        }
        
        public function mostrarTodasCaracteristicas(){
            $this->db->query("SELECT car.idCaracteristica,s.descripcion as subcategoria ,car.descripcion FROM Caracteristicas car INNER JOIN Subcategorias s ON car.idSubcategoria=s.idSubcategoria");
            $data = $this->db->getRegisties();
            return $data;
        }

        // public function mostrarTodasCaracteristicasBySubcategoria($id){
        //     $this->db->query("SELECT car.idCaracteristica,s.descripcion as subcategoria ,car.descripcion FROM Caracteristicas car INNER JOIN Subcategorias s ON car.idSubcategoria=s.idSubcategoria WHERE s.idSubcategoria=$id");
        //     $data = $this->db->getRegisties();
        //     return $data;
        // }

        public function obtenerUnaCaracteristica($idSubcategoria){
            $this->db->query("SELECT idCaracteristica,descripcion,idSubcategoria FROM Caracteristicas WHERE idSubcategoria=:id");
            $this->db->bind(':id',$idSubcategoria);
            $data = $this->db->getRegisties();
            return $data;
        }

    }