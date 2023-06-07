<?php
if (isset($_POST["guardarFacturasDetalle"])) {
    require_once("FacturaDetalle.php");

    $detalle = new FacturaDetalle();

    $detalle -> setFacturaId($_POST["facturaId"]);
    $detalle -> setProductoId($_POST["productoIdDetalle"]);
    $detalle -> setCantidad($_POST["cantidad"]);
    $detalle -> setPrecioVenta($_POST["precioVenta"]);

    $detalle -> insertData();

    echo "<script> alert('Los datos fueron guardados satisfactoriamente');document.location ='facturas.php'</script>";
}
?>