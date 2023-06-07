<?php
require_once("../config/Conectar.php");

class Categoria extends Conectar{
    private $categoriaId;
    private $nombre;
    private $descripcion;
    private $imagen;

    public function __construct($categoriaId=0, $nombre='', $descripcion='', $imagen='', $dbCnx = ''){
        $this->categoriaId = $categoriaId;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        parent::__construct($dbCnx);
    }

    public function setcategoriaId($categoriaId){
        $this->categoriaId = $categoriaId;
    }

    public function getcategoriaId(){
        return $this->categoriaId;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO categorias (nombre, descripcion, imagen) values (?,?,?)");
            $stm -> execute([$this->nombre, $this->descripcion, $this->imagen]);
        } catch (Exeption $e) {
            return $e->getMessage();
        }
    }

    public function selectAll(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM categorias");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->dbCnx -> prepare("DELETE FROM categorias WHERE categoriaId=?");
            $stm -> execute([$this->categoriaId]);
            return $stm->fetchAll();
            echo "<script>alert('Borrado exitosamente');document.location='estudiantes.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOne(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM categorias WHERE categoriaId=?");
            $stm -> execute([$this->categoriaId]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx -> prepare("UPDATE categorias SET nombre=?, descripcion=?, imagen=? WHERE categoriaId=?");
            $stm -> execute([$this->nombre, $this->descripcion, $this->imagen, $this->categoriaId]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>