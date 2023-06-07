<?php
if (isset($_POST['guardarProducto'])) {
    require_once("Producto.php");

    $producto = new Producto();

    $producto-> setcategoriaId($_POST['categoriaId']);
    $producto-> setNombre($_POST['nombre2']);
    $producto-> setStock($_POST['stock']);
    $producto-> setUnidadesPedidas($_POST['unidadesPedidas']);
    $producto-> setProveedorId($_POST['proveedorId']);
    $producto-> setDescontinuado($_POST['descontinuado']);
    $producto-> setPrecioUnitario($_POST['precioUnitario']);

    $producto-> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='productos.php'</script>";
}
?>