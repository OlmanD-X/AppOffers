<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vensoft</title>
    <link rel="stylesheet" href="<?php echo RUTA_URL.'/public/css/login.css'?>">
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"> Inicia Sesión </h2>

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="<?php echo RUTA_URL.'/public/img/logo.bmp'?>" alt="Logo"/>
            </div>

            <!-- Login Form -->
            <form method="post" action="<?php echo RUTA_URL.'/Login/login'?>">
            <input type="text" id="login" class="fadeIn second" name="user" placeholder="Usuario">
            <input type="password" id="password" class="fadeIn third" name="pass" placeholder="Contraseña">
            <input type="submit" class="fadeIn fourth" value="Iniciar Sesión">
            </form>

            <!-- Remind Passowrd -->
            <!-- <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
            </div> -->

        </div>
    </div>
</body>
</html>