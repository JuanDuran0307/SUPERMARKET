<?php
    require_once("../db.php");
    require_once("../Config/Conectar.php");
    
    // --------- CATEGORIAS ---------
    class Categorias extends Conectar{
        private $id;
        private $imagen;
        private $nombres;
        private $descripcion;

        public function __construct($id = 0, $imagen = "", $nombres = "", $descripcion = "" , $dbCnx = "")
        {
            $this -> id = $id;
            $this -> imagen = $imagen;
            $this -> nombres = $nombres;
            $this -> descripcion = $descripcion;
            parent :: __construct($dbCnx);

        }

        // --------- ID ---------
        public function setId($id){
            $this -> id = $id;
        }

        public function getId(){
            return $this -> id;
        }

        // --------- IMAGEN ---------
        public function setImagen($imagen){
            $this -> imagen = $imagen;
        }

        public function getImagen(){
            return $this -> imagen;
        }

        // --------- NOMBRES ---------
        public function setNombres($nombres){
            $this -> nombres = $nombres;
        }

        public function getNombres(){
            return $this -> nombres;
        }

        // --------- DESCRIPCION ---------
        public function setDescripcion($descripcion){
            $this -> descripcion = $descripcion;
        }

        public function getDescripcion(){
            return $this -> descripcion;
        }

        // --------- METODO INSERTOR ---------
        public function insertData(){
            try {
                $stm = $this -> dbCnx -> prepare("INSERT INTO Categorias (nombres, descripcion, imagen) VALUES (?,?,?)");
                $stm -> execute([$this -> imagen, $this -> nombres, $this -> descripcion]);
            } catch (Exception $e ) {
                return $e -> getMessage();
            }
        }

        // --------- METODO FETCH ---------
        public function SelectAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM Categorias");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }

        // --------- METODO DELETE ---------
        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM Categorias WHERE id = ?");
                $stm -> execute([$this -> id]);
                return $stm -> fetchAll();
                echo "<script> alert('Borrado Exitosamente'); document.location='../Categorias/categorias.php'</script>";
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }

        // --------- METODO SELECT ---------
        public function selectOne(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM Categorias WHERE id = ?");
                $stm -> execute([$this -> id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }

        // --------- METODO UPDATE ---------
        public function update(){
            try {
                $stm = $this -> dbCnx -> prepare("UPDATE Categorias SET nombres = ?, descripcion = ?, imagen = ? WHERE id = ?");
                $stm -> execute([$this -> nombres, $this -> descripcion, $this -> imagen, $this -> id]);
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }
    }
?>