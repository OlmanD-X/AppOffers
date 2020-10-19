<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DetallePedido</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/plugins/fontawesome-free/css/all.min.css'?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/plugins/datatables-bs4/css/dataTables.bootstrap4.css'?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/plugins/select2/css/select2.min.css'?>">
  <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/dist/css/adminlte.min.css'?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php require_once RUTA_APP.'/views/inc/menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-1"></div>
                                    <div class="col-10">
                                            <!-- Main content -->
                                        <div class="invoice p-3 mb-3" id="detalle_pedido">
                                            <!-- title row -->
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020-2025 <a href="http://adminlte.io"></a>.</strong> Todos los derechos reservados.
  </footer> -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo RUTA_URL.'/public/plugins/jquery/jquery.min.js'?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo RUTA_URL.'/public/plugins/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Select2 -->
<script src="<?php echo RUTA_URL.'/public/plugins/select2/js/select2.full.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo RUTA_URL.'/public/plugins/datatables/jquery.dataTables.js'?>"></script>
<script src="<?php echo RUTA_URL.'/public/plugins/datatables-bs4/js/dataTables.bootstrap4.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo RUTA_URL.'/public/dist/js/adminlte.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo RUTA_URL.'/public/dist/js/demo.js'?>"></script>
<script src="<?php echo RUTA_URL.'/public/js/detallePedido.js'?>"></script>
</body>
</html>
