<?php
require_once("../config/Conectar.php");

class Producto extends Conectar{

    private $productoId;
    private $categoriaId;
    private $precioUnitario;
    private $stock;
    private $unidadesPedidas;
    private $proveedorId;
    private $descontinuado;
    private $nombre;

    public function __construct($productoId=0, $categoriaId=0, $precioUnitario=0, $stock=0, $unidadesPedidas=0, $proveedorId=0, $descontinuado='', $nombre='', $dbCnx=''){
        $this->productoId = $productoId;
        $this->categoriaId = $categoriaId;
        $this->precioUnitario = $precioUnitario;
        $this->stock = $stock;
        $this->unidadesPedidas = $unidadesPedidas;
        $this->proveedorId = $proveedorId;
        $this->descontinuado = $descontinuado;
        $this->nombre = $nombre;
        parent::__construct($dbCnx);
    }

    public function setProductoId($productoId){
        $this->productoId = $productoId;
    }

    public function getProductoId(){
        return $this->productoId;
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

    public function setPrecioUnitario($precioUnitario){
        $this->precioUnitario = $precioUnitario;
    }

    public function getPrecioUnitario(){
        return $this->precioUnitario;
    }

    public function setStock($stock){
        $this->stock = $stock;
    }

    public function getStock(){
        return $this->stock;
    }

    public function setUnidadesPedidas($unidadesPedidas){
        $this->unidadesPedidas = $unidadesPedidas;
    }

    public function getUnidadesPedidas($unidadesPedidas){
        return $this->unidadesPedidas;
    }

    public function setProveedorId($proveedorId){
        $this->proveedorId = $proveedorId;
    }

    public function getProveedorId($proveedorId){
        return $this->proveedorId;
    }

    public function setDescontinuado($descontinuado){
        $this->descontinuado = $descontinuado;
    }

    public function getDescontinuado($descontinuado){
        return $this->descontinuado;
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO productos (categoriaId, precioUnitario, stock, unidadesPedidas, proveedorId, descontinuado, nombre ) values (?,?,?,?,?,?,?)");
            $stm -> execute([$this->categoriaId, $this->precioUnitario, $this->stock, $this->unidadesPedidas, $this->proveedorId, $this->descontinuado, $this->nombre]);
        } catch (Exeption $e) {
            return $e->getMessage();
        }
    }

    public function selectAll(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM productos");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->dbCnx -> prepare("DELETE FROM productos WHERE productoId=?");
            $stm -> execute([$this->productoId]);
            return $stm->fetchAll();
            echo "<script>alert('Borrado exitosamente');document.location='estudiantes.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOne(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM productos WHERE productoId=?");
            $stm -> execute([$this->productoId]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx -> prepare("UPDATE productos SET categoriaId=?, precioUnitario=?, stock=?, unidadesPedidas=?, proveedorId=?, descontinuado=?, nombre=? WHERE productoId=?");
            $stm -> execute([$this->categoriaId, $this->precioUnitario, $this->stock, $this->unidadesPedidas, $this->proveedorId, $this->descontinuado, $this->nombre, $this->productoId]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectNombre($categoriaId){
        try {
            $stm = $this->dbCnx -> prepare("SELECT categorias.nombre
            FROM categorias
            INNER JOIN productos ON categorias.categoriaId = productos.categoriaId
            WHERE categorias.categoriaId = ?");
            $stm -> execute([$categoriaId]);
            return $stm->fetchColumn();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectProveedor($proveedorId){
        try {
            $stm = $this->dbCnx -> prepare("SELECT proveedores.nombre
            FROM proveedores
            INNER JOIN productos ON proveedores.proveedorId = productos.proveedorId;
            WHERE categorias.categoriaId = ?");
            $stm -> execute([$proveedorId]);
            return $stm->fetchColumn();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectCategorias(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT categoriaId, nombre FROM categorias");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectProveedores(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT proveedorId, nombre FROM proveedores");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>