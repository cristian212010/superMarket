<?php
if (isset($_POST['guardar'])) {
    require_once("config/config.php");

    $categoria = new Categoria();

    $categoria-> setNombre($_POST['nombre1']);
    $categoria-> setDescripcion($_POST['descripcion']);

    $categoria-> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='categoria/index.php'</script>";
}
if (isset($_POST['guardarProducto'])) {
    require_once("config/config.php");

    $producto = new Producto();

    $producto-> setcategoriaId($_POST['categoriaId']);
    $producto-> setNombre($_POST['nombre2']);
    $producto-> setStock($_POST['stock']);
    $producto-> setUnidadesPedidas($_POST['unidadesPedidas']);
    $producto-> setProveedorId($_POST['proveedorId']);
    $producto-> setDescontinuado($_POST['descontinuado']);
    $producto-> setPrecioUnitario($_POST['precioUnitario']);

    $producto-> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='producto/productos.php'</script>";
}
if (isset($_POST['guardarClientes'])) {
    require_once("config/config.php");


    $cliente = new Cliente();

    $cliente-> setNombre($_POST['nombre5']);
    $cliente-> setCelular($_POST['celular1']);
    $cliente-> setCompañia($_POST['compañia']);

    $cliente-> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='cliente/clientes.php'</script>";
}
if (isset($_POST['guardarEmpleados'])) {
    require_once("config/config.php");


    $empleado = new Empleado();

    $empleado-> setNombre($_POST['nombre3']);
    $empleado-> setCelular($_POST['celular']);
    $empleado-> setDireccion($_POST['direccion']);

    $empleado-> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='empleado/empleados.php'</script>";
}
if (isset($_POST['guardarFacturas'])) {
    require_once("config/config.php");


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


    echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='factura/facturas.php'</script>";
}
if (isset($_POST['guardarProveedor'])) {
    require_once("config/config.php");


    $factura = new Proveedor();

    $factura-> setNombre($_POST['nombre4']);
    $factura-> setTelefono($_POST['telefono']);
    $factura-> setCiudad($_POST['ciudad']);

    $factura-> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='proveedor/proveedores.php'</script>";
}
if (isset($_POST["registrarse"])) {
    require_once("config/config.php");

    $usuario = new Usuario();

    $usuario -> setEmpleadoId($_POST["empleadoId"]);
    $usuario -> setEmail($_POST["email"]);
    $usuario -> setUsername($_POST["username"]);
    $usuario -> setPassword($_POST["password"]);
    $usuario -> setTipoUsuario($_POST["tipoUsuario"]);

    $usuario -> insertData();

    echo "<script> alert('El registro se realizo satisfactoriamente');document.location ='Login/loginRegister.php'</script>";
}
if (isset($_POST["guardarFacturasDetalle"])) {
    require_once("config/config.php");

    $detalle = new FacturaDetalle();

    $detalle -> setFacturaId($_POST["facturaId"]);
    $detalle -> setProductoId($_POST["productoIdDetalle"]);
    $detalle -> setCantidad($_POST["cantidad"]);
    $detalle -> setPrecioVenta($_POST["precioVenta"]);

    $detalle -> insertData();

    echo "<script> alert('Los datos fueron guardados satisfactoriamente');document.location ='factura/facturas.php'</script>";
}
?>