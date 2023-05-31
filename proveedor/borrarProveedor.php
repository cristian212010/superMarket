<?php
require_once("../config/config.php");

$record = new Proveedor();

if (isset($_GET['id']) && isset($_GET['req'])) {
    if ($_GET['req']=="delete") {
        session_start();
        if ($_SESSION['tipoUsuario']=="administrador") {
            $record -> setProveedorId($_GET['id']);
            $record -> delete();
            echo "<script>alert('Datos borrados exitosamente');document.location='proveedores.php'</script>";
        }else {
            echo "<script>alert('No tiene permisos para borrar');document.location='proveedores.php'</script>";
        }
        
    }
}
?>