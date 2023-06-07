<?php
if (isset($_POST['guardarClientes'])) {
    require_once("Cliente.php");


    $cliente = new Cliente();

    $cliente-> setNombre($_POST['nombre5']);
    $cliente-> setCelular($_POST['celular1']);
    $cliente-> setCompañia($_POST['compañia']);

    $cliente-> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='clientes.php'</script>";
}
?>