<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo RUTA_URL.'/Login/logout';?>">
          Cerrar Sesión <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
</nav>
  <!-- /.navbar -->
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?php echo RUTA_URL.'/public/img/companies/'.$_SESSION['usuario']['logo'];?>"
           alt="LogoEmpresa"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" id="nombre-company"><?php echo $_SESSION['usuario']['nombreEmpresa'];?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo RUTA_URL.'/dist/img/user2-160x160.jpg'?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrador</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- <li class="nav-item">
            <a href="/AppOffers/Principal/index" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>INICIO</p>
            </a>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="/AppOffers/Producto/index" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>PRODUCTOS</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/AppOffers/Pedido/index" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>PEDIDOS</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/AppOffers/CotizacionEmpresa/index" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>COTIZACIONES</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>