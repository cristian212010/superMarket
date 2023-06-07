<?php
if (isset($_POST['guardarEmpleados'])) {
    require_once("Empleado.php");


    $empleado = new Empleado();

    $empleado-> setNombre($_POST['nombre3']);
    $empleado-> setCelular($_POST['celular']);
    $empleado-> setDireccion($_POST['direccion']);

    $empleado-> insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamente');document.location='empleados.php'</script>";
}
?>