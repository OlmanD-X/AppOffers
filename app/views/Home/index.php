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
        <div class="container-fluid" >
            <div class="row head-main" >
                <div class="col-9">
                    <span class="title-section">Listado de empresas</span>
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
        </div>
        <section class="container-fluid mt-2" >
            <div class="row" id="companies-section" >
                
            </div>
        </section>
    </main>
 
    <div class="modal fade" id="editCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                        </div>
                        <div class="col-3">
                            <img width="180px" height="120px" src="" alt="profile" id="imagen">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label class="col-3" for="companyEdit">Razon social</label>
                            <input type="text" name="" id="razonEdit" disabled="disabled" class="form-control col-9">
                        </div>
                    </div>
                </div>
                <div class="form-group" id="id">
                    <div class="row">
                        <div class="row col-12">
                            <label for="rucEdit" class="col-3">Ruc</label>
                            <input type="text" name="" id="rucEdit" disabled="disabled" class="form-control col-4">
                            <label for="phoneEdit" class="col-2">Teléfono</label>
                            <input type="tel" name="" id="telefonoEdit" class="form-control col-3">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label for="emailEdit" class="col-3">Dirección</label>
                            <input type="text" name="" id="direccionEdit" class="form-control col-9">
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
    <!-- jQuery -->
    <script src="<?php echo RUTA_URL.'/public/plugins/jquery/jquery.min.js'?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo RUTA_URL.'/public/plugins/jquery-ui/jquery-ui.min.js'?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo RUTA_URL.'/public/plugins/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="<?php echo RUTA_URL.'/public/js/empresas.js'?>"></script>
</body>
</html>