<?php
require_once("Categoria.php");

$record = new Categoria();

if (isset($_GET['id']) && isset($_GET['req'])) {
    if ($_GET['req']=="delete") {
        session_start();
        if ($_SESSION['tipoUsuario']=="administrador") {
            $record -> setCategoriaId($_GET['id']);
            $record -> delete();
            echo "<script>alert('Datos borrados exitosamente');document.location='categorias.php'</script>";
        }else {
            echo "<script>alert('No tiene permisos para borrar');document.location='categorias.php'</script>";
        }
    }
}
?>