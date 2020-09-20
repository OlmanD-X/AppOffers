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
<body class="">
    <?php require_once RUTA_APP.'/views/inc/menu_public.php'; ?>
    <main class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper pt-2" style="margin-left:0">
                <!-- Main content -->
                <section class="content">

                <!-- Default box -->
                <div class="card card-solid">
                  <div class="card-body">
                    <div class="row" id="detalle-section">

                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                </section>
                <!-- /.content -->
            </div>
            
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
    <script src="<?php echo RUTA_URL.'/public/js/detalles.js'?>"></script>
</body>
</html>