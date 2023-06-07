<?php
require_once("Producto.php");

$record = new Producto();

if (isset($_GET['id']) && isset($_GET['req'])) {
    if ($_GET['req']=="delete") {
        session_start();
        if ($_SESSION['tipoUsuario']=="administrador") {
            $record -> setProductoId($_GET['id']);
            $record -> delete();
            echo "<script>alert('Datos borrados exitosamente');document.location='productos.php'</script>";
        }else {
            echo "<script>alert('No tiene permisos para borrar');document.location='productos.php'</script>";
        }
        
    }
}
?>