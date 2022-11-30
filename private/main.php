<?php
//*******************************Página Privada Principal ********************************/
require './config/config.php';
require './filter/filter.php';
require './modelo/MI_DB.php';
require './controlador/ControllerPrivate.php';
//chequeamos la sesión antes de cargar la página
$controller_main = new ControllerPrivate;
$user_login = $controller_main->check_login();
require './variables/variables.php';
require './router/router_private.php';
require './views/header.php';
require './views/contenido/contenido.php';
require './views/footer.php';
?>