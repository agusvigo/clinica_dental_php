<?php

/**
 * Navegación
 * Segun el boón capturado por post elegimos el menú.
 * Con la variable $logged_rol nos aseguramos que los  usuarios sólo puedan acceder a los menús que le corresponden.
 */
if (isset($inicio)) $contenido = 1;
if (isset($noticias)) {
    $news = $controller_main->buscar_noticias();
    $contenido = 2;
}
if (isset($citaciones) && (($logged_rol === 'user') || ($logged_rol === 'admin'))) $contenido = 3;
if (isset($perfil) && (($logged_rol === 'user') || ($logged_rol === 'admin'))) $contenido = 4;
if (isset($noticias) && (($logged_rol === 'user') || ($logged_rol === 'admin'))) $contenido = 2;
if (isset($citaciones) && ($logged_rol === 'user')) {
    $contenido = 5;
    If ($controller_main->buscar_citas($logged_idUser)) $logged_user_dates = $controller_main->buscar_citas($logged_idUser);
}
if (isset($perfil) && (($logged_rol === 'user') || ($logged_rol === 'admin'))) $contenido = 6;
if (isset($usuarios_admin) && ($logged_rol === 'admin')) $contenido = 8;
if (isset($citaciones_admin) && ($logged_rol === 'admin')) $contenido = 9;
if (isset($noticias_admin) && ($logged_rol === 'admin')) {
    $news = $controller_main->buscar_noticias();
    $contenido = 10;
}
if (isset($cerrar_sesion)) {
    $controller_main->log_out();
    exit();
}

/**
 * Acciones
 */

if (isset($accion)){
    switch($accion){
        //Opciones de Perfil
        case '1':
            //Carga la vista de modificación del perfil
            if (isset($modif_mi_perfil)) {
                $contenido = 11;
                break;
            }
            //Carga la vista de modificación de password
            if (isset($modif_mi_pwd)) {
                $contenido = 12;
                break;
            }

        //Opciones de modificación de perfil
        case '2':
            //Realiza las modificaciones
            if (isset($modif_mi_perfil)) {
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
                //Comprobamos que todas las validaciones son correctas, si no volvemos a la vista 11
                if (!$val_nombre || !$val_apellidos || !$val_mail || !$val_telefono || !$val_fnac){
                    $error = 'Los datos introducidos no son correctos';
                    $contenido = 11;
                    break;
                }
            
                $error = $controller_main->modificar_user_data($logged_idUser, $nombre, $apellidos, $mail, $logged_email, $telefono, $fnac, $direccion, $sexo);
                //Si la modificación es correcta volvemos a la vista 6 y lanzamos el mensaje que la actualización ha sido correcta
                if ($error === 'Sus datos se han actualizado correctamente') {
                    $contenido = 50;
                    break;
                //Si falla volvemos a la vista 11 e informamos del error   
                } else {
                    $contenido = 11;
                    break;
                }
            }
            //Volvemos a la vista 6
            if (isset($volver)) {
                $contenido = 6;
                break;
            }

        //Confirmación de modificación de password    
        case '3':
            //Realiza las modificaciones
            if (isset($modif_mi_pwd)) {
                if ($password === $password_2){
                    $enc_pwd = password_hash($password, PASSWORD_BCRYPT);
                    if ($controller_main->actualizar_password($logged_idLogin, $enc_pwd)){
                        $error = 'Sus datos se han actualizado correctamente';
                        $contenido = 50;
                        break;
                    } else {
                        $error = 'No se ha podido realizar la actualización, contacte con el administrador';
                        $contenido = 12;
                        break;
                    }
                } else {
                    $error = 'Las contraseñas introducidas no coinciden';
                    $contenido = 12;
                    break;
                }
            }
            //Volvemos a la vista 6
            if (isset($volver)) {
                $contenido = 6;
                break;
            }

        //Modificación de cita
        case '4':
            //Activa la vista de modificación de la cita
            if (isset($modif_cita)) {
                $contenido = 13;
                break;
            }
            //Activa la vista de borrado de la cita
            if (isset($borrar_cita)) {
                $contenido = 52;
                $error = "Se va a borrar la cita seleccionada, pulse borrar para continuar o volver para cancelar";
                break;
            }

        //Confirmación de modificación de cita
        case '5':
            //Modificamos la cita
            if (isset($modif_cita)) {
                //Si la cita es anterior al dia actual volvemos a la vista 13 y avisamos con el error
                $fechaActual = date('Y-m-d');
                if ($fechaCita < $fechaActual){
                    $contenido = 13;
                    $error = 'La fecha no puede ser en el pasado';
                    break;
                }
                if ($controller_main->modificar_cita($idCita, $logged_idUser, $fechaCita, $motivoCita)){
                    $contenido = 51;
                    $error = 'Se ha modificado la cita correctamente';
                    break;
                }
            }
            //Volvemos a la vista 5
            if (isset($volver)) {
                $contenido = 5;
                If ($controller_main->buscar_citas($logged_idUser)) $logged_user_dates = $controller_main->buscar_citas($logged_idUser);
                break;
            }

        //Confirmación de borrado de cita
        case '6':
            //Modificamos la cita
            if (isset($borrar_cita)) {
                if ($controller_main->borrar_cita($idCita)){
                    $contenido = 5;
                    If ($controller_main->buscar_citas($logged_idUser)) $logged_user_dates = $controller_main->buscar_citas($logged_idUser);
                    break;
                } else {
                    $contenido = 52;
                    $error = 'No se ha podido eliminar la cita, contacte con el administrador';
                    break;
                }
            }
            //Volvemos a la vista 5
            if (isset($volver)) {
                $contenido = 5;
                If ($controller_main->buscar_citas($logged_idUser)) $logged_user_dates = $controller_main->buscar_citas($logged_idUser);
                break;
            }

        //Crear cita
        case '7':
            //Cargamos la vista 14
            $contenido = 14;
            break;
            

        //Confirmar cita
        case '8':
            //Creamos la cita
            if (isset($crear_cita)) {
                $fechaActual = date('Y-m-d');
                //Si la cita es anterior al dia actual volvemos a la vista 14 y avisamos con el error
                if ($fechaCita < $fechaActual){
                    $contenido = 14;
                    $error = 'La fecha no puede ser en el pasado';
                    break;
                }
                $idUser = $logged_idUser;
                if ($controller_main->crear_cita($idUser, $fechaCita, $motivoCita)){
                    $contenido = 53;
                    break;
                } else {
                    $contenido = 14;
                    $error = 'No se ha podido crear la cita, contacte con el administrador';
                    break;
                }
            }
            //Volvemos a la vista 5
            if (isset($volver)) {
                $contenido = 5;
                If ($controller_main->buscar_citas($logged_idUser)) $logged_user_dates = $controller_main->buscar_citas($logged_idUser);
                break;
            }

        //Buscar usuarios
        case '9':
            //Buscamos los usuarios coincidentes con los datos pasados por el formulario
            if (isset($buscar_usuarios)) {
                If ($controller_main->buscar_todos_usuarios($idUser, $nombre, $apellidos, $mail, $telefono, $fnac, $direccion, $sexo, $idLogin, $usuario, $rol)){
                    $busqueda_usuarios = $controller_main->buscar_todos_usuarios($idUser, $nombre, $apellidos, $mail, $telefono, $fnac, $direccion, $sexo, $idLogin, $usuario, $rol);
                    $contenido = 8;
                    break;
                } else {
                    $error = 'No se han obtenido resultados';
                    $contenido = 8;
                    break;
                }
            }
            //Borra el formulario
            if (isset($volver)) {
                $contenido = 8;
                break;
            }

        //Buscar usuarios
        case '10':
            //Cargamos la vista para modificar el usuario
            if (isset($modif_usuario)) {
                $contenido = 15;
                break;
            }
            //Cargamos la vista para borrar el usuario
            if (isset($borrar_usuario)) {
                $contenido = 16;
                break;
            }
            //Cargamos la vista para borrar el usuario
            if (isset($reset_pwd)) {
                $contenido = 18;
                break;
            }

        //Buscar usuarios
        case '11':
            //Cargamos la vista para modificar el usuario
            if (isset($modif_usuario)) {
                //Validamos el formulario
                //Patrones regexp
                $re_usuario= "/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,32}$/";//Sólo letras y números, entre 2 y 32 caracteres
                $re_rol= "/^(user|admin)$/";//'user o admin'
                $re_password= "/^.{5,}$/";//Más de 5 caracteres
                $re_nombre= "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,32}$/";//Sólo letras, entre 2 y 32 caracteres
                $re_apellidos= '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,80}$/';//Sólo letras, entre 2 y 80 caracteres
                $re_mail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/";//Dirección válida de correo electrónico
                $re_telefono = "/^(6|7|8|9)[0-9]{8}$/";//Número de 9 cifras que empiece por 6, 7, 8 o 9
                //validaciones
                if (preg_match($re_usuario, $usuario)) {$val_usuario = true;} else {$val_usuario = false;} 
                if (preg_match($re_rol, $rol)) {$val_rol = true;} else {$val_rol = false;} 
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
                //Comprobamos que todas las validaciones son correctas, si no volvemos a la vista 15
                if (!$val_usuario ||!$val_rol || !$val_nombre || !$val_apellidos || !$val_mail || !$val_telefono || !$val_fnac){
                    $error = 'Los datos introducidos no son correctos';
                    $contenido = 15;
                    break;
                }
                    $resultado = $controller_main->modificar_usuario($idUser, $nombre, $apellidos, $mail, $mail_old, $telefono, $fnac, $direccion, $sexo, $idLogin, $usuario, $usuario_old, $rol);
                    if ($resultado === 'El usuario se ha modificado correctamente'){
                        $contenido = 54;
                        $error = "El ID User $idUser se ha modificado correctamente";
                        break;
                    } else {
                        $contenido = 15;
                        $error = $resultado;
                        break;

                    }
            }
            //Volvemos a la vista 8
            if (isset($volver)) {
                $contenido = 8;
                break;
            }

        //Borrar usuario
        case '12':
            //Borramos el usuario
            if (isset($borrar_usuario)) {
                if ($controller_main->borrar_usuario($idUser)){
                    $contenido = 55;
                    $error = "El ID User $idUser se ha borrado correctamente";
                    break;
                } else {
                    $contenido = 16;
                    $error = 'Se ha producido un error en la consulta';
                    break;

                }
            }
            //Volvemos a la vista 8
            if (isset($volver)) {
                $contenido = 8;
                break;
            }

        //Crear usuario
        case '13':
            //Cargamos la vista para crear el usuario
            $contenido = 17;
            break;

        //Crear usuario
        case '14':
            //Creamos el usuario
            if (isset($crear_usuario)){
                //Validamos el formulario
                //Patrones regexp
                $re_usuario= "/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,32}$/";//Sólo letras y números, entre 2 y 32 caracteres
                $re_rol= "/^(user|admin)$/";//'user o admin'
                $re_password= "/^.{5,}$/";//Más de 5 caracteres
                $re_nombre= "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,32}$/";//Sólo letras, entre 2 y 32 caracteres
                $re_apellidos= '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,80}$/';//Sólo letras, entre 2 y 80 caracteres
                $re_mail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/";//Dirección válida de correo electrónico
                $re_telefono = "/^(6|7|8|9)[0-9]{8}$/";//Número de 9 cifras que empiece por 6, 7, 8 o 9
                //validaciones
                if (preg_match($re_usuario, $usuario)) {$val_usuario = true;} else {$val_usuario = false;} 
                if (preg_match($re_rol, $rol)) {$val_rol = true;} else {$val_rol = false;} 
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
                //Comprobamos que todas las validaciones son correctas, si no volvemos a la vista 15
                if (!$val_usuario ||!$val_rol || !$val_nombre || !$val_apellidos || !$val_mail || !$val_telefono || !$val_fnac){
                    $error = 'Los datos introducidos no son correctos';
                    $contenido = 17;
                    break;
                }
                //Encriptamos la contraseña
                $pwd_enc = password_hash($password,PASSWORD_BCRYPT);
                //Creamos el usuario
                $resultado = $controller_main->crear_usuario($nombre, $apellidos, $mail, $telefono, $fnac, $direccion, $sexo, $usuario, $pwd_enc, $rol);
                if ($resultado === "Se ha creado correctamente el usuario solicitado") {
                    $contenido = 56;
                    $error = $resultado;
                    break;
                } else {
                    $contenido = 17;
                    $error = $resultado;
                    break;
                }

            }
            //Volvemos a la vista 8
            if (isset($volver)) {
                $contenido = 8;
                break;
            }

        //Reset password
        case '15':
            //Reseteamos la password
            if (isset($reset_pwd)){
                //Comprobamos que las contraseñas coincidan y no estén vacías
                if ($password !== $password_2){
                    $contenido = 18;
                    $error = 'Las contraseñas introducidas no coinciden';
                    break;
                }if ($password === ''){
                    $contenido = 18;
                    $error = 'La contraseña no puede estar en blanco';
                    break;
                }
                //Encriptamos la contraseña
                $pwd_enc = password_hash($password,PASSWORD_BCRYPT);
                //Modificamos la contraseña
                if ($controller_main->actualizar_password($idLogin, $pwd_enc)) {
                    $error = "Se ha actualizado correctamente la contraseña del ID User $idUser";
                    $contenido = 57;
                    break;
                } else {
                    $contenido = 18;
                    $error = 'No se ha podido modificar la contraseña, ha fallado la consulta';
                    break;
                }

            }
            //Volvemos a la vista 8
            if (isset($volver)) {
                $contenido = 8;
                break;
            }

        //Buscar todas las Citas
        case '16':
            //Buscamos las citas
            if (isset($buscar_citas)){
                if($controller_main->buscar_citas_todas($idCita, $idUser, $fechaCita, $motivoCita)){
                    $dates = $controller_main->buscar_citas_todas($idCita, $idUser, $fechaCita, $motivoCita);
                    $contenido = 9;
                    break;
                } else {
                    $error = 'No se han encontrado citas';
                    $contenido = 9;
                    break;
                }
            }
            //Volvemos a la vista 8
            if (isset($volver)) {
                $contenido = 9;
                break;
            } 
            
        //Modificación de cita
        case '17':
            //Activa la vista de modificación de la cita
            if (isset($modif_cita)) {
                $contenido = 20;
                break;
            }
            //Activa la vista de borrado de la cita
            if (isset($borrar_cita)) {
                $contenido = 59;
                $error = "Se va a borrar la cita seleccionada, pulse borrar para continuar o volver para cancelar";
                break;
            }

        //Confirmación de modificación de cita
        case '18':
            //Modificamos la cita
            if (isset($modif_cita)) {
                //Si la cita es anterior al dia actual volvemos a la vista 20 y avisamos con el error
                $fechaActual = date('Y-m-d');
                if ($fechaCita < $fechaActual){
                    $contenido = 20;
                    $error = 'La fecha no puede ser en el pasado';
                    break;
                }
                if ($controller_main->modificar_cita($idCita, $idUser, $fechaCita, $motivoCita)){
                    $contenido = 58;
                    $error = 'Se ha modificado la cita correctamente';
                    break;
                }
            }
            //Volvemos a la vista 9
            if (isset($volver)) {
                $contenido = 9;
                break;
            }

        //Confirmación de borrado de cita
        case '19':
            //Borramos la cita
            if (isset($borrar_cita)) {
                if ($controller_main->borrar_cita($idCita)){
                    $contenido = 9;
                    break;
                } else {
                    $contenido = 52;
                    $error = 'No se ha podido eliminar la cita, contacte con el administrador';
                    break;
                }
            }
            //Volvemos a la vista 9
            if (isset($volver)) {
                $contenido = 9;
                break;
            }

        //Crear cita
        case '20':
            //Cargamos la vista 21
            $contenido = 21;
            break;
            

        //Confirmar cita
        case '21':
            //Creamos la cita
            if (isset($crear_cita)) {
                $fechaActual = date('Y-m-d');
                //Si la cita es anterior al dia actual volvemos a la vista 14 y avisamos con el error
                if ($fechaCita < $fechaActual){
                    $contenido = 21;
                    $error = 'La fecha no puede ser en el pasado';
                    break;
                }
                //Comprobamos si el usuario existe, si no es así devolvemos el error
                if(!$controller_main->buscar_idUser($idUser)){
                    $contenido = 21;
                    $error = 'El usuario no existe';
                    break;
                }
                if ($controller_main->crear_cita($idUser, $fechaCita, $motivoCita)){
                    $contenido = 60;
                    break;
                } else {
                    $contenido = 14;
                    $error = 'No se ha podido crear la cita, contacte con el administrador';
                    break;
                }
            } 
            
        //Modificación de noticia
        case '22':
            //Activa la vista de modificación de la noticia
            if (isset($modif_noticia)) {
                $contenido = 22;
                break;
            }
            //Activa la vista de borrado de la noticia
            if (isset($borrar_noticia)) {
                $contenido = 61;
                $error = "Se va a borrar la Noticia seleccionada, pulse borrar para continuar o volver para cancelar";
                break;
            }
            
        //Borrado de la noticia
        case '23':
            //Borra la noticia
            if (isset($borrar_noticia)) {
                if($controller_main->borrar_noticia($idNoticia)){
                    $news = $controller_main->buscar_noticias();
                    $contenido = 10;
                    break;
                } else {
                    $error = 'No se ha borrado la noticia, se ha producido un error en la consulta';
                    $contenido = 61;
                    break;
                }
            }

            //Volvemos a la vista 10
            if (isset($volver)) {
                $news = $controller_main->buscar_noticias();
                $contenido = 10;
                break;
            }
            
        //Modificación de la noticia
        case '24':
            //Modifica la noticia
            if (isset($modif_noticia)) {
                $resultado = $controller_main->modificar_noticia($logged_idUser, $idNoticia, $titulo, $titulo_orig, $texto, $fecha);
                if ($resultado === 'La noticia se ha modificado satisfactoriamente'){
                    if (file_exists('../assets/images/img_resized.jpeg')){
                        rename("../assets/images/img_resized.jpeg","../assets/images/img_$idNoticia.jpeg");
                    }
                    $contenido = 62;
                    break;
                } else {
                    $error = $resultado;
                    $contenido = 22;
                    break;
                }
            }

            //Volvemos a la vista 10
            if (isset($volver)) {
                if (file_exists('../assets/images/img_resized.jpeg')){
                    unlink("../assets/images/img_resized.jpeg");
                }
                $news = $controller_main->buscar_noticias();
                $contenido = 10;
                break;
            } 
            
        //Crear noticia
        case '25':
            //Activa la vista de creación de la noticia
            if (isset($crear_noticia)) {
                $contenido = 23;
                break;
            }
            
        //Creación de la noticia
        case '26':
            //Crea la noticia
            if (isset($crear_noticia)) {
                if ($resultado = $controller_main->crear_noticia($titulo, $texto, $fecha, $idUser)){
                    $idNoticia = $resultado;
                    if (file_exists('../assets/images/img_resized.jpeg')){
                        rename("../assets/images/img_resized.jpeg","../assets/images/img_$idNoticia.jpeg");
                    }
                    $contenido = 63;
                    break;
                } else {
                    if (file_exists('../assets/images/img_resized.jpeg')){
                        unlink("../assets/images/img_resized.jpeg");
                    }
                    $error = 'No se ha podido crear la noticia, ha habido un error en la consulta';
                    $contenido = 23;
                    break;
                }
            }

            //Volvemos a la vista 10
            if (isset($volver)) {
                if (file_exists('../assets/images/img_resized.jpeg')){
                    unlink('../assets/images/img_resized.jpeg');
                }
                $news = $controller_main->buscar_noticias();
                $contenido = 10;
                break;
            } 
        
        default:
            $controller_main->log_out();
            break;
    }
}

/**
 * Resaltado de botón de navegación en uso
 */
if ($contenido === 1) $boton_inicio = true;
if ($contenido === 2) $boton_noticias = true;
if ($contenido === 5 || $contenido === 13  || $contenido === 14 || $contenido === 51 || $contenido === 52 || $contenido === 53) $boton_citaciones = true;
if ($contenido === 8 || $contenido === 15  || $contenido === 16 || $contenido === 17 || $contenido === 18 || $contenido === 54 || $contenido === 55 || $contenido === 56 || $contenido === 57) $boton_usuarios_admin = true;
if ($contenido === 9 || $contenido === 20  || $contenido === 21 || $contenido === 58 || $contenido === 59 || $contenido === 60) $boton_citaciones_admin = true;
if ($contenido === 10 || $contenido === 22 || $contenido === 23 || $contenido === 61 || $contenido === 62 || $contenido === 63) $boton_noticias_admin = true;
if ($contenido === 6 || $contenido === 11  || $contenido === 12 || $contenido === 50) $boton_perfil = true;
if ($contenido === 7) $boton_cerrar_sesion = true;
?>