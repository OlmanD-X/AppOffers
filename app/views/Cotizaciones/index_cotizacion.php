<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Offers</title>
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/plugins/fontawesome-free/css/all.min.css'?>">
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/dist/css/adminlte.min.css'?>">
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/css/home.css'?>">
</head>
<body class="">
    <?php require_once RUTA_APP.'/views/inc/menu_public.php'; ?>
    <main class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper pt-2" style="margin-left:0">
                <!-- Main content -->
                <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <div class="row" style="align-items: center;">
                            <?php 
                                if($parameters['usuario']!=null){
                            ?>
                                <div class="col-6"><h3 class="card-title"></h3></div>
                                <div class="col-2"></div>
                            <?php
                                }
                                else{
                            ?>
                                <div class="col-8"><h3 class="card-title">Galeria de productos</h3></div>
                            <?php
                                }
                            ?>
                            <div class="col-4">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-light" type="button">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-1"></div>
                                    <div class="col-10">
                                        <!-- Main content -->
                                        <div class="invoice p-3 mb-3" id="detalle_solicitud">
                                            <!-- title row -->
                                            <div class="card-header">
                                                <div class="row" style="align-items: center;">
                                                    <div class="col-10"><h3 class="card-title">Respuestas a cotizaciones personalizadas</h3></div>
                                                </div>
                                            </div>
                                            <br>
                                            <table id="productos" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 15px;" aria-sort="ascending" aria-label="Rendering engine: activa para ordenar la columna descendentemente">Nro</th>
                                                        <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 262.783px;" aria-label="Browser: activa para ordenar la columna ascendentemente">Producto</th>
                                                        <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 262.783px;" aria-label="Browser: activa para ordenar la columna ascendentemente">Empresa</th>
                                                        <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 123.733px;" aria-label="Browser: activa para ordenar la columna ascendentemente">Fecha</th>
                                                        <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 200.0px;" aria-label="Platform(s): activa para ordenar la columna ascendentemente">Estado de la solicitud</th>
                                                        <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 170.733px;" aria-label="CSS grade: activa para ordenar la columna ascendentemente">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="rpta">
                                
                                                </tbody>
                                            </table> 
                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--  -->
                            <div class="row">
                                    <div class="col-1"></div>
                                        <div class="col-10">
                                            <!-- Main content -->
                                            <div class="invoice p-3 mb-3" id="detalle_solicitud">
                                                <!-- title row -->
                                                <div class="card-header">
                                                    <div class="row" style="align-items: center;">
                                                        <div class="col-10"><h3 class="card-title">Respuestas a cotizaciones</h3></div>
                                                    </div>
                                                </div>
                                                <br>
                                                <table id="productos" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 15px;" aria-sort="ascending" aria-label="Rendering engine: activa para ordenar la columna descendentemente">Nro</th>
                                                            <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 262.783px;" aria-label="Browser: activa para ordenar la columna ascendentemente">Producto</th>
                                                            <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 262.783px;" aria-label="Browser: activa para ordenar la columna ascendentemente">Empresa</th>
                                                            <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 123.733px;" aria-label="Browser: activa para ordenar la columna ascendentemente">Fecha</th>
                                                            <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 200.0px;" aria-label="Platform(s): activa para ordenar la columna ascendentemente">Estado de la solicitud</th>
                                                            <th class="sorting" tabindex="0" aria-controls="producto" rowspan="1" colspan="1" style="width: 170.733px;" aria-label="CSS grade: activa para ordenar la columna ascendentemente">Opciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="rpta_solicitud">
                                    
                                                    </tbody>
                                                </table> 
                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                    </section>
                    <!--Detalles -->
                </section>
            </div>  
        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="addSolicitud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cotización</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                        <div class="row col-12">
                            <label for="selectcategoria" class="col-4">Categorías</label>
                            <select class="select2 col-8" id="selectcategoria" style="width:60%;">
                                <option value="">Seleccione una categoría</option>
                            </select>
                    </div>
                </div>
                <div class="form-group" hidden id="cmbSub">
                        <div class="row col-12">
                            <label for="selectsubcategoria" class="col-4">Subcategorías</label>
                            <select class="select2 col-8" id="selectsubcategoria" style="width:60%;">
                            </select>
                    </div>
                </div>
                <div id="cuerpo">

                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success" id="newSolicitud"><i class="fa fa-save"></i> Solicitar</button>
            </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo RUTA_URL.'/public/plugins/jquery/jquery.min.js'?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo RUTA_URL.'/public/plugins/jquery-ui/jquery-ui.min.js'?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo RUTA_URL.'/public/plugins/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
    <!-- Select2 -->
    <script src="<?php echo RUTA_URL.'/public/plugins/select2/js/select2.full.min.js'?>"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="<?php echo RUTA_URL.'/public/js/rpta_solicitud.js'?>"></script>
</body>
</html>