<?php
require_once("../config/Conectar.php");

class Cliente extends Conectar{

    private $clienteId;
    private $nombre;
    private $celular;
    private $compañia;

    public function __construct($clienteId = 0, $nombre='', $celular = 0, $compañia = "", $dbCnx=''){
        $this->clienteId = $clienteId;
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->compañia = $compañia;
        parent::__construct($dbCnx);
    }

    public function setClienteId($clienteId){
        $this->clienteId = $clienteId;
    }

    public function getClienteId(){
        return $this->clienteId;
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

    public function setCompañia($compañia){
        $this->compañia = $compañia;
    }

    public function getCompañia(){
        return $this->compañia;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO clientes(nombre, celular, compañia) VALUES(?,?,?)");
            $stm->execute([$this->nombre, $this->celular, $this->compañia]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectAll(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM clientes");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->dbCnx -> prepare("DELETE FROM clientes WHERE clienteId=?");
            $stm -> execute([$this->clienteId]);
            return $stm->fetchAll();
            echo "<script>alert('Borrado exitosamente');document.location='estudiantes.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOne(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM clientes WHERE clienteId=?");
            $stm -> execute([$this->clienteId]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx -> prepare("UPDATE clientes SET nombre=?, celular=?, compañia=? WHERE clienteId=?");
            $stm -> execute([$this->nombre, $this->celular, $this->compañia, $this->clienteId]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
?>