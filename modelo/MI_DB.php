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

    /*********************** Métodos de Usuarios****************************************/

    /**
     * Comprueba usuario y password del login, si son correctos devuelve un array con los datos del usuario.
     * Si los datos son incorrectos devuelve false
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
     * Comprueba si el correo existe y si es así devuelve el id del usuario, si no devuelve false
     */
    static function check_mail($mail){  
        $mysqli = self::connection();
        $consulta = "SELECT * FROM users_data WHERE users_data.email = '$mail'";
        $result = mysqli_query($mysqli,$consulta);
        if ($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            return $r_array['idUser'];
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Comprueba si el usuario existe y si es así devuelve el usuario, si no devuelve false
     */
    static function check_user_exists($user){  
        $mysqli = self::connection();
        $consulta = "SELECT * FROM users_login WHERE users_login.usuario = '$user'";
        $result = mysqli_query($mysqli,$consulta);
        if ($r_array = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            return $r_array['usuario'];
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    /**
     * Crea un nuevo usuario en la base de datos devuelve true si es correcta y false si falla.
     */
    static function new_user($usuario, $password, $nombre, $apellidos, $email, $telefono, $fnac, $direccion, $sexo){  
        $mysqli = self::connection();
        //Introducimos las datos en users_data
        $consulta = "INSERT INTO users_data (nombre, apellidos, email, telefono, fnac, direccion, sexo)  
            VALUES ('$nombre', '$apellidos', '$email', '$telefono', '$fnac', '$direccion', '$sexo')";
        if (mysqli_query($mysqli,$consulta)){
            //Buscamos el idUser del usuario creado
            $consulta_2 = "SELECT * FROM users_data ORDER BY idUser DESC LIMIT 1";
            $result = mysqli_query($mysqli,$consulta_2);
            $r_array = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $idUser = $r_array['idUser'];
            //Creamos el usario en users_login
            $consulta_3 = "INSERT INTO users_login (idUser, usuario, password, rol)  
                VALUES ('$idUser', '$usuario', '$password', 'user')";
            if (mysqli_query($mysqli,$consulta_3)) return true;
        } else {
            return false;
        }
        /* liberar el conjunto de resultados */
        $result->close();
        /* cerrar la conexión */
        $mysqli->close();
    }

    /*********************** Métodos de Noticias****************************************/
    

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
}
?>