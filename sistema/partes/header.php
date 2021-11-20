<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/0f99dae2f5.js" crossorigin="anonymous"></script>
    <link href="../../../sistema/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="../../../sistema/js/icons.js"></script>
    <title>Sistema</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
    <button id="sidebarCollapse" class="btn navbar-btn">
      <i class="fas fa-lg fa-bars"></i>
    </button>
    <a class="navbar-brand" href="../resto/indexprincipal.php">
      <h3 id="logo"><i class="fas fa-utensils"></i> Sandwicheria La Avenida</h3>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" id="link" href="../../../sistema/sesion/cerrar.php">
          <i class="fas fa-sign-out-alt"></i>
          Cerrar sesion<span class="sr-only">(current) </span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="link" href="../resto/perfil.php">
          <i class="fas fa-id-card"></i>Perfil</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="wrapper fixed-left">
    <nav id="sidebar">
      <div class="sidebar-header" style="margin-bottom: -20px">
        <h4><i class="fas fa-user-circle"></i>Hola<p style="margin-left: 30px">¡<?php echo $_SESSION['user'] ?>!</p></h4>
      </div>
      <hr class="solid" style="border-top: 1px solid #fff;">
      <ul class="list-unstyled components" style="margin-top: -20px;">
        
        <!-- VENTAS -->
        <li  data-toggle="collapse" data-target="#ventas" class="collapsed">
            <a href="#"><i class="fas fa-shopping-cart"></i> Ventas <span class="arrow"></span></a>
            <ul class="list-unstyled sub-menu collapse" style="margin-left:20px" id="ventas">
                <li class="od">
                  <a href="../../../sistema/vistas/ventas/indexventascarrito.php"><i class="fas fa-shopping-cart"></i>Pedido de Venta</a>
                </li>
                <li class="od">
                  <a href="../../../sistema/vistas/ventas/indexventaslista.php"><i class="fas fa-clipboard-list"></i>Transacción Ventas</a>
                </li>
                <li class="od">
                  <a href="../../../sistema/vistas/ventas/indexventashistorial.php"><i class="fas fa-clipboard-list"></i>Historial de Ventas</a>
                </li>
                <li class="od">
                  <a href="../../../sistema/vistas/delivery/indexdelivery.php"><i class="fas fa-motorcycle"></i>Delivery</a>
                </li>
            </ul>
        </li>
        <!-- FIN VENTAS -->
        <!-- COMPRAS -->
        <li  data-toggle="collapse" data-target="#compras" class="collapsed">
            <a href="#"><i class="fas fa-shopping-cart"></i> Compras <span class="arrow"></span></a>
            <ul class="list-unstyled sub-menu collapse" style="margin-left:20px" id="compras">
              <li class="od">
                <a href="../../../sistema/vistas/compras/indexcomprascarrito.php"><i class="fas fa-shopping-cart"></i>Pedido a Proveedor</a>
              </li>
              <li class="od">
                <a href="../../../sistema/vistas/compras/indexcompraslista.php"><i class="fas fa-clipboard-list"></i>Lista de Compras</a>
              </li>
              <li class="od">
                <a href="../../../sistema/vistas/compras/indexcomprashistorial.php"><i class="fas fa-clipboard-list"></i>Historal de Compras</a>
              </li>
            </ul>
        </li>
        <!-- FIN COMPRAS -->
        <!-- CAJA -->
        <li  data-toggle="collapse" data-target="#caja" class="collapsed">
            <a href="#"><i class="fa fa-money"></i> Caja <span class="arrow"></span></a>
            <ul class="list-unstyled sub-menu collapse" style="margin-left:20px" id="caja">
            <li class="od">
                <a href="../../../sistema/vistas/cajas/indexcajas.php"><i class="fas fa-box"></i>Caja</a>
            </li>
              <li class="od oc">
                <a href="../../../sistema/vistas/movimientos/indexmovimientos.php"><i class="fas fa-sync"></i>Movimientos</a>
              </li>
            </ul>
        </li>
        <!-- FIN CAJA -->
        <li  data-toggle="collapse" data-target="#products" class="collapsed">
            <a href="#"><i class="fa fa-gift fa-lg"></i> Productos <span class="arrow"></span></a>
                </li>
                <ul class="list-unstyled sub-menu collapse" style="margin-left:20px" id="products">
                <li>
                    <a href="../../../sistema/vistas/articulos/indexarticulos.php "><i class="fas fa-shopping-basket"></i>Productos</a>
                </li>
                <li class="oc">
                    <a href="../../../sistema/vistas/categorias/indexcategorias.php"><i class="fas fa-dolly"></i>Categorias</a>
                </li>
              </ul>
        </li>
        <!-- PROVEEDORES -->
        <li class="oc">
          <a href="../../../sistema/vistas/proveedores/indexproveedores.php"><i class="fas fa-hands-helping"></i>Proveedores</a>
        </li>
        <!-- FIN PROVEEDORES -->
        <!-- CLIENTES -->
        <li class="od">
          <a href="../../../sistema/vistas/clientes/indexclientes.php"><i class="fas fa-user-friends"></i>Clientes</a>
        </li>
        <!-- FIN CLIENTES -->
        <!-- CLIENTES -->
        <li class="od">
          <a href="../../../sistema/vistas/cliente/indexclientecarrito.php"><i class="fas fa-shopping-cart"></i>Carrito de Clientes</a>
        </li>
        <!-- FIN CLIENTES -->
        <!-- REPORTES -->
        <li>
          <a href="../../../sistema/vistas/reportes/indexreportes.php"><i class="fas fa-chart-bar"></i>Reportes</a>
        </li>
        <!-- FIN REPORTES -->
        <!-- ADMINISTRACION -->
        <li  data-toggle="collapse" data-target="#admin" class="collapsed oc od">
            <a href="#"><i class="fa fa-cog"></i> Administración <span class="arrow"></span></a>
            <ul class="list-unstyled sub-menu collapse" style="margin-left:20px" id="admin">
              <li class="od oc">
                <a href="../../../sistema/vistas/usuarios/indexusuarios.php"><i class="fas fa-users"></i>Empleados</a>
              </li>
              <li class="od oc">
                <a href="../../../sistema/vistas/roles/indexroles.php"><i class="fas fa-user-tag"></i>Roles</a>
              </li>
            </ul>
        </li>
        <!-- FIN ADMINISTRACION -->
      </ul>
    </nav>