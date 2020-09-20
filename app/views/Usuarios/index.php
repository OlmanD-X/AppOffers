<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas</title>
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/plugins/fontawesome-free/css/all.min.css'?>">
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/dist/css/adminlte.min.css'?>">
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/css/home.css'?>">
</head>
<body>
    <?php require_once RUTA_APP.'/views/inc/menu-us.php'; ?>
    <main>
        <div class="container-fluid">
            <div class="row head-main">
                <div class="col-7">
                    <span class="title-section">Listado de Usuarios</span>
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
                <div class="col-2">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Addusuario"><i class="fa fa-plus"></i> Agregar</button>
                </div>
            </div>
        </div>
        <section class="container-fluid mt-2">
            <div class="row" id="usuarios-section">

            </div>
        </section>
    </main>
 
    <div class="modal fade" id="editusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelEdit">Cambiar contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label class="col-3" for="usuarioEdit">Usuario</label>
                            <input type="text" name="" id="usuarioEdit" disabled="disabled" class="form-control col-9">
                        </div>
                    </div>
                </div>
                <div class="form-group" id="id">
                    <div class="row">
                        <div class="row col-12">
                            <label for="passwordEdit" class="col-3">Password</label>
                            <input type="password" name="" id="passwordEdit" class="form-control col-9">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success" id="updateCompany"><i class="fa fa-save"></i> Registrar</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Addusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label class="col-3" for="firstName">Nombre:</label>
                            <input type="text" name="" id="firstName"  class="form-control col-9">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label class="col-3" for="lastName">Apellidos:</label>
                            <input type="text" name="" id="lastName"  class="form-control col-9">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label class="col-3" for="email">Email:</label>
                            <input type="text" name="" id="email"  class="form-control col-9">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label class="col-3" for="usuario">Usuario:</label>
                            <input type="text" name="" id="usuario"  class="form-control col-9">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label class="col-3" for="password">Password:</label>
                            <input type="password" name="" id="password"  class="form-control col-9">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                                <label for="selectsub" class="col-3">Tipo:</label>
                                <select class="select2 form-control" id="idtipo" style="width:75%;">
                                </select>
                            </div>
                        </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label for="selectsub" class="col-3">Empresa:</label>
                            <select class="select2 form-control" id="idempresa" style="width:75%;">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success" id="btnAddCompany"><i class="fa fa-save"></i> Registrar</button>
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
    <script src="<?php echo RUTA_URL.'/public/js/usuarios.js'?>"></script>
</body>
</html>