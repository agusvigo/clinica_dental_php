<?php
/********************** Datos del usuario logeado ***************************/

//Tabla users_login
$logged_idLogin = $user_login['idLogin'];
$logged_idUser = $user_login['idUser'];
$logged_user = $user_login['usuario'];
$logged_rol = $user_login['rol'];
//Tabla users_data
$user_data = $controller_main->buscar_idUser($logged_idUser);
$logged_nombre = $user_data['nombre'];
$logged_apellidos = $user_data['apellidos'];
$logged_email = $user_data['email'];
$logged_telefono = $user_data['telefono'];
$logged_fnac = $user_data['fnac'];
$logged_direccion = $user_data['direccion'];
$logged_sexo = $user_data['sexo'];

/********************** Datos del contenido ***************************/

if ($logged_rol === 'admin') $menu_nav =3;
if ($logged_rol === 'user') $menu_nav =2;
$contenido = 1;

$boton_inicio = false;
$boton_noticias = false;
$boton_citaciones = false;
$boton_usuarios_admin = false;
$boton_citaciones_admin = false;
$boton_noticias_admin = false;
$boton_perfil = false;
$boton_cerrar_sesion = false;

/********************** Validación de formularios ***************************/

$val_usuario = null;
$val_rol = null;
$val_password = null;
$val_password_2 = null;
$val_nombre = null;
$val_apellidos = null;
$val_mail = null;
$val_telefono = null;
$val_fnac = null;

?>