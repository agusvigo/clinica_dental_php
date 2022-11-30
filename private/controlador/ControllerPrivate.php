<?php
class ControllerPrivate {
    /**
     * Constructor
     */    
    public function __construct() {
        session_name('CLI_DENT_SESSION');
        session_start();
    }
    
    /**
     * Comprueba si estamos logueados en la sesión.
     * Si es correcto devolvemos un array con los datos del usuario en "users_login"
     * <si es incirrecto devuelve false
     */
    public function check_login() {
        //comprobamos si las variables de sesión existen
        if (isset($_SESSION['data_0']) && 
            isset($_SESSION['data_1']) && 
            isset($_SESSION['data_2'])){
                $id = $_SESSION['data_0'];
                //comprobamos que existe el id de usuario de la variable de sesión
                if (MI_DB::check_id($id)){
                    $sesion_ok = true;
                    //Obtenemos los datos del usuario por el id
                    $user_data = MI_DB::check_id($id);
                    $data_1 = $_SESSION['data_1'];
                    $data_2 = $_SESSION['data_2'];
                    //Comprobamos que las variables de sesión sean correctas
                    if (!password_verify(session_id(),$data_1)) {$sesion_ok = false;}
                    if (!password_verify($user_data['usuario'],$data_2)) {$sesion_ok = false;}
                    //Si las variables de sesión son correctas devolvemos true, si no logout.
                    if ($sesion_ok){
                        return $user_data;
                        unset($user_data);
                        exit();
                    } else {
                        unset($user_data);
                        $this->log_out();
                    }

                } else {
                    $this->log_out();
                }

            } else {
                $this->log_out();
            }
    }

    /**
     * Cierra la sesion existente
     */
    public function log_out(){
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }

    

    /*********************************************************************************/
    /****************************Consultas de usuarios********************************/
    /*********************************************************************************/

    /**
     * Busca un usuario en users_data por el id y devuelve un array con sus datos.
     * Si no existe devuelve false
     */
    public function buscar_idUser($idUser){
        if ($result = MI_DB::search_user($idUser)){
            return $result;
            exit();
        } else {
            return false;
            exit();
        }
    }
    
    /**
     * Modifica los datos del usuario pasado como parámetro en users_data
     * Si es correcto devuelve true, si falla devuelve un string con el error
     */
    public function modificar_user_data($idUser, $nombre, $apellidos, $email, $email_2, $telefono, $fnac, $direccion, $sexo){
        if ($email !== $email_2){
            if (MI_DB::check_mail($email)){
                $error = 'El correo solicitado ya existe, no se puede realizar la modificación';
                return $error;
                exit();
            }
        }
        if (MI_DB::update_user($idUser, $nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo)){
            $error = 'Sus datos se han actualizado correctamente';
            return $error;
            exit();
        } else {
            $error = 'Ha fallado la consulta, contacte con el administrador';
            return $error;
            exit();
        }
    }
    
    /**
     * Actualiza la password del usuario pasado por parámetro.
     * Si es correcta la actualización devuelve true, si no false.
     */
    public function actualizar_password($idLogin, $pwd){
        if (MI_DB::update_pwd($idLogin, $pwd)){
            return true;
            exit();
        } else {
            return false;
            exit();
        }
    }
    
    /**
     * Busca un usuarios y devuelve un array con los datos de todos los usuarios que coincidan con la búsqueda.
     * Si la consulta falla devuelve false.
     */
    public function buscar_todos_usuarios($idUser, $nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo, $idLogin, $usuario, $rol){
        if ($result = MI_DB::search_all_users ($idUser, $nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo, $idLogin, $usuario, $rol)){
            return $result;
            exit();
        } else {
            return false;
            exit();
        }
    }
    
    /**
     * Modifica los datos de un usuario en users_data y users_login.
     * Si la consulta falla devuelve false.
     */
    public function modificar_usuario($idUser, $nombre, $apellidos, $email, $email_old, $telefono, $fnac, $direccion, $sexo, $idLogin, $usuario, $usuario_old, $rol){
        //Si se ha modificado el correo comprobamos si existe
        if ($email !== $email_old){
            if(MI_DB::check_mail($email)){
                $result = 'No se puede realizar la modificación, el correo ya existe';
                return $result;
                exit();
            }
        }
        //Si se ha modificado el usuario comprobamos si existe
        if ($usuario !== $usuario_old){
            if(MI_DB::check_user_exists($usuario)){
                $result = 'No se puede realizar la modificación, el usuario ya existe';
                return $result;
                exit();
            }
        }
        //Modificamos los datos de users_data
        if (MI_DB::update_user($idUser, $nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo)){
            //Modificamos los datos de users_login
            if (MI_DB::update_user_login($idLogin, $usuario, $rol)){
                $result = 'El usuario se ha modificado correctamente';
                return $result;
                exit();
            } else {
                $result = 'La consulta ha fallado';
                return $result;
                exit();
            }
            exit();
        } else {
            $result = 'La consulta ha fallado';
            return $result;
            exit();
        }
    }
    
    /**
     * Borra el usuario pasado por parámetro de todas las tablas
     * Si es correcta la actualización devuelve true, si no false.
     */
    public function borrar_usuario($idUser){
        if (MI_DB::delete_user($idUser)){
            return true;
            exit();
        } else {
            return false;
            exit();
        }
    }
    
    /**
     * Crea un nuevo usuario en todas las tablas
     * Si es correcta la actualización devuelve true, si no false.
     */
    public function crear_usuario($nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo, $usuario, $password, $rol){
       //Comprobamos si existe el correo proporcionado
       if(MI_DB::check_mail($email)){
            $result = 'No se puede crear el usuario, el correo ya existe';
            return $result;
            exit();
        }
        //Comprobamos si existe el usuario proporcionado
        if(MI_DB::check_user_exists($usuario)){
            $result = 'No se puede crear el usuario, el usuario ya existe';
            return $result;
            exit();
        }
        if(MI_DB::new_user_data($nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo)){
            $array = MI_DB::search_mail($email);
            $idUser = $array['idUser'];
            if(MI_DB::new_user_login($idUser, $usuario, $password, $rol)){
                $result = "Se ha creado correctamente el usuario solicitado";
                return $result;
                exit();
            } else {
                $result = 'No se puede crear el usuario, ha habido un error en la consulta';
                return $result;
                exit();
            }
        } else {
            $result = 'No se puede crear el usuario, ha habido un error en la consulta';
            return $result;
            exit();
        }
    }

    

    /*********************************************************************************/
    /****************************Consultas de citas***********************************/
    /*********************************************************************************/

    /**
     * Busca citas por el idUser pasado por parámetro
     * Si es correcta la actualización devuelve true, si no false.
     */
    public function buscar_citas($idUser){
        if ($result = MI_DB::search_dates($idUser)){
            return $result;
            exit();
        } else {
            return false;
            exit();
        }
        exit();
    }

    /**
     * Borra la cita pasada por parámetro.
     * Devuelve true si es correcto y false si falla la consulta.
     */
    public function borrar_cita($idCita){
        if (MI_DB::delete_date($idCita)){
            return true;
            exit();
        } else {
            return false;
            exit();
        }
    }
    
    /**
     * Modifica la cita pasada por parámetro.
     * Devuelve true si es correcto y false si falla la consulta.
     */
    public function modificar_cita($idCita, $idUser, $fechaCita, $motivoCita){
        if (MI_DB::update_date($idCita, $idUser, $fechaCita, $motivoCita)){
            return true;
            exit();
        } else {
            return false;
            exit();
        }
    }
    
    /**
     * Crea una nueva cita con los datos pasados por parámetro.
     * Si es correcta la consulta devuelve true, si no false.
     */
    public function crear_cita($idUser, $fechaCita, $motivoCita){
        if (MI_DB::create_date($idUser, $fechaCita, $motivoCita)){
            return true;
            exit();
        } else {
            return false;
            exit();
        }
    }
    
    /**
     * Busca citas por las coincidencias con cualquier parámetro pasado
     * Si es correcta la actualización devuelve un array con las citas, si no false.
     */
    public function buscar_citas_todas($idCita, $idUser, $fechaCita, $motivoCita){
        if (MI_DB::search_all_dates($idCita, $idUser, $fechaCita, $motivoCita)){
            $citas = MI_DB::search_all_dates($idCita, $idUser, $fechaCita, $motivoCita);
            return $citas;
            exit();
        } else {
            return false;
            exit();
        }
    }

    

    /*********************************************************************************/
    /****************************Consultas de noticias********************************/
    /*********************************************************************************/

    
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
    
    /**
     * Modifica la noticia con los valores pasados por parámetro.
     * Si la ejecución es correcta devuelve true, si no false.
     */    
    public function modificar_noticia($idUser, $idNoticia, $titulo, $titulo_orig, $texto, $fecha) {
        //Si se ha modificado el título comprobamos si existe en alguna noticia
        if($titulo !== $titulo_orig){
            if(MI_DB::search_news_tittle($titulo)){
                $error = 'No se puede modificar la noticia, el título ya existe en otra noticia';
                return $error;
            }
        }
        if (MI_DB::update_new($idUser, $idNoticia, $titulo, $texto, $fecha)){
            $error = 'La noticia se ha modificado satisfactoriamente';
            return $error;
        } else {
            $error = 'No se puede modificar la noticia, se ha producido un error en la consulta';
            return $error;
        }
    }
    
    /**
     * Borra la noticia con los valores pasados por parámetro.
     * Si la ejecución es correcta devuelve true, si no false.
     */    
    public function borrar_noticia($idNoticia) {
        if (MI_DB::delete_new($idNoticia)){
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Crea una noticia con los valores pasados por parámetro.
     * Si la ejecución es correcta devuelve el idNoticia, si no false.
     */    
    public function crear_noticia($titulo, $texto, $fecha, $idUser) {
        if ($resultado = MI_DB::create_new($titulo, $texto, $fecha, $idUser)){
            return $resultado;
        } else {
            return false;
        }
    }
}
?>