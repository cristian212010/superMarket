<?php
require_once("Producto.php");
$data = new Producto();

$id = $_GET['id'];
$data -> setProductoId($id);

$record = $data->selectOne();

$val = $record[0];

if (isset($_POST['editar'])) {
    $data-> setcategoriaId($_POST['categoriaId']);
    $data-> setPrecioUnitario($_POST['precioUnitario']);
    $data-> setStock($_POST['stock']);
    $data-> setUnidadesPedidas($_POST['unidadesPedidas']);
    $data-> setProveedorId($_POST['proveedorId']);
    $data-> setDescontinuado($_POST['descontinuado']);
    $data-> setNombre($_POST['nombre']);
    $data-> update();
    echo "<script>alert('Datos editados exitosamente');document.location='productos.php'</script>";

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
            <a class="nav-link active texcolor3" aria-current="page" href="productos.php" style="cursor:pointer;">Listar Productos</a>
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
    
    <h2 class="m-2 texcolor3">Producto a Editar</h2>
    <div class="menuTabla contenedor2">
        <form class="col d-flex flex-wrap" action=""  method="post">
              <div class="mb-1 col-12">
                <label for="nombres" class="form-label texcolor3">Categoria ID</label>
                <input 
                  type="number"
                  id="categoriaId"
                  name="categoriaId"
                  class="form-control"  
                  value="<?php echo $val['categoriaId'] ?>"
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label texcolor3">Precio Unitario</label>
                <input 
                  type="number"
                  id="precioUnitario"
                  name="precioUnitario"
                  class="form-control"  
                  value="<?php echo $val['precioUnitario'] ?>"
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label texcolor3">Stock</label>
                <input 
                  type="number"
                  id="stock"
                  name="stock"
                  class="form-control"  
                  value="<?php echo $val['stock'] ?>"
                />
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label texcolor3">Unidades pedidas</label>
                <input 
                  type="number"
                  id="unidadesPedidas"
                  name="unidadesPedidas"
                  class="form-control"  
                  value="<?php echo $val['unidadesPedidas'] ?>"
                />
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label texcolor3">Proveedor ID</label>
                <input 
                  type="number"
                  id="proveedorId"
                  name="proveedorId"
                  class="form-control"  
                  value="<?php echo $val['proveedorId'] ?>"
                />
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label texcolor3">Descontinuado</label>
                <input 
                  type="text"
                  id="descontinuado"
                  name="descontinuado"
                  class="form-control"  
                  value="<?php echo $val['descontinuado'] ?>"
                />
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label texcolor3">Nombre</label>
                <input 
                  type="text"
                  id="nombre"
                  name="nombre"
                  class="form-control"  
                  value="<?php echo $val['nombre'] ?>"
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
              </div>
        </form>  
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