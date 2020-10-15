<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cotizacion</title>
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

        <div class="card mt-2">
            <div class="card-header">
                <div class="row" style="align-items: center;">
                    <div class="col-10"><h3 class="card-title">Listado de Cotizaciones</h3></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="pedidos" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 15px;" aria-sort="ascending" aria-label="Rendering engine: activa para ordenar la columna descendentemente">Nro</th>
                                    <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 262.783px;" aria-label="Browser: activa para ordenar la columna ascendentemente">Producto</th>
                                    <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 233.3px;" aria-label="Platform(s): activa para ordenar la columna ascendentemente">Estado</th>
                                    <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 123.733px;" aria-label="CSS grade: activa para ordenar la columna ascendentemente">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row">
                                    <td class="sorting_asc" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 15px;" aria-sort="ascending" aria-label="Rendering engine: activa para ordenar la columna descendentemente">1</td>
                                    <td class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 262.783px;" aria-label="Browser: activa para ordenar la columna ascendentemente">Laptop Lenovo</td>
                                    <td class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 233.3px;" aria-label="Platform(s): activa para ordenar la columna ascendentemente">Pendiente</td>
                                    <td class="a-right a-right" width="100px">
                                        <button type="button" class="btn btn-outline-primary verDetalle"><i class="fas fa-eye" style="pointer-events:none;"></i></button>
                                        <button type="button" class="btn btn-outline-danger eliminarProducto"><i class="far fa-check-circle" style="pointer-events:none;"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020-2025 <a href="http://adminlte.io"></a>.</strong> Todos los derechos reservados.
  </footer>
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
<script src="<?php echo RUTA_URL.'/public/js/pedido.js'?>"></script>
</body>
</html>
