<!DOCTYPE html>
<!-------------------------------------------- Administración de usuarios ---------------------------------------------------------->
<div class="container">
    <section class="container">
        <div class="row py-4">
            <div class="col text-center">
                <!-- Título de la sección -->
                <h2>Administración de usuarios</h2>
            </div>
        </div>
        <div class="row py-4">
            <div class="col">
                <!-- Crear nuevo usuario -->
                <form action="./main.php" method="post">
                    <?php
                    $accion = 13;
                    include './views/forms/accion.php';
                    ?>
                    <div class="col g-3">
                        <input type="submit" name="crear_usuario" class="btn btn-primary btn-lg" value="Nuevo usuario +">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- Título de Buscar usuarios-->
                <h4>Buscar usuarios</h4>
                <p>Introducir algún dato completo o parcial para buscar coincidencias</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="./main.php" method="post">
                    <div class="row">
                        <?php
                        $accion = 9;
                        include './views/forms/idUser_buscar.php';
                        include './views/forms/idLogin_buscar.php';
                        include './views/forms/usuario_buscar.php';
                        include './views/forms/rol_buscar.php';
                        include './views/forms/nombre_buscar.php';
                        include './views/forms/apellidos_buscar.php';
                        include './views/forms/mail_buscar.php';
                        include './views/forms/telefono_buscar.php';
                        include './views/forms/fnac_buscar.php';
                        include './views/forms/sexo_buscar.php';
                        include './views/forms/direccion_buscar.php';
                        include './views/forms/accion.php';
                        ?>
                    </div>
                    <div class="row py-5">
                        <div class="col text-center">
                            <input type="submit" class="btn btn-outline-primary" name="buscar_usuarios" value="Buscar Usuarios">
                        </div>
                        <div class="col text-center">
                            <input type="submit" class="btn btn-outline-primary" name="volver" value="Borrar Formulario">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row py-4">
            <?php
            //Si se encuentran resultados los mostramos
            if (isset($busqueda_usuarios)){
                //Definimos variables globales para los foreach
                $contador = 1;
                $id_label = "id_$contador";
                //Lanzamos un foreach para cada cita del array $logged_user_dates
                foreach ($busqueda_usuarios as $key) {
                    //Extraemos los datos de cada usuario serán los array $key
                    foreach ($key as $descripcion => $valor) {
                        //Extraemos los valores
                        if ($descripcion === "idUser") $idUser =$valor;
                        if ($descripcion === "idLogin") $idLogin =$valor;
                        if ($descripcion === "usuario") $usuario =$valor;
                        if ($descripcion === "rol") $rol =$valor;
                        if ($descripcion === "nombre") $nombre =$valor;
                        if ($descripcion === "apellidos") $apellidos =$valor;
                        if ($descripcion === "email") $mail =$valor;
                        if ($descripcion === "telefono") $telefono =$valor;
                        if ($descripcion === "fnac") $fnac =$valor;
                        if ($descripcion === "sexo") $sexo =$valor;
                        if ($descripcion === "direccion") $direccion =$valor;
                    }
                //Creamos el contenido de la tarjeta con los valores extraidos
                
                //Creamos el contenedor de la tarjeta del usuario
                ?>
                <div class="card col-4 m-1 bg-info bg-opacity-10" style="width: 400px;">
                    <div class="card-body">
                        <form action="./main.php" method="post">
                            <?php
                            $accion = 10;
                            include './views/forms/accion.php';
                            ?>
                            <h4 class="card-title">
                            <?php
                            echo "ID Usuario $idUser";
                            ?>
                            </h4>
                            <?php
                            ?>
                            <input type="hidden" name="idUser" value="<?php echo $idUser; ?>">
                            <?php
                            $contador ++;
                            $id_label = "id_$contador";
                            ?>
                            <input type="hidden" name="idLogin" value="<?php echo $idLogin; ?>">
                            <div class="row">
                                <div class="form-floating col g-3">
                                    <input type="text" name="idLogin_h" class="form-control" id="<?php echo $id_label; ?>" value="<?php echo $idLogin; ?>" disabled>
                                            <label for="<?php echo $id_label; ?>">ID Login</label>
                                </div>
                            </div>
                            <?php
                            $contador ++;
                            $id_label = "id_$contador";
                            ?>
                            <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
                            <div class="row">
                                <div class="form-floating col g-3">
                                    <input type="text" name="usuario_h" class="form-control" id="<?php echo $id_label; ?>" value="<?php echo $usuario; ?>" disabled>
                                            <label for="<?php echo $id_label; ?>">Usuario</label>
                                </div>
                            </div>
                            <?php
                            $contador ++;
                            $id_label = "id_$contador";
                            ?>
                            <input type="hidden" name="rol" value="<?php echo $rol; ?>">
                            <div class="row">
                                <div class="form-floating col g-3">
                                    <input type="text" name="rol_h" class="form-control" id="<?php echo $id_label; ?>" value="<?php echo $rol; ?>" disabled>
                                            <label for="<?php echo $id_label; ?>">Rol</label>
                                </div>
                            </div>
                            <?php
                            $contador ++;
                            $id_label = "id_$contador";
                            ?>
                            <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
                            <div class="row">
                                <div class="form-floating col g-3">
                                    <input type="text" name="nombre_h" class="form-control" id="<?php echo $id_label; ?>" value="<?php echo $nombre; ?>" disabled>
                                    <label for="<?php echo $id_label; ?>">Nombre</label>
                                </div>
                            </div>
                            <?php
                            $contador ++;
                            $id_label = "id_$contador";
                            ?>
                            <input type="hidden" name="apellidos" value="<?php echo $apellidos; ?>">
                            <div class="row">
                                <div class="form-floating col g-3">
                                    <input type="text" name="apellidos_h" class="form-control" id="<?php echo $id_label; ?>" value="<?php echo $apellidos; ?>" disabled>
                                    <label for="<?php echo $id_label; ?>">Apellidos</label>
                                </div>
                            </div>
                            <?php
                            $contador ++;
                            $id_label = "id_$contador";
                            ?>
                            <input type="hidden" name="mail" value="<?php echo $mail; ?>">
                            <div class="row">
                                <div class="form-floating col g-3">
                                    <input type="text" name="mail_h" class="form-control" id="<?php echo $id_label; ?>" value="<?php echo $mail; ?>" disabled>
                                    <label for="<?php echo $id_label; ?>">Correo Electrónico</label>
                                </div>
                            </div>
                            <?php
                            $contador ++;
                            $id_label = "id_$contador";
                            ?>
                            <input type="hidden" name="telefono" value="<?php echo $telefono; ?>">
                            <div class="row">
                                <div class="form-floating col g-3">
                                    <input type="number" name="telefono_h" class="form-control" id="<?php echo $id_label; ?>" value="<?php echo $telefono; ?>" disabled>
                                    <label for="<?php echo $id_label; ?>">Teléfono</label>
                                </div>
                            </div>
                            <?php
                            $contador ++;
                            $id_label = "id_$contador";
                            ?>
                            <input type="hidden" name="fnac" value="<?php echo $fnac; ?>">
                            <div class="row">
                                <div class="form-floating col g-3">
                                    <input type="date" name="fnac_h" class="form-control" id="<?php echo $id_label; ?>" value="<?php echo $fnac; ?>" disabled>
                                    <label for="<?php echo $id_label; ?>">Fecha de Nacimiento</label>
                                </div>
                            </div>
                            <?php
                            $contador ++;
                            $id_label = "id_$contador";
                            ?>
                            <input type="hidden" name="sexo" value="<?php echo $sexo; ?>">
                            <div class="row">
                                <div class="form-floating col g-3">
                                    <input type="text" name="sexo_h" class="form-control" id="<?php echo $id_label; ?>" value="<?php echo $sexo; ?>" disabled>
                                    <label for="<?php echo $id_label; ?>">Correo Electrónico</label>
                                </div>
                            </div>
                            <?php
                            $contador ++;
                            $id_label = "id_$contador";
                            ?>
                            <input type="hidden" name="direccion" value="<?php echo $direccion; ?>">
                            <div class="row">
                                <div class="form-floating col g-3">
                                    <input type="text" name="direccion_h" class="form-control" id="<?php echo $id_label; ?>" value="<?php echo $direccion; ?>" disabled>
                                    <label for="<?php echo $id_label; ?>">Dirección</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-center col g-3">
                                    <input type="submit" name="modif_usuario" class="btn btn-outline-primary" value="Modificar">
                                    <input type="submit" name="reset_pwd" class="btn btn-outline-primary" value="Reset Pwd">
                                    <input type="submit" name="borrar_usuario" class="btn btn-outline-danger" value="Borrar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            }
        }
        //Mostramos los mensajes de error si los hubiese
        if (isset($error)) {
            ?>
            <div class="alert alert-danger m-1" role="alert">
                <h3 id="message">
                    <?php
                    echo $error;
                    ?>
                </h3>
            </div>
            <?php
        }
        ?>
    </section>
</div>