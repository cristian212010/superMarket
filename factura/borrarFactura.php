<?php
require_once("../config/config.php");
$record = new Factura();

if (isset($_GET['id']) && isset($_GET['req'])) {
    if ($_GET['req']=="delete") {
        session_start();
        if ($_SESSION['tipoUsuario']=="administrador") {
            $record -> setFacturaId($_GET['id']);
            $record -> delete();
            echo "<script>alert('Datos borrados exitosamente');document.location='facturas.php'</script>";
        }else {
            echo "<script>alert('No tiene permisos para borrar');document.location='facturas.php'</script>";
        }
    }
}
?>