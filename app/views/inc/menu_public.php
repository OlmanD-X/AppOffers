<header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <div class="row">
                        <span class="col-8 title-header pt-2 pl-2">App Offers</span>
                    </div>
                </div>
                <?php 
                    if($parameters['usuario']!=null){
                ?>
                        <nav class="col-5 navbar navbar-expand navbar-white navbar-light nav-main-center">
                            <ul class="navbar-nav">
                                <li class="nav-item d-none d-sm-inline-block">
                                    <a href="/AppOffers/Home" class="nav-link"> Inicio</a>
                                </li>
                                <li class="nav-item d-none d-sm-inline-block">
                                    <a href="/AppOffers/Chat" class="nav-link"> Chats</a>
                                </li>
                                <li class="nav-item d-none d-sm-inline-block">
                                    <a href="/AppOffers/Cotizaciones/index_cotizacion" class="nav-link"> Cotizaciones</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="col-3 profile-menu">
                            <ul class="profile-list">

                                <li><a class="link-profile"> <?php echo $_SESSION['usuario']['nombre']?> <i class="fa fa-angle-down profile-link"></i></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo RUTA_URL.'/Login/logoutPublic';?>">Cerrar Sesión <i class="fa fa-sign-out-alt"></i></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                <?php
                    }
                    else{
                ?>
                    <div class="col-3 offset-5 profile-menu">
                        <ul class="profile-list">
                            <li><button class="btn btn-info" id="btnIngresar"> INGRESAR <i class="fa fa-sign-in-alt"></i></button>
                            </li>
                        </ul>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </header>