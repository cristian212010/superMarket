<?php
if (isset($_POST['guardarProveedor'])) {
    require_once("Proveedor.php");


    $factura = new Proveedor();

    $factura-> setNombre($_POST['nombre4']);
    $factura-> setTelefono($_POST['telefono']);
    $factura-> setCiudad($_POST['ciudad']);

    $factura-> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='proveedores.php'</script>";
}
?>