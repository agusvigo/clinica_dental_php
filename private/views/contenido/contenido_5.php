<!DOCTYPE html>
<!---------------------------------------------- Página de citaciones -------------------------------------------------------------->
<div class="container">
    <section class="container">
        <div class="row py-4">
            <div class="col">
                <!-- Título -->
                <h2 class="text-center">Citaciones de <span class="text-primary"><?php echo "$logged_nombre $logged_apellidos"; ?></span></h2>
            </div>
        </div>
        <div class="row py-4">
            <div class="col">
                <!-- Crear nueva cita -->
                <form action="./main.php" method="post">
                    <?php
                    $accion = 7;
                    include './views/forms/accion.php';
                    ?>
                    <div class="col g-3">
                        <input type="submit" name="crear_cita" class="btn btn-primary btn-lg" value="Nueva cita +">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <?php
            //Si el usuario tiene citas las mostramos
            if (isset($logged_user_dates)){
                //Definimos variables globales para los foreach
                $contador = 1;
                $id_label = "id_$contador";
                //Lanzamos un foreach para cada cita del array $logged_user_dates
                foreach ($logged_user_dates as $key) {
                    //Extraemos los datos de cada cita serán los array $key
                    foreach ($key as $descripcion => $valor) {
                        //Extraemos los valores
                        if ($descripcion === "idCita") $idCita =$valor;
                        if ($descripcion === "fechaCita") $fechaCita =$valor;
                        if ($descripcion === "motivoCita") $motivoCita =$valor;
                    }
                //Creamos el contenido de la tarjeta con los valores extraidos

                //Definimos si la cita está caducada, si $caducada es true está caducada
                $caducada = false;
                $fechaActual = date('Y-m-d');
                if ($fechaCita < $fechaActual) $caducada = true;
                //Creamos el contenedor de la tarjeta de la cita
                //Cambiamos el color de fondo de latarjeta si está caducada
                if ($caducada){
                    ?>
                    <div class="card col-4 m-1 bg-warning bg-opacity-10" style="width: 400px;">
                    <?php
                } else {
                    ?>
                    <div class="card col-4 m-1 bg-info bg-opacity-10" style="width: 400px;">
                    <?php
                }
                ?>
                    <div class="card-body">
                        <form action="./main.php" method="post">
                            <?php
                            $accion = 4;
                            include './views/forms/accion.php';
                            ?>
                            <h4 class="card-title">
                            <?php
                            echo "Cita Número $idCita";
                            ?>
                            </h4>
                            <?php
                            ?>
                            <input type="hidden" name="idCita" value="<?php echo $idCita; ?>">
                            <?php
                            $contador ++;
                            $id_label = "id_$contador";
                            ?>
                            <input type="hidden" name="fechaCita" value="<?php echo $fechaCita; ?>">
                            <div class="row">
                                <div class="form-floating col g-3">
                                    <input type="date" name="fecha_cita_h" class="form-control" id="<?php echo $id_label; ?>" value="<?php echo $fechaCita; ?>" disabled>
                                    <label for="<?php echo $id_label; ?>">Fecha de la cita</label>
                                </div>
                            </div>
                            
                            <?php
                            $contador ++;
                            $id_label = "id_$contador";
                            ?>
                            <input type="hidden" name="motivoCita" value="<?php echo $motivoCita; ?>">
                            <div class="row">
                                <div class="form-floating col g-3">
                                    <input type="text" name="motivoCita_h" class="form-control" id="<?php echo $id_label; ?>" value="<?php echo $motivoCita; ?>" disabled>
                                    <label for="<?php echo $id_label; ?>">Motivo de la Cita</label>
                                </div>
                            </div><?php
                            //Añadimos los botones de borrado y modificación sólo si la cita no está caducada
                            if (!$caducada){
                                ?>
                                <div class="row">
                                    <div class="text-center col g-3">
                                        <input type="submit" name="modif_cita" class="btn btn-outline-primary" value="Modificar">
                                        <input type="submit" name="borrar_cita" class="btn btn-outline-danger" value="Borrar">
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>
                <?php
                }
                if (isset($error)) echo $error;
            }
            ?>
            
        </div>
    </section>
</div>