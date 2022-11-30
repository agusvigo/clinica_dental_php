<!DOCTYPE html>
<!----------------------------------------------- Modificar cita ---------------------------------------------------------->
<div class="container">
    <section class="py-5 container">
        <div class="row py-4">
            <div class="col">
                <!-- Título -->
                <h2 class="text-center">Modificar cita número <span class="text-primary"><?php echo "$idCita"; ?></span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="./main.php" method="post">
                        <?php
                        $accion = 18;
                        include './views/forms/idCita_hidden.php';
                        include './views/forms/idUser_modif_admin.php';
                        include './views/forms/fechaCita.php';
                        include './views/forms/motivoCita.php';
                        include './views/forms/accion.php';
                        ?>
                    </div>
                    <div class="row py-5">
                        <div class="col text-center">
                            <input type="submit" class="btn btn-outline-primary" name="modif_cita" value="Modificar cita">
                        </div>
                        <div class="col text-center">
                            <input type="submit" class="btn btn-outline-primary" name="volver" value="Volver">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if (isset($error)) {
        ?>
            <div class="row">
                <div class="text-center col alert alert-warning" role="alert">
                    <h4>
                        <?php
                        echo $error;
                        ?>
                    </h4>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
</div>