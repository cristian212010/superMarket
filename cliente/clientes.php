<?php
require_once("../config/config.php");

$data = new Cliente();
$all = $data->selectAll();

//select Productos
$productos = new Producto();

//select Facturas
$facturas = new Factura();

session_start();
//verificacion
if (!$_SESSION['id']) {
  header('Location: ../Login/loginRegister.php');
  exit();
}
//Cerrar sesion
if (isset($_POST['cerrarSesion'])) {
  unset($_SESSION['id']);
  header('Location: ../Login/loginRegister.php');
  exit();
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
            <a class="nav-link active texcolor3" aria-current="page" href="../categoria/index.php" style="cursor:pointer;">Listar Categoria</a>
          </li>
          <li class="nav-item  d-flex gap-3 " style="display:flex; align-items: center;">
            <i class="bi bi-journal-plus text-white"></i>
            <a class="nav-link texcolor3" type="submit" data-bs-toggle="modal"
            data-bs-target="#registrarCategoria" href="#" style="cursor:pointer;">Crear Categoria</a>
          </li>
          <li class="nav-item  d-flex gap-3 " style="display:flex; align-items: center;">
            <i class="bi bi-person-square text-white"></i>
            <a class="nav-link active texcolor3" aria-current="page" href="../producto/productos.php" style="cursor:pointer;">Listar Productos</a>
          </li>
          <li class="nav-item  d-flex gap-3 " style="display:flex; align-items: center;">
            <i class="bi bi-journal-plus text-white"></i>
            <a class="nav-link texcolor3" type="submit" data-bs-toggle="modal"
            data-bs-target="#registrarProdcuto" href="#" style="cursor:pointer;">Crear Productos</a>
          </li>
          <li class="nav-item  d-flex gap-3 " style="display:flex; align-items: center;">
            <i class="bi bi-person-square text-white"></i>
            <a class="nav-link active texcolor3" aria-current="page" href="../cliente/clientes.php" style="cursor:pointer;">Listar Clientes</a>
          </li>
          <li class="nav-item  d-flex gap-3 " style="display:flex; align-items: center;">
            <i class="bi bi-journal-plus text-white"></i>
            <a class="nav-link texcolor3" type="submit" data-bs-toggle="modal"
            data-bs-target="#registrarClientes" href="#" style="cursor:pointer;">Crear Clientes</a>
          </li>
          <li class="nav-item  d-flex gap-3 " style="display:flex; align-items: center;">
            <i class="bi bi-person-square text-white"></i>
            <a class="nav-link active texcolor3" aria-current="page" href="../empleado/empleados.php" style="cursor:pointer;">Listar Empleados</a>
          </li>
          <li class="nav-item  d-flex gap-3 " style="display:flex; align-items: center;">
            <i class="bi bi-journal-plus text-white"></i>
            <a class="nav-link texcolor3" type="submit" data-bs-toggle="modal"
            data-bs-target="#registrarEmpleado" href="#" style="cursor:pointer;">Crear Empleados</a>
          </li>
          <li class="nav-item  d-flex gap-3 " style="display:flex; align-items: center;">
            <i class="bi bi-person-square text-white"></i>
            <a class="nav-link active texcolor3" aria-current="page" href="../factura/facturas.php" style="cursor:pointer;">Listar Facturas</a>
          </li>
          <li class="nav-item  d-flex gap-3 " style="display:flex; align-items: center;">
            <i class="bi bi-journal-plus text-white"></i>
            <a class="nav-link texcolor3" type="submit" data-bs-toggle="modal"
            data-bs-target="#registrarFacturas" href="#" style="cursor:pointer;">Crear Facturas</a>
          </li>
          <li class="nav-item  d-flex gap-3 " style="display:flex; align-items: center;">
            <i class="bi bi-person-square text-white"></i>
            <a class="nav-link active texcolor3" aria-current="page" href="../proveedor/proveedores.php" style="cursor:pointer;">Listar Proveedores</a>
          </li>
          <li class="nav-item  d-flex gap-3 " style="display:flex; align-items: center;">
            <i class="bi bi-journal-plus text-white"></i>
            <a class="nav-link texcolor3" type="submit" data-bs-toggle="modal"
            data-bs-target="#registrarProveedor" href="#" style="cursor:pointer;">Crear Proveedor</a>
          </li>
          <li class="nav-item  d-flex gap-3 " style="display:flex; align-items: center;">
            <form method="post" action="">
              <input type="submit" class="btn btn-light" value="Cerrar Sesión" name="cerrarSesion"/>
            </form>
          </li>

          <li class="nav-item dropdown" style="cursor:pointer;">

          </li>
        </ul>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="registrarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header color1">
        <h1 class="modal-title fs-5 headerr" id="exampleModalLabel">Registrar nueva categoria</h1>
      </div>
      <div class="modal-body">
        <form id="formulario" class="row g-3" action="../registrar.php"  method="POST">
          <div class="col-md-12">
            <label for="nombre" class="form-label headerr">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre1">
          </div> 
          <div class="col-md-12">
            <label for="descripcion" class="form-label headerr">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion">
          </div>      
      </div>
      <div class="modal-footer ">
        <input type="submit" class="btn btn-primary" value="guardar" name="guardar"/>
      </div>
    </div>
  </div>
</div>

<!-- Modal Prodcutos-->
<div class="modal fade" id="registrarProdcuto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header color1">
        <h1 class="modal-title fs-5 headerr" id="exampleModalLabel">Registrar nuevo Producto</h1>
      </div>
      <div class="modal-body">
        <form id="formulario" class="row g-3" action="registrar.php"  method="POST">
          <div class="col-md-12">
            <label for="categoriaId" class="form-label headerr">Categoria ID</label>
            <select class="col-md-12" name="categoriaId" id="">
              <option value="">seleccione categoria</option>
              <?php
                $categorias = $productos->selectCategorias();
                foreach ($categorias as $categoria) {
                  $categoriaId = $categoria['categoriaId'];
                  $categoriaNombre = $categoria['nombre'];
                  echo "<option value='" . intval($categoriaId) . "'>$categoriaNombre</option>";
                }
              ?>
            </select>
          </div>
          <div class="col-md-12">
            <label for="precioUnitario" class="form-label headerr">Precio unitario</label>
            <input type="number" class="form-control" id="precioUnitario" name="precioUnitario">
          </div> 
          <div class="col-md-12">
            <label for="stock" class="form-label headerr">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock">
          </div> 
          <div class="col-md-12">
            <label for="unidadesPedidas" class="form-label headerr">Unidades pedidas</label>
            <input type="number" class="form-control" id="unidadesPedidas" name="unidadesPedidas">
          </div> 
          <div class="col-md-12">
            <label for="proveedorId" class="form-label headerr">Proveedor ID</label>
            <select class="col-md-12" name="proveedorId" id="">
              <option value="">seleccione proveedor</option>
              <?php
                $allProveedores = $productos->selectProveedores();
                foreach ($allProveedores as $allProveedores) {
                  $proveedorId = $allProveedores['proveedorId'];
                  $proveedorNombre = $allProveedores['nombre'];
                  echo "<option value='" . intval($proveedorId) . "'>$proveedorNombre</option>";
                }
              ?>
            </select>
          </div>
          <div class="col-md-12">
            <label for="descontinuado" class="form-label headerr">Descontinuado</label>
            <input type="text" class="form-control" id="descontinuado" name="descontinuado">
          </div> 
          <div class="col-md-12">
            <label for="nombre" class="form-label headerr">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre2">
          </div>      
      </div>
      <div class="modal-footer ">
        <input type="submit" class="btn btn-primary" value="guardar" name="guardarProducto"/>
      </div>
    </div>
  </div>
</div>

<!-- Modal Clientes -->
<div class="modal fade" id="registrarClientes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header color1">
        <h1 class="modal-title fs-5 headerr" id="exampleModalLabel">Registrar nuevpo cliente</h1>
      </div>
      <div class="modal-body">
        <form id="formulario" class="row g-3" action="registrar.php"  method="POST">
          <div class="col-md-12">
            <label for="nombre5" class="form-label headerr">Nombre</label>
            <input type="text" class="form-control" id="nombre5" name="nombre5">
          </div>  
          <div class="col-md-12">
            <label for="celular" class="form-label headerr">Celular</label>
            <input type="number" class="form-control" id="celular" name="celular1">
          </div> 
          <div class="col-md-12">
            <label for="compañia" class="form-label headerr">Compañia</label>
            <input type="text" class="form-control" id="compañia" name="compañia">
          </div>     
      </div>
      <div class="modal-footer ">
        <input type="submit" class="btn btn-primary" value="guardar" name="guardarClientes"/>
      </div>
    </div>
  </div>
</div>

<!-- Modal Empleados -->
<div class="modal fade" id="registrarEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header color1">
        <h1 class="modal-title fs-5 headerr" id="exampleModalLabel">Registrar nuevo empleado</h1>
      </div>
      <div class="modal-body">
        <form id="formulario" class="row g-3" action="registrar.php"  method="POST">
        <div class="col-md-12">
            <label for="nombre" class="form-label headerr">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre3">
          </div> 
          <div class="col-md-12">
            <label for="celular" class="form-label headerr">Celular</label>
            <input type="number" class="form-control" id="celular" name="celular">
          </div> 
          <div class="col-md-12">
            <label for="direccion" class="form-label headerr">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion">
          </div>     
      </div>
      <div class="modal-footer ">
        <input type="submit" class="btn btn-primary" value="guardar" name="guardarEmpleados"/>
      </div>
    </div>
  </div>
</div>

<!-- Modal Facturas -->
<div class="modal fade" id="registrarFacturas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header color1">
        <h1 class="modal-title fs-5 headerr" id="exampleModalLabel">Registrar nuevo empleado</h1>
      </div>
      <div class="modal-body">
        <form id="formulario" class="row g-3" action="registrar.php"  method="POST">
          <div class="col-md-12">
            <label for="empleadoId" class="form-label headerr">Empleado ID</label>
            <select class="col-md-12" name="empleadoId" id="">
              <option value="">seleccione empleado</option>
              <?php
                $allEmpleados = $facturas->selectEmpleados();
                foreach ($allEmpleados as $allEmpleados) {
                  $empleadoId = $allEmpleados['empleadoId'];
                  $empleadoNombre = $allEmpleados['nombre'];
                  echo "<option value='" . intval($empleadoId) . "'>$empleadoNombre</option>";
                }
              ?>
            </select>
          </div>
          <div class="col-md-12">
            <label for="clienteId" class="form-label headerr">Cliente ID</label>
            <select class="col-md-12" name="clienteId" id="">
              <option value="">seleccione cliente</option>
              <?php
                $allClientes = $facturas->selectClientes();
                foreach ($allClientes as $allClientes) {
                  $clienteId = $allClientes['clienteId'];
                  $clienteNombre = $allClientes['nombre'];
                  echo "<option value='" . intval($clienteId) . "'>$clienteNombre</option>";
                }
              ?>
            </select>
          </div>
          <div class="col-md-12">
            <label for="fecha" class="form-label headerr">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha">
          </div>   
          <div class="col-md-12">
            <label for="productoId" class="form-label headerr">Producto ID</label>
            <select class="col-md-12" name="productoId" id="">
              <option value="">seleccione producto</option>
              <?php
                $allProductos = $facturas->selectProductos();
                foreach ($allProductos as $allProductos) {
                  $productoId = $allProductos['productoId'];
                  $productoNombre = $allProductos['nombre'];
                  echo "<option value='" . intval($productoId) . "'>$productoNombre</option>";
                }
              ?>
            </select>
          </div>  
          <div class="col-md-12">
            <label for="cantidad" class="form-label headerr">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad">
          </div>  
          <div class="col-md-12">
            <label for="precioVenta" class="form-label headerr">Precio Venta</label>
            <input type="number" class="form-control" id="precioVenta" name="precioVenta">
          </div>  
      </div>
      <div class="modal-footer ">
        <input type="submit" class="btn btn-primary" value="guardar" name="guardarFacturas"/>
      </div>
    </div>
  </div>
</div>

<!-- Modal Proveedor -->
<div class="modal fade" id="registrarProveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header color1">
        <h1 class="modal-title fs-5 headerr" id="exampleModalLabel">Registrar nuevo proveedor</h1>
      </div>
      <div class="modal-body">
        <form id="formulario" class="row g-3" action="registrar.php"  method="POST">
          <div class="col-md-12">
            <label for="nombre" class="form-label headerr">Nombre</label>
            <input type="text" class="form-control" id="clinombreenteId" name="nombre4">
          </div> 
          <div class="col-md-12">
            <label for="telefono" class="form-label headerr">Telefono</label>
            <input type="number" class="form-control" id="telefono" name="telefono">
          </div>     
          <div class="col-md-12">
            <label for="ciudad" class="form-label headerr">Ciudad</label>
            <input type="text" class="form-control" id="ciudad" name="ciudad">
          </div>     
      </div>
      <div class="modal-footer ">
        <input type="submit" class="btn btn-primary" value="guardar" name="guardarProveedor"/>
      </div>
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
    
        <!-- DINAMYC TABLE -->
        <div id="div3" class="conta">
          <table class="table">
            <thead class="menu-busqueda">
                  <tr>
                      <th scope="col">ID</th>
                      <th scope="col">NOMBRE</th>
                      <th scope="col">CELULAR</th>
                      <th scope="col">COMPAÑIA</th>
                      <th scope="col">DETALLES</th>
                  </tr>
            </thead>
                  <tbody class="table-group-divider">
                  <?php
                    foreach($all as $key => $value){
                  ?>
                  <tr>
                    <td><?php echo $value['clienteId']?></td>
                    <td><?php echo $value['nombre']?></td>
                    <td><?php echo $value['celular']?></td>
                    <td><?php echo $value['compañia']?></td>
                    <td>
                      <a class="btn btn-danger" href="borrarCliente.php?id=<?=$value['clienteId']?>&req=delete">Borrar</a>
                      <a class="btn btn-warning" href="editarCliente.php?id=<?=$value['clienteId']?>">Editar</a>
                    </td>
                  </tr>
                  <?php }?>
                  </tbody>
          </table>
        </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
</body>

</html>