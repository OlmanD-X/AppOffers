<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas</title>
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/plugins/fontawesome-free/css/all.min.css'?>">
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/dist/css/adminlte.min.css'?>">
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/css/home.css'?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/plugins/datatables-bs4/css/dataTables.bootstrap4.css'?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/plugins/select2/css/select2.min.css'?>">
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'?>">

</head>

<body>
    <?php require_once RUTA_APP.'/views/inc/menu-us.php'; ?>
    <main>
        <!-- <div class="container-fluid">
            <div class="row head-main">
                <div class="col-8">
                    <span class="title-section">Listado</span>
                </div>
                <div class="col-3">
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
        </div> -->

    <!-- Main content -->
        <div class="card mt-1 mb-0">
            <div class="card-header">
                <div class="row" style="align-items: center;">
                    <div class="col-10"><h3 class="card-title">Listado de Categorias</h3></div>
                    <div class="col-2" style="padding-left:80px">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarCategoria"><i class="fa fa-plus"></i>Nuevo</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="categorias" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="categoria" rowspan="1" colspan="1" style="width: 15px;" aria-sort="ascending" aria-label="Rendering engine: activa para ordenar la columna descendentemente">Nro</th>
                                    <th class="sorting" tabindex="0" aria-controls="categoria" rowspan="1" colspan="1" style="width: 233.3px;" aria-label="Platform(s): activa para ordenar la columna ascendentemente">Descripcion</th>
                                    <th class="sorting" tabindex="0" aria-controls="categoria" rowspan="1" colspan="1" style="width: 123.733px;" aria-label="Engine version: activa para ordenar la columna ascendentemente">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-1 m-0">
            <div class="card-header">
                <div class="row" style="align-items: center;">
                    <div class="col-10"><h3 class="card-title">Listado de SubCategorias</h3></div>
                    <div class="col-2" style="padding-left:80px">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarSubcategoria"><i class="fa fa-plus"></i>Nuevo</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="subcategorias" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="subcategoria" rowspan="1" colspan="1" style="width: 15px;" aria-sort="ascending" aria-label="Rendering engine: activa para ordenar la columna descendentemente">Nro</th>
                                    <th class="sorting" tabindex="0" aria-controls="subcategoria" rowspan="1" colspan="1" style="width: 233.3px;" aria-label="Platform(s): activa para ordenar la columna ascendentemente">Categoria</th>
                                    <th class="sorting" tabindex="0" aria-controls="subcategoria" rowspan="1" colspan="1" style="width: 233.3px;" aria-label="Platform(s): activa para ordenar la columna ascendentemente">Subcategoria</th>
                                    <th class="sorting" tabindex="0" aria-controls="subcategoria" rowspan="1" colspan="1" style="width: 123.733px;" aria-label="Engine version: activa para ordenar la columna ascendentemente">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-1 m-0">
            <div class="card-header">
                <div class="row" style="align-items: center;">
                    <div class="col-10"><h3 class="card-title">Listado de Caracteristicas</h3></div>
                    <div class="col-2" style="padding-left:80px">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarCaracteristica"><i class="fa fa-plus"></i>Nuevo</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="caracteristicas" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="caracteristica" rowspan="1" colspan="1" style="width: 15px;" aria-sort="ascending" aria-label="Rendering engine: activa para ordenar la columna descendentemente">Nro</th>
                                    <th class="sorting" tabindex="0" aria-controls="caracteristica" rowspan="1" colspan="1" style="width: 233.3px;" aria-label="Platform(s): activa para ordenar la columna ascendentemente">SubCategoria</th>
                                    <th class="sorting" tabindex="0" aria-controls="caracteristica" rowspan="1" colspan="1" style="width: 233.3px;" aria-label="Platform(s): activa para ordenar la columna ascendentemente">Caracteristica</th>
                                    <th class="sorting" tabindex="0" aria-controls="caracteristica" rowspan="1" colspan="1" style="width: 123.733px;" aria-label="CSS grade: activa para ordenar la columna ascendentemente">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <!-- /.content -->

    </main>
    <!-- Modal -->
    <div class="modal fade" id="agregarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label class="col-3" for="descripcionCategoria">Descripcion</label>
                            <input type="text" name="" id="descripcionCategoria" class="form-control col-9">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success" id="nuevaCategoria"><i class="fa fa-save"></i> Registrar</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="agregarSubcategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar SubCategoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label for="selectcategorias" class="col-3">Categorias</label>
                            <select class="select2 form-control" id="selectcategorias" style="width:67%;">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label class="col-3" for="descripcionSubcategoria">Descripcion</label>
                            <input type="text" name="" id="descripcionSubcategoria" class="form-control col-8">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success" id="nuevaSubcategoria"><i class="fa fa-save"></i> Registrar</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="agregarCaracteristica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Caracteristica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label for="selectsub" class="col-3">Subcategorias</label>
                            <select class="select2 form-control" id="selectsub" multiple="" style="width:75%;">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label class="col-3" for="descripcionCaracteristica">Descripcion</label>
                            <input type="text" name="" id="descripcionCaracteristica" class="form-control col-9">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success" id="nuevaCaracteristica"><i class="fa fa-save"></i> Registrar</button>
            </div>
            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="editarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label class="col-3" for="descripcionCategoriaEdit">Descripcion</label>
                            <input type="text" name="" id="descripcionCategoriaEdit" class="form-control col-9">
                            <input type="text" name="" id="idCat" class="form-control col-9 d-none">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success" id="actualizarCategoria"><i class="fa fa-save"></i> Actualizar</button>
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
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- Select2 -->
    <script src="<?php echo RUTA_URL.'/public/plugins/select2/js/select2.full.min.js'?>"></script>
    <!-- DataTables -->
    <script src="<?php echo RUTA_URL.'/public/plugins/datatables/jquery.dataTables.js'?>"></script>
    <script src="<?php echo RUTA_URL.'/public/plugins/datatables-bs4/js/dataTables.bootstrap4.js'?>"></script>
    <script src="<?php echo RUTA_URL.'/public/js/caracteristica.js'?>"></script>
</body>
</html>