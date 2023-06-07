<?php
require_once("../config/Conectar.php");

class FacturaDetalle extends Conectar{

    private $productoId;
    private $facturaId;
    private $cantidad;
    private $precioVenta;

    public function __construct($productoId = 0, $facturaId = 0, $cantidad = "", $precioVenta = "", $dbCnx=''){
        $this->productoId = $productoId;
        $this->facturaId = $facturaId;
        $this->cantidad = $cantidad;
        $this->precioVenta = $precioVenta;
        parent::__construct($dbCnx);
    }

    public function setProductoId($productoId){
        $this->productoId = $productoId;
    }

    public function getProductoId(){
        return $this->productoId;
    }

    public function setFacturaId($facturaId){
        $this->facturaId = $facturaId;
    }

    public function getFacturaId(){
        return $this->facturaId;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function setPrecioVenta($precioVenta){
        $this->precioVenta = $precioVenta;
    }

    public function getPrecioVenta(){
        return $this->precioVenta;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO facturaDetalle(productoId, facturaId, cantidad, precioVenta) VALUES(?,?,?,?)");
            $stm->execute([$this->productoId, $this->facturaId, $this->cantidad, $this->precioVenta]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectAll(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM facturadetalle");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectAllDetalle(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM facturadetalle WHERE facturaId=?");
            $stm -> execute([$this->facturaId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->dbCnx -> prepare("DELETE FROM facturadetalle WHERE facturaId=?");
            $stm -> execute([$this->facturaId]);
            return $stm->fetchAll();
            echo "<script>alert('Borrado exitosamente');document.location='estudiantes.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOne(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM facturadetalle WHERE facturaId=?");
            $stm -> execute([$this->facturaId]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx -> prepare("UPDATE facturadetalle SET nombre=?, telefono=?, ciudad=? WHERE facturaId=?");
            $stm -> execute([$this->nombre , $this->telefono, $this->ciudad, $this->facturaId]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function nombreProducto($productoId){
        try {
            $stm = $this->dbCnx -> prepare("SELECT productos.nombre
            FROM productos
            INNER JOIN facturaDetalle ON productos.productoId = facturaDetalle.productoId
            WHERE productos.productoId = ?");
            $stm -> execute([$productoId]);
            return $stm->fetchColumn();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
?>