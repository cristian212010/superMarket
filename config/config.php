<?php
require_once("Conectar.php");
$data = new Conectar();

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

class Proveedor extends Conectar{

    private $proveedorId;
    private $nombre;
    private $telefono;
    private $ciudad;

    public function __construct($proveedorId = 0, $nombre = "", $telefono = 0, $ciudad = "", $dbCnx=''){
        $this->proveedorId = $proveedorId;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->ciudad = $ciudad;
        parent::__construct($dbCnx);
    }

    public function setProveedorId($proveedorId){
        $this->proveedorId = $proveedorId;
    }

    public function getProveedorId(){
        return $this->proveedorId;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setCiudad($ciudad){
        $this->ciudad = $ciudad;
    }

    public function getCiudad(){
        return $this->ciudad;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO proveedores(nombre, telefono, ciudad) VALUES(?,?,?)");
            $stm->execute([$this->nombre, $this->telefono, $this->ciudad]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectAll(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM proveedores");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->dbCnx -> prepare("DELETE FROM proveedores WHERE proveedorId=?");
            $stm -> execute([$this->proveedorId]);
            return $stm->fetchAll();
            echo "<script>alert('Borrado exitosamente');document.location='estudiantes.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function selectOne(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM proveedores WHERE proveedorId=?");
            $stm -> execute([$this->proveedorId]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx -> prepare("UPDATE proveedores SET nombre=?, telefono=?, ciudad=? WHERE proveedorId=?");
            $stm -> execute([$this->nombre , $this->telefono, $this->ciudad, $this->proveedorId]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

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

class Usuario extends Conectar{
    private $id;
    private $empleadoId;
    private $email;
    private $username;
    private $password;
    private $tipoUsuario;
    public function __construct($id=0,$empleadoId=0,$email="",$username="",$password="", $tipoUsuario="",$dbCnx="")
    {
        $this->id=$id;
        $this->empleadoId =$empleadoId;
        $this->email=$email;
        $this->username=$username;
        $this->password=$password;
        $this->tipoUsuario=$tipoUsuario;
        parent::__construct($dbCnx);
    }

    public function setID($id)
    {
        $this->id=$id;
    }

    public function getID()
    {
        return $this->id;
    }

    public function setEmpleadoId($empleadoId)
    {
        $this->empleadoId=$empleadoId;
    }

    public function getEmpleadoId()
    {
        return $this->empleadoId;
    }

    public function setEmail($email)
    {
        $this->email=$email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setUsername($username)
    {
        $this->username=$username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password=$password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario=$tipoUsuario;
    }

    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx-> prepare("INSERT INTO usuarios(empleadoId,email,username,password,tipoUsuario) values(?,?,?,?,?)");
            $stm -> execute([$this->empleadoId,$this->email,$this->username,md5($this->password), $this->tipoUsuario]);
        } catch (Excption $e) {
            return $e ->getMessage();
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

    public function verificacion(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT id,username, password, tipoUsuario FROM usuarios");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
?>