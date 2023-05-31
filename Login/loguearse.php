<?php
if (isset($_POST["loguearse"])) {
    require_once("../config/config.php");

    $data = new Usuario();

    $usuarios = $data->verificacion();
    $coincidencia = false;
    foreach ($usuarios as $usuarioValidar) {
        if ($usuarioValidar['username'] == $_POST['username'] && $usuarioValidar['password'] == md5($_POST['password'])) {
            $coincidencia = true;
            session_start();
            $_SESSION['id'] = $usuarioValidar['id'];
            $_SESSION['tipoUsuario'] = $usuarioValidar['tipoUsuario'];
            header('Location: ../categoria/index.php');
            exit();
        }
    }
    if (!$coincidencia) {
        echo "<script>alert('Usuario o contraseña incorrectos');document.location ='loginRegister.php'</script>";
    }
}
?>