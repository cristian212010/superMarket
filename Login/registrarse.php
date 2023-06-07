<?php
if (isset($_POST["registrarse"])) {
    require_once("RegistroUser.php");
    $registro = new RegistroUser();

    $registro -> setEmpleadoId($_POST["empleadoId"]);
    $registro->setEmail($_POST["email"]);
    $registro->setUsername($_POST["username"]);
    $registro->setPassword($_POST["password"]);
    $registro -> setTipoUsuario($_POST["tipoUsuario"]);

    if ($registro->checkUser($_POST['email'])) {
        echo "<script>alert('Usuario ya existe');document.location='loginRegister.php'</script>";
    }else {
        $registro->insertData();
        echo "<script>alert('Usuario registrado satisfactoriamente');document.location='../categoria/categorias.php'</script>";
    }
}
?>