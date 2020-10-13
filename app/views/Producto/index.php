<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Producto</title>
  <!-- TE QUIERO -->
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
                    <div class="col-10"><h3 class="card-title">Listado de Productos</h3></div>
                    <div class="col-2" style="padding-left:80px">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarProducto"><i class="fa fa-plus"></i>Nuevo</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="productos" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 15px;" aria-sort="ascending" aria-label="Rendering engine: activa para ordenar la columna descendentemente">Nro</th>
                                    <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 262.783px;" aria-label="Browser: activa para ordenar la columna ascendentemente">Nombre</th>
                                    <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 233.3px;" aria-label="Platform(s): activa para ordenar la columna ascendentemente">Descripcion</th>
                                    <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 174.3px;" aria-label="Engine version: activa para ordenar la columna ascendentemente">Precio</th>
                                    <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 123.733px;" aria-label="CSS grade: activa para ordenar la columna ascendentemente">Stock</th>
                                    <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 123.733px;" aria-label="CSS grade: activa para ordenar la columna ascendentemente">Stock Minimo</th>
                                    <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1"  aria-label="CSS grade: activa para ordenar la columna ascendentemente" width="10px">Imagen</th>
                                    <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 123.733px;" aria-label="CSS grade: activa para ordenar la columna ascendentemente">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
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
  <!-- Modal -->
<div class="modal fade" id="agregarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label class="col-3" for="nombre">Nombre</label>
                            <input type="text" name="" id="nombre" class="form-control col-9">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label class="col-3" for="descripcion">Descripcion</label>
                            <input type="text" name="" id="descripcion" class="form-control col-9">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label for="selectsub" class="col-3">Subcategorias</label>
                            <select class="select2 form-control" id="selectsub" style="width:75%;">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label for="precio" class="col-3">Precio</label>
                            <input type="number" name="" id="precio" min="0" class="form-control col-3">
                            <label for="precio" class="col-3">Precio Sugerido</label>
                            <input type="text" name="" id="precioSugerido" class="form-control col-3" disabled="true">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label for="oferta" class="col-3">Oferta</label>
                            <input type="number" name="" id="oferta" min="0" class="form-control col-3">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label for="stock" class="col-3">Stock</label>
                            <input type="number" name="" id="stock" min="0" class="form-control col-3">
                            <label for="stockminimo" class="col-3">Stock Minimo</label>
                            <input type="number" name="" id="stockminimo" min="0" class="form-control col-3">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label for="imagen" class="col-3">Imagen</label>
                            <input type="file" name="" id="imagen" class="col-9 p-0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success" id="nuevoProducto"><i class="fa fa-save"></i> Registrar</button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarCaracteristica"><i class="fa fa-plus"></i> Caracteristicas</button>

            </div>
            </div>
        </div>
</div>
<div class="modal fade" id="agregarCaracteristica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Caracteristicas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body" id="cuerpo">
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success" id="addCaracteristica"><i class="fa fa-save"></i> Agregar</button>
            </div>
            </div>
        </div>
</div>
<!-- Modal -->

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
<script src="<?php echo RUTA_URL.'/public/js/producto.js'?>"></script>
</body>
</html>
