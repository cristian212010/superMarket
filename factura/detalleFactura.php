<?php
require_once("../config/config.php");
$data = new FacturaDetalle();

$id = $_GET['id'];
$data -> setFacturaId($id);

$record = $data->selectOne();

$val = $record[0];

if (isset($_POST['editar'])) {
    $data-> setEmpleadoId($_POST['empleadoId']);
    $data-> setClienteId($_POST['clienteId']);
    $data-> setFecha($_POST['fecha']);
    $data-> update();
    echo "<script>alert('Datos editados exitosamente');document.location='facturas.php'</script>";

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Campers</title>
  <link rel="icon" type="images/png" href="/images/logo campus-ai.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/profesores.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,800;1,400&display=swap"
    rel="stylesheet">
</head>

<body>
  <div class="d-flex " style="width: 20%;">
    <div id="div2">
      <!-- menu -->
      <div class="">
        <ul class="navbar-nav  mb-2 mb-lg-0 d-flex justify-content-start ">
          <li class="nav-item  d-flex gap-3 " style="display:flex; align-items: center;">
            <i class="bi bi-person-square text-white"></i>
            <a class="nav-link active texcolor3" aria-current="page" href="facturas.php" style="cursor:pointer;">Listar Facturas</a>
          </li>

          <li class="nav-item dropdown" style="cursor:pointer;">

          </li>
        </ul>
      </div>
    </div>
  </div>


  <!-- //////////////////////////////////////Campers Dynamic Table-->
  <div  class="div2 alertaAlerta" style="background-color: #233249;">
    <div class="sub-menu d-flex justify-content-between menu-cuenta " >

      <div class="divcueta border-bottom ">
        <img src="../img/logo.png" alt="" srcset="" class="cuenta2">
        <div class="ps-2">
          <h5 class="texcolor3">SuperMarket</h5>
          <h6 class="texcosize">Bienvenido</h6>
        </div>
      </div>
      <div class="align-items-center d-flex gap-3 margin-rigth">
        <a href=""><i class="bi bi-envelope text-white" style="font-size: 1.5rem; cursor:pointer "></i></a>
        <a href=""><i class="bi bi-bell text-white " style="font-size: 1.5rem; cursor:pointer "></i></a>
        <a href=""><i class="bi bi-person-square text-white" style="font-size: 1.5rem; cursor:pointer "></i></a>
      </div>
    </div>
    
    <h2 class="m-2 texcolor3">Detalle factura</h2>
    <div class="menuTabla contenedor2">
    <div id="div3" class="conta">
          <table class="table">
            <thead class="menu-busqueda">
                  <tr>
                      <th scope="col">FACTURA ID</th>
                      <th scope="col">PRODUCTO</th>
                      <th scope="col">CANTIDAD</th>
                      <th scope="col">PRECIO VENTA</th>
                      <th scope="col">DETALLES</th>
                  </tr>
            </thead>
                  <tbody class="table-group-divider">
                  <?php
                    $nombreProducto = $data->nombreProducto($val['productoId']);
                  ?>
                  <tr>
                    <td><?php echo $val['facturaId']?></td>
                    <td><?php echo $nombreProducto?></td>
                    <td><?php echo $val['cantidad']?></td>
                    <td><?php echo $val['precioVenta']?></td>
                    <td>
                      <a class="btn btn-danger" href="borrarDetalleFactura.php?id=<?=$val['facturaId']?>&req=delete">Borrar</a>
                      <a class="btn btn-warning" href="editarDetalleFactura.php?id=<?=$val['facturaId']?>">Editar</a>
                    </td>
                  </tr>
                  </tbody>
          </table>
        </div>  
    <div id="charts1" class="charts"> </div>
        
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
</body>

</html>