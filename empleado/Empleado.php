<?php
require_once("../config/Conectar.php");

class Empleado extends Conectar{

    private $empleadoId;
    private $nombre;
    private $celular;
    private $direccion;
    
    public function __construct($empleadoId = 0, $nombre = "", $celular = 0, $direccion = "", $dbCnx=''){
        $this->empleadoId = $empleadoId;
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->direccion = $direccion;
        parent::__construct($dbCnx);
    }

    public function setEmpleadoId($empleadoId){
        $this->empleadoId = $empleadoId;
    }

    public function getEmpleadoId(){
        return $this->empleadoId;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setCelular($celular){
        $this->celular = $celular;
    }

    public function getCelular(){
        return $this->celular;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO empleados(nombre, celular, direccion) VALUES(?,?,?)");
            $stm->execute([$this->nombre, $this->celular, $this->direccion]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectAll(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM empleados");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->dbCnx -> prepare("DELETE FROM empleados WHERE empleadoId=?");
            $stm -> execute([$this->empleadoId]);
            return $stm->fetchAll();
            echo "<script>alert('Borrado exitosamente');document.location='estudiantes.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOne(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM empleados WHERE empleadoId=?");
            $stm -> execute([$this->empleadoId]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx -> prepare("UPDATE empleados SET nombre=?, celular=?, direccion=? WHERE empleadoId=?");
            $stm -> execute([$this->nombre , $this->celular, $this->direccion, $this->empleadoId]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
?>