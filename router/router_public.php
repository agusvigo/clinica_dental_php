<?php
/**
 * Navegación
 */
if (isset($inicio)) $contenido = 1;
if (isset($noticias)) {
    $controller = new ControllerLogin;
    $news = $controller->buscar_noticias();
    $contenido = 2;
}
if (isset($registro)) $contenido = 3;
if (isset($inicio_sesion)) $contenido = 4;

/**
 * Acciones
 */
if (isset($accion)){
    switch($accion){
        //Registro de nuevo usuario
        case '11':
            //Validamos el formulario
            //Patrones regexp
            $re_usuario= "/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,32}$/";//Sólo letras y números, entre 2 y 32 caracteres
            $re_password= "/^.{5,}$/";//Más de 5 caracteres
            $re_nombre= "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,32}$/";//Sólo letras, entre 2 y 32 caracteres
            $re_apellidos= '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,80}$/';//Sólo letras, entre 2 y 80 caracteres
            $re_mail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/";//Dirección válida de correo electrónico
            $re_telefono = "/^(6|7|8|9)[0-9]{8}$/";//Número de 9 cifras que empiece por 6, 7, 8 o 9
            //validaciones
            if (preg_match($re_usuario, $usuario)) {$val_usuario = true;} else {$val_usuario = false;} 
            if (preg_match($re_password, $password)) {$val_password = true;} else {$val_password = false;} 
            if ($password === $password_2) {$val_password_2 = true;} else {$val_password_2 = false;} 
            if (preg_match($re_nombre, $nombre)) {$val_nombre = true;} else {$val_nombre = false;} 
            if (preg_match($re_apellidos, $apellidos)) {$val_apellidos = true;} else {$val_apellidos = false;} 
            if (preg_match($re_mail, $mail)) {$val_mail = true;} else {$val_mail = false;} 
            if (preg_match($re_telefono, $telefono)) {$val_telefono = true;} else {$val_telefono = false;} 
            //comprobamos que el usuario sea mayor de 18 años
            //extraemos día mes y año de la fecha de nacimiento
            $day_nac = (substr($fnac,-2,2));
            $mounth_nac = (substr($fnac,-5,2));
            $year_nac = (substr($fnac,-10,4));
            //extraemos día mes y año de la fecha actual
            $fact = date('Y-m-d');
            $day_act = (substr($fact,-2,2));
            $mounth_act = (substr($fact,-5,2));
            $year_act = (substr($fact,-10,4));
            //comparamos las fechas para calcular la edad y comprobamos que el dato no esté vacío
            if($fnac === '' || $year_nac > $year_act-18 || ($year_nac == $year_act-18 && $mounth_nac > $mounth_act) || 
            ($year_nac == $year_act-18 && $mounth_nac == $mounth_act && $day_nac > $day_act)){
                $val_fnac = false;
            } else {
                $val_fnac = true;
            }
            //Comprobamos que todas las validaciones son correctas, si no volvemos a la vista 3
            if (!$val_usuario || !$val_password || !$val_nombre || !$val_apellidos || !$val_mail || !$val_telefono || !$val_fnac){
                $error = 'Los datos introducidos no son correctos';
                $contenido = 3;
                break;
            }
            


            $nuevo_registro = new ControllerLogin;
            if ($password === $password_2){
                $pwd_encripted = password_hash($password, PASSWORD_BCRYPT);
            } else {
                $error = 'Las contraseñas introducidas no coinciden';
                $contenido = 3;
                break;
            }
            if ($error_registro = $nuevo_registro->nuevo_usuario($usuario, $pwd_encripted, $nombre, $apellidos, $mail, $telefono, $fnac, $direccion, $sexo)){
                $error_2 = $error_registro;
                $contenido = 3;
                break;
            } else {
                $menu_nav = 0;
                $contenido = 51;
                $error = "Bienvenid@ $usuario, se ha registrado correctamente en nuestro sitio web, pulse continuar para acceder la página de inicio";
                break;
            }
        //inicio de Sesión
        case '12':
            //Si los datos enviados no están vacíos comprobamos si son correctos
            if (($usuario != '') && ($password != '')){
                $login = new ControllerLogin();
                if ($login->login($usuario,$password)){
                    $menu_nav = 0;
                    $contenido = 50;
                    $error = "Bienvenid@ $usuario, pulse continuar para acceder al Area Privada";
                    unset($login);
                    break;
                } else {$contenido = 4;
                    $error = 'Los datos introducidos son incorrectos, si no está registrado pulse el enlace para hacerlo';
                    break;
                }
            //Si algún dato está vacío volvemos a la página de inicio de sesión
            } else {
                $contenido = 4;
                $error = 'Los datos introducidos son incorrectos, si no está registrado pulse el enlace para hacerlo';
            }
            break;
        default:
            $contenido = 1;
            break;
    }
}

/**
 * Resaltado de botón de navegación en uso
 */
if ($contenido === 1) $boton_inicio = true;
if ($contenido === 2) $boton_noticias = true;
if ($contenido === 3 || $contenido === 50) $boton_registro = true;
if ($contenido === 4 || $contenido === 51) $boton_inicio_sesion = true;
?>