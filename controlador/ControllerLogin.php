<?php
class ControllerLogin {
/**
 * Constructor
 */    
    public function __construct() {
        session_name('CLI_DENT_SESSION');
        //establecemos la caducidad de la sesión en 3 horas
        session_set_cookie_params(10800);
        session_start();
    }
    
/**
 * Comprueba usuario y password, si son correctos crea una nueva sesión
 */    
    public function login($user,$pwd) {
        //comprobamos ussuario y contraseña en la BBDD
        if (MI_DB::check_user($user,$pwd)){
            $user_data = MI_DB::check_user($user,$pwd);
            $data_1 = password_hash(session_id(), PASSWORD_BCRYPT);
            $data_2 = password_hash($user_data['usuario'], PASSWORD_BCRYPT);
            $_SESSION['data_0'] = $user_data['idLogin'];
            $_SESSION['data_1'] = $data_1;
            $_SESSION['data_2'] = $data_2;
            unset($user_data);
            return true;
            exit();
        } else {
            return false;
            exit();
        }
    }
    
/**
 * Comprueba si correo y usuario no existen, si es así da de alta el usuario en la base de datos y devuelve false.
 * Si existen  o si falla la consulta devuelve una variable con el error
 */    
    public function nuevo_usuario($usuario, $password, $nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo) {
        //comprobamos si el usuario existe en users_login
        $error ='';
        if (MI_DB::check_user_exists($usuario)) $error = "El usuario $usuario ya existe<br>";
        if (MI_DB::check_mail($email)) $error .= "El email $email ya existe<br>";
        if ($error !== ''){
            $error .= "Si ya está registrado pulse en el enlace de Inicio de sesión";
            return $error;
            exit();
        } else {
            if (MI_DB::new_user($usuario, $password, $nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo)){
                return false;
                exit();
            } else {
                $error = 'Ha fallado la consulta, contacte con el administrador';
                return $error;
                exit();
            }

        }
           
    }
    
/**
 * Crea una petición de reseteo de password si el correo proporcionado existe en la BBDD
 */    
    public function reset_pwd($mail) {
        //comprobamos que el correo existe en la base de datos
        if ($id = MI_DB::check_mail($mail)){
            //Comprobamos que se crea el registro, si no devolvemos mensaje de error
            if (MI_DB::new_reset_pwd($id)){
                return true;
            } else {
                header("Location: ../inicio.php?form=recupera&message=fallo_consulta");
            }
        } else {
            header("Location: ../inicio.php?form=recupera&message=mail_incorrecto");
        }
    }
    
/**
 * Crea una petición de registro en la aplicación
 */    
    public function peticion_registro($nombre, $ap_1, $ap_2, $mail, $permisos) {
        //comprobamos que el correo existe en la base de datos
        if (MI_DB::new_reg_pet($nombre, $ap_1, $ap_2, $mail, $permisos)){
            return true;
        } else {
            return false;
        }
    }
    
/**
 * Devuelve un array con todas las noticias de la BBDD
 */    
    public function buscar_noticias() {
        //comprobamos que el correo existe en la base de datos
        if (MI_DB::search_all_news()){
            $news = MI_DB::search_all_news();
            return $news;
        } else {
            return false;
        }
    }
}
?>