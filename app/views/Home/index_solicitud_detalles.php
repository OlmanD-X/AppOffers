<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas</title>
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/plugins/fontawesome-free/css/all.min.css'?>">
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/dist/css/adminlte.min.css'?>">
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/plugins/select2/css/select2.min.css'?>">
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/css/home.css'?>">
</head>
<body>
    <?php require_once RUTA_APP.'/views/inc/menu-us.php'; ?>
    <main class="hold-transition sidebar-mini">
        <br>
        <div class="wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img width="180px" height="120px" src="" alt="profile" id="imagen">
                                    </div>
                                    <h3 class="username text-center" id="razonSocial"></h3>
                                    <p class="text-muted text-center" id="ruc"></p>  

                                    <hr>
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección:</strong>
                                    <p class="text-muted" id="direccion"></p>

                                    <hr>
                                    <strong><i class="fas fa-book mr-1"></i> Telefono:</strong>
                                    <p class="text-muted" id="telefono">
                                    </p>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <!---col_md_8-->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Documentos</h3>
                                            </div>
                                        </div>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>File Name</th>
                                                <th>File Size</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td>Functional-requirements.docx</td>
                                                <td>49.8005 kb</td>
                                                <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                </div>
                                                </td>
                                            <tr>
                                                <td>UAT.pdf</td>
                                                <td>28.4883 kb</td>
                                                <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                </div>
                                                </td>
                                            <tr>
                                                <td>Email-from-flatbal.mln</td>
                                                <td>57.9003 kb</td>
                                                <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                </div>
                                                </td>
                                            <tr>
                                                <td>Logo.png</td>
                                                <td>50.5190 kb</td>
                                                <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>  
                                                </div>
                                                </td>
                                            <tr>
                                                <td>Contract-10_12_2014.docx</td>
                                                <td>44.9715 kb</td>
                                                <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                </div>
                                                </td>
                                            </tbody>
                                        </table>
                                    </div>          
                                </div>
                            </div>              
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </section>
        </div>
    </main>

    <!-- jQuery -->
    <script src="<?php echo RUTA_URL.'/public/plugins/jquery/jquery.min.js'?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo RUTA_URL.'/public/plugins/jquery-ui/jquery-ui.min.js'?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo RUTA_URL.'/public/plugins/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="<?php echo RUTA_URL.'/public/js/solicitud_detalles.js'?>"></script>
</body>
</html>
