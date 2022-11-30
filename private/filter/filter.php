<?php
/*****************************************filter_private*******************************/

/***************************************Formularios***********************************/
$accion = filter_input(INPUT_POST,'accion',FILTER_SANITIZE_NUMBER_INT);
$idUser = filter_input(INPUT_POST,'idUser',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$idLogin = filter_input(INPUT_POST,'idLogin',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$usuario = filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$usuario_old = filter_input(INPUT_POST,'usuario_old',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$rol = filter_input(INPUT_POST,'rol',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password_2 = filter_input(INPUT_POST,'password_2',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nombre = filter_input(INPUT_POST,'nombre',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$apellidos = filter_input(INPUT_POST,'apellidos',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$mail = filter_input(INPUT_POST,'mail',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$mail_old = filter_input(INPUT_POST,'mail_old',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$mail_2 = filter_input(INPUT_POST,'mail_2',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$telefono = filter_input(INPUT_POST,'telefono',FILTER_SANITIZE_NUMBER_INT);
$fnac = filter_input(INPUT_POST,'fnac',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$direccion = filter_input(INPUT_POST,'direccion',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sexo = filter_input(INPUT_POST,'sexo',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$idCita = filter_input(INPUT_POST,'idCita',FILTER_SANITIZE_NUMBER_INT);
$fechaCita = filter_input(INPUT_POST,'fechaCita',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$motivoCita = filter_input(INPUT_POST,'motivoCita',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$idNoticia = filter_input(INPUT_POST,'idNoticia',FILTER_SANITIZE_NUMBER_INT);
$titulo = filter_input(INPUT_POST,'titulo',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$titulo_orig = filter_input(INPUT_POST,'titulo_orig',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$imagen = filter_input(INPUT_POST,'imagen',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$fecha = filter_input(INPUT_POST,'fecha',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$texto = filter_input(INPUT_POST,'texto',FILTER_SANITIZE_FULL_SPECIAL_CHARS);


/****************************************Navegación******************************************/
$inicio = filter_input(INPUT_POST,'inicio',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$noticias = filter_input(INPUT_POST,'noticias',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cerrar_sesion = filter_input(INPUT_POST,'cerrar_sesion',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$citaciones_admin = filter_input(INPUT_POST,'citaciones_admin',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$citaciones = filter_input(INPUT_POST,'citaciones',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$noticias_admin = filter_input(INPUT_POST,'noticias_admin',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$perfil = filter_input(INPUT_POST,'perfil',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$usuarios_admin = filter_input(INPUT_POST,'usuarios_admin',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$modif_mi_perfil = filter_input(INPUT_POST,'modificar_mi_perfil',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$modif_mi_pwd = filter_input(INPUT_POST,'modificar__mi_pwd',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$volver = filter_input(INPUT_POST,'volver',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$modif_cita = filter_input(INPUT_POST,'modif_cita',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$borrar_cita = filter_input(INPUT_POST,'borrar_cita',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$crear_cita = filter_input(INPUT_POST,'crear_cita',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$buscar_usuarios = filter_input(INPUT_POST,'buscar_usuarios',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$modif_usuario = filter_input(INPUT_POST,'modif_usuario',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$borrar_usuario = filter_input(INPUT_POST,'borrar_usuario',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$crear_usuario = filter_input(INPUT_POST,'crear_usuario',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$reset_pwd = filter_input(INPUT_POST,'reset_pwd',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$buscar_citas = filter_input(INPUT_POST,'buscar_citas',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$modif_noticia = filter_input(INPUT_POST,'modif_noticia',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$borrar_noticia = filter_input(INPUT_POST,'borrar_noticia',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$acc =  filter_input(INPUT_POST,'acc',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$crear_noticia =  filter_input(INPUT_POST,'crear_noticia',FILTER_SANITIZE_FULL_SPECIAL_CHARS);

?>