<?php
/*****************************************filter_public************************************/

/***************************************Formularios****************************************/
$accion = filter_input(INPUT_POST,'accion',FILTER_SANITIZE_NUMBER_INT);
$usuario = filter_input(INPUT_POST,'usuario',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password_2 = filter_input(INPUT_POST,'password_2',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nombre = filter_input(INPUT_POST,'nombre',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$apellidos = filter_input(INPUT_POST,'apellidos',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$mail = filter_input(INPUT_POST,'mail',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$telefono = filter_input(INPUT_POST,'telefono',FILTER_SANITIZE_NUMBER_INT);
$fnac = filter_input(INPUT_POST,'fnac',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$direccion = filter_input(INPUT_POST,'direccion',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sexo = filter_input(INPUT_POST,'sexo',FILTER_SANITIZE_FULL_SPECIAL_CHARS);

/****************************************Navegación******************************************/
$inicio = filter_input(INPUT_POST,'inicio',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$noticias = filter_input(INPUT_POST,'noticias',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$registro = filter_input(INPUT_POST,'registro',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$inicio_sesion = filter_input(INPUT_POST,'inicio_sesion',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
?>