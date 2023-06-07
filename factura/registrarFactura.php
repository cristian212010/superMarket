<?php
if (isset($_POST['guardarFacturas'])) {
    require_once("Factura.php");
    require_once("FacturaDetalle.php");


    $factura = new Factura();

    $factura-> setEmpleadoId($_POST['empleadoId']);
    $factura-> setClienteId($_POST['clienteId']);
    $factura-> setFecha($_POST['fecha']);

    $factura-> insertData();

    $idFactura = $factura->ultimoId();
    $detalleFactura = new FacturaDetalle();
    $detalleFactura->setFacturaId($idFactura);
    $detalleFactura->setProductoId($_POST['productoId']);
    $detalleFactura->setCantidad($_POST['cantidad']);
    $detalleFactura->setPrecioVenta($_POST['precioVenta']);
    $detalleFactura->insertData();


    echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='facturas.php'</script>";
}
?>