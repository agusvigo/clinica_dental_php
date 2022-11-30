<?php
class MI_DB {
    private static $host;
    private static $us;
    private static $pw;
    private static $db;
    private static $pt;

/**
 * Método para la conexión a la base de datos
 */
    static function connection()
    {
        self::$host = constant('DB_HOST');
        self::$us = constant('DB_USER');
        self::$pw = constant('DB_PASS');
        self::$db = constant('DB');
        self::$pt = constant('DB_PORT');
        if ($connection = new mysqli(self::$host, self::$us, self::$pw, self::$db, self::$pt)){
            return $connection;
        } else {
            printf("Falló la conexión: %s\n", mysqli_connect_error());
            exit();
        }
    }

    

    /*********************************************************************************/
    /****************************Consultas de usuarios********************************/
    /*********************************************************************************/

    /**
     * Comprueba usuario y password del login y devuelve un array con los datos del usuario si existe
     */
    static function check_user($user,$pwd){  
        $mysqli = self::connection();
        $consulta = "SELECT * FROM users_login WHERE users_login.usuario = '$user'";
        $result = mysqli_query($mysqli,$consulta);
        while ($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            if (($r_array['usuario'] == $user) && password_verify($pwd,$r_array['password'])){
                return $r_array;
            } else {
                return false;
            }
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    
    /**
     * Comprueba usuario por id  en users_login y devuelve un array con los datos del usuario si existe
     */
    static function check_id($id){ 
        $mysqli = self::connection();
        $consulta = "SELECT * FROM users_login WHERE users_login.idLogin = '$id'";
        $result = mysqli_query($mysqli,$consulta);
        if($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            return $r_array;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    
    /**
     * Busca un usuario en users_data por el id y devuelve un array con sus datos.
     * Si no existe devuelve false
     */
    static function search_user($idUser){ 
        $mysqli = self::connection();
        $consulta = "SELECT * FROM users_data where idUser = '$idUser'";
        $result = mysqli_query($mysqli,$consulta);
        if($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            return $r_array;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Modifica un usaurio en la tabla users_data devuelve true si es correcta y false si falla.
     */
    static function update_user($idUser, $nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo){  
        $mysqli = self::connection();
        //Introducimos las datos en users_data
        $consulta = "UPDATE users_data SET
                    nombre = '$nombre',
                    apellidos = '$apellidos',
                    email = '$email',
                    telefono = '$telefono',
                    fnac = '$fnac',
                    direccion = '$direccion',
                    sexo = '$sexo'
                    WHERE
                    idUser = '$idUser'";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Modifica un usaurio en la tabla users_login devuelve true si es correcta y false si falla.
     */
    static function update_user_login($idLogin, $usuario, $rol){  
        $mysqli = self::connection();
        //Introducimos las datos en users_data
        $consulta = "UPDATE users_login SET
                    usuario = '$usuario',
                    rol = '$rol'
                    WHERE
                    idLogin = '$idLogin'";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Borra un usaurio en la tabla users_data devuelve true si es correcta y false si falla.
     * El usuario se borrará también en users_login por el tipo de vinculación existente.
     */
    static function delete_user($idUser){  
        $mysqli = self::connection();
        $consulta = "DELETE FROM users_data WHERE idUser = '$idUser'";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Comprueba si existe el user pasado como parámetro, si existe
     * devuelve true, si no false
     */
    static function check_user_exists($usuario){ 
        $mysqli = self::connection();
        $consulta = "SELECT * FROM users_login WHERE usuario = '$usuario'";
        $result = mysqli_query($mysqli,$consulta);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Comprueba si el correo existe y si es así devuelve true, si no devuelve false
     */
    static function check_mail($email){  
        $mysqli = self::connection();
        $consulta = "SELECT * FROM users_data WHERE users_data.email = '$email'";
        $result = mysqli_query($mysqli,$consulta);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Busca el idUser asociado a un correo y lo devuelve como cadena.
     * Si no existe devuelve false.
     */
    static function search_mail($email){  
        $mysqli = self::connection();
        $consulta = "SELECT idUser FROM users_data WHERE users_data.email = '$email'";
        $result = mysqli_query($mysqli,$consulta);
        if ($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            return $r_array;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Actualiza la password del usuario pasado por parámetro.
     * Si es correcta la actualización devuelve true, si no false.
     */
    static function update_pwd ($idLogin, $pwd){  
        $mysqli = self::connection();
        $consulta = "UPDATE users_login SET
                    password = '$pwd'
                    WHERE
                    idLogin = '$idLogin'";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Crea un nuevo usuario en users_data.
     * Si no hay errores devuelve true, si la consulta falla devuelve false.
     */
    static function new_user_data ($nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo){  
        $mysqli = self::connection();
        $consulta = "INSERT INTO users_data (nombre, apellidos, email, telefono, fnac, direccion, sexo)  
                    VALUES ('$nombre', '$apellidos', '$email', '$telefono', '$fnac', '$direccion', '$sexo');";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Crea un nuevo usuario en users_login.
     * Si no hay errores devuelve true, si la consulta falla devuelve false.
     */
    static function new_user_login ($idUser, $usuario, $password, $rol){  
        $mysqli = self::connection();
        $consulta = "INSERT INTO users_login (idUser, usuario, password, rol)  
                    VALUES ('$idUser', '$usuario', '$password', '$rol');";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Busca un usuarios y devuelve un array con los datos de todos los usuarios que coincidan con la búsqueda.
     * Si la consulta falla devuelve false.
     */
    static function search_all_users ($idUser, $nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo, $idLogin, $usuario, $rol){  
        $mysqli = self::connection();
        $consulta = "SELECT d.idUser, d.nombre, d.apellidos, d.email, d.telefono, d.fnac, d.direccion, d.sexo, l.idLogin, l.usuario, l.rol
                    FROM users_data d 
                    JOIN users_login l ON (d.idUser = l.idUser)
                    WHERE 
                        d.idUser LIKE '%$idUser%'
                        AND d.nombre LIKE '%$nombre%'
                        AND d.apellidos LIKE '%$apellidos%'
                        AND d.email LIKE '%$email%'
                        AND d.telefono LIKE '%$telefono%'
                        AND d.fnac LIKE '%$fnac%'
                        AND d.direccion LIKE '%$direccion%'
                        AND d.sexo LIKE '%$sexo%'
                        AND l.idLogin LIKE '%$idLogin%'
                        AND l.usuario LIKE '%$usuario%'
                        AND l.rol LIKE '%$rol%'";
        if ($result = mysqli_query($mysqli,$consulta)) {
            $resultado = [];
            while ($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                array_push($resultado,$r_array);
            }
            return $resultado;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    

    /*********************************************************************************/
    /****************************Consultas de citas***********************************/
    /*********************************************************************************/

    /**
     * Busca citas por las coincidencias con cualquier parámetro pasado
     * Si es correcta la actualización devuelve un array con las citas, si no false.
     */
    static function search_all_dates ($idCita, $idUser, $fechaCita, $motivoCita){  
        $mysqli = self::connection();
        $consulta = "SELECT * FROM citas
                    WHERE 
                    idCita LIKE '%$idCita%'
                    AND idUser LIKE '%$idUser%'
                    AND fechaCita LIKE '%$fechaCita%'
                    AND motivoCita LIKE '%$motivoCita%'
                    ORDER BY fechaCita DESC";
        if ($result = mysqli_query($mysqli,$consulta)) {
            $resultado = [];
            while ($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                array_push($resultado,$r_array);
            }
            return $resultado;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Busca citas por el idUser pasado por parámetro
     * Si es correcta la actualización devuelve un array con las citas, si no false.
     */
    static function search_dates ($idUser){  
        $mysqli = self::connection();
        $consulta = "SELECT * FROM citas WHERE idUser = '$idUser' ORDER BY fechaCita ASC";
        if ($result = mysqli_query($mysqli,$consulta)) {
            $resultado = [];
            while ($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                array_push($resultado,$r_array);
            }
            return $resultado;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Borra la cita pasada por parámetro.
     * Devuelve true si es correcto y false si falla la consulta.
     */
    static function delete_date ($idCita){  
        $mysqli = self::connection();
        $consulta = "DELETE FROM citas WHERE idCita = '$idCita' ";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Actualiza la cita pasada por parámetro.
     * Si es correcta la actualización devuelve true, si no false.
     */
    static function update_date ($idCita, $idUser, $fechaCita, $motivoCita){  
        $mysqli = self::connection();
        $consulta = "UPDATE citas SET
                    idUser = '$idUser',
                    fechaCita = '$fechaCita',
                    motivoCita = '$motivoCita'
                    WHERE
                    idCita = '$idCita'";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Crea una nueva cita con los datos pasados por parámetro.
     * Si es correcta la consulta devuelve true, si no false.
     */
    static function create_date ($idUser, $fechaCita, $motivoCita){  
        $mysqli = self::connection();
        $consulta = "INSERT INTO citas
                    (idUser, fechaCita, motivoCita)
                    VALUES ('$idUser', '$fechaCita', '$motivoCita')";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    

    /*********************************************************************************/
    /****************************Consultas de noticias********************************/
    /*********************************************************************************/

    
    /**
     * Crea un array con todas las noticias de la base de datos
     * Si la consulta falla devuelve false.
     */
    static function search_all_news (){  
        $mysqli = self::connection();
        $consulta = "SELECT n.idNoticia, n.titulo, n.imagen, n.texto, n.fecha, u.idUser, u.nombre, u.apellidos
                    FROM noticias n 
                    JOIN users_data u ON (n.idUser = u.idUser)
                    ORDER BY n.fecha DESC";
        if ($result = mysqli_query($mysqli,$consulta)) {
            $resultado = [];
            while ($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                array_push($resultado,$r_array);
            }
            return $resultado;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Actualiza una noticia con los datos pasados por parámetro.
     * Si es correcta la consulta devuelve true, si no false.
     */
    static function update_new ($idUser, $idNoticia, $titulo, $texto, $fecha){  
        $mysqli = self::connection();
        $consulta = "UPDATE noticias SET
                    noticias.titulo = '$titulo',
                    noticias.idUser = '$idUser',
                    noticias.texto = '$texto',
                    noticias.fecha = '$fecha'
                    WHERE
                    noticias.idNoticia = '$idNoticia'";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Crea una noticia con los datos pasados por parámetro.
     * Si es correcta la consulta devuelve true el idNoticia e la nueva noticia, si no false.
     */
    static function create_new ($titulo, $texto, $fecha, $idUser){  
        $mysqli = self::connection();
        $idNoticia = null;
        $consulta = "INSERT INTO noticias (titulo, imagen, texto, fecha, idUser) 
                    VALUES ('$titulo', 'img_temp.jpeg', '$texto', '$fecha', '$idUser')";
        //Buscamos el idNoticia de la noticia creada            
        if (mysqli_query($mysqli,$consulta)){
            $consulta_2 ="SELECT * FROM noticias ORDER BY idNoticia DESC LIMIT 1";
            if($result = mysqli_query($mysqli,$consulta_2)){
                $idNoticia = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $idNoticia = $idNoticia['idNoticia'];
            } else {
                return false;
                exit();
            }
            //Modificamos el nombre de la imagen
            $imagen = "img_$idNoticia.jpeg";
            $consulta_3 = "UPDATE noticias SET
                        noticias.imagen = '$imagen'
                        WHERE
                        noticias.idNoticia = '$idNoticia'"; 
            //Si todo va bien devolvemos el idNoticia
            if (mysqli_query($mysqli,$consulta_3)){
                return $idNoticia;
            } else {
                return false;
            }          
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Comprueba si el título pasado por parámetro existe en alguna noticia.
     * Si existe devuelve true, si no false.
     */
    static function search_news_tittle ($titulo){  
        $mysqli = self::connection();
        $consulta = "SELECT * FROM noticias  WHERE titulo = '$titulo'";
        $result = mysqli_query($mysqli,$consulta);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Borra la noticia pasada por parámetro.
     * Si es correcto devuelve true, si no false.
     */
    static function delete_new ($idNoticia){  
        $mysqli = self::connection();
        $consulta = "DELETE FROM noticias WHERE noticias.idNoticia = '$idNoticia'";
        if (mysqli_query($mysqli,$consulta)){
            return true;
        } else {
            return false;
        }
        /* cerrar la conexión */
        $mysqli->close();
    }
}
?>