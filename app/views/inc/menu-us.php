<header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <div class="row">
                        <img src="<?php echo RUTA_URL.'/public/img/logo.webp'?>" alt="Logo" class="img-fluid col-4 logo">
                        <span class="col-8 title-header">Vensoft Software</span>
                    </div>
                </div>
                <nav class="col-5 navbar navbar-expand navbar-white navbar-light nav-main-center">
                        <ul class="navbar-nav">
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="/AppOffers/Home" class="nav-link"> Empresas</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="/AppOffers/Solicitudes" class="nav-link"> Solicitudes</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="/AppOffers/Caracteristica" class="nav-link"> Categorías</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="/AppOffers/Usuarios" class="nav-link"> Usuarios</a>
                            </li>
                        </ul>
                </nav>
                <div class="col-3 profile-menu">
                    <ul class="profile-list">
                        <li><a class="link-profile"> <?php echo $_SESSION['usuario']['nombre']?> <i class="fa fa-angle-down profile-link"></i></a>
                            <ul>
                                <li>
                                    <a href="<?php echo RUTA_URL.'/Login/logout';?>">Cerrar Sesión <i class="fa fa-sign-out-alt"></i></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>