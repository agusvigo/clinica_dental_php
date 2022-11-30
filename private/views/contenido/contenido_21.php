<!DOCTYPE html>
<!---------------------------------------------------- Crear nueva cita ----------------------------------------------------->
<div class="container">
    <section class="py-5 container">
        <div class="row py-4">
            <div class="col">
                <!-- Título -->
                <h2 class="text-center">Crear nueva cita</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <form action="./main.php" method="post">
                    <div class="row justify-content-md-center">
                        <?php
                        $accion = 21;
                        include './views/forms/idUser_buscar.php';
                        include './views/forms/fechaCita_buscar.php';
                        include './views/forms/motivoCita_buscar.php';
                        include './views/forms/accion.php';
                        ?>
                    </div>
                    <div class="row py-5">
                        <div class="col text-center">
                            <input type="submit" class="btn btn-outline-primary" name="crear_cita" value="Crear cita">
                        </div>
                        <div class="col text-center">
                            <input type="submit" class="btn btn-outline-primary" name="volver" value="Cancelar">
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