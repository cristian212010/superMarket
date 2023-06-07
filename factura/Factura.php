<?php
require_once("../config/Conectar.php");

class Factura extends Conectar{

    private $facturaId;
    private $empleadoId;
    private $clienteId;
    private $fecha;

    public function __construct($facturaId = 0, $empleadoId = 0, $clienteId = 0, $fecha = "", $dbCnx=''){
        $this->facturaId = $facturaId;
        $this->empleadoId = $empleadoId;
        $this->clienteId = $clienteId;
        $this->fecha = $fecha;
        parent::__construct($dbCnx);
    }

    public function setFacturaId($facturaId){
        $this->facturaId = $facturaId;
    }

    public function getFacturaId(){
        return $this->facturaId;
    }

    public function setEmpleadoId($empleadoId){
        $this->empleadoId = $empleadoId;
    }

    public function getEmpleadoId(){
        return $this->empleadoId;
    }

    public function setClienteId($clienteId){
        $this->clienteId = $clienteId;
    }

    public function getClienteId(){
        return $this->clienteId;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO facturas(empleadoId, clienteId, fecha) VALUES(?,?,?)");
            $stm->execute([$this->empleadoId, $this->clienteId, $this->fecha]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectAll(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM facturas");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->dbCnx -> prepare("DELETE FROM facturas WHERE facturaId=?");
            $stm -> execute([$this->facturaId]);
            return $stm->fetchAll();
            echo "<script>alert('Borrado exitosamente');document.location='estudiantes.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOne(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM facturas WHERE facturaId=?");
            $stm -> execute([$this->facturaId]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx -> prepare("UPDATE facturas SET empleadoId=?, clienteId=?, fecha=? WHERE facturaId=?");
            $stm -> execute([$this->empleadoId , $this->clienteId, $this->fecha, $this->facturaId]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectNombreEmpleado($empleadoId){
        try {
            $stm = $this->dbCnx -> prepare("SELECT empleados.nombre
            FROM empleados
            INNER JOIN facturas ON empleados.empleadoId = facturas.empleadoId
            WHERE facturas.empleadoId = ?");
            $stm -> execute([$empleadoId]);
            return $stm->fetchColumn();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectEmpleados(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT empleadoId, nombre FROM empleados");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectClientes(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT clienteId, nombre FROM clientes");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectIdFactura(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT facturaId FROM facturas");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectProductos(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT productoId, nombre FROM productos");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function ultimoId(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT MAX(facturaId) AS ultimoId FROM facturas");
            $stm -> execute();
            $resultado = $stm->fetch(PDO::FETCH_ASSOC);
            return $resultado['ultimoId'] ?? 0;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
?>