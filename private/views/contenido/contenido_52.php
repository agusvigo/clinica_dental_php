<!DOCTYPE html>
<!--------------------------------------- Confirmación de borrado de cita ---------------------------------------->
<div class="container">
    <section class="py-5 container text-center">
        <h2>Borrado de cita número <span class="text-primary"><?php echo "$idCita"; ?></span></h2>
        <div class="alert alert-danger m-5" role="alert">
            <h3 id="message">
                <?php
                if (isset($error)) echo $error;
                ?>
            </h3>
        </div>
        <!-- Volvemos al contenido 5 -->
        <form action="./main.php" method="post">
            <input type="hidden" name="idCita" value="<?php echo $idCita; ?>">
            <div class="row py-5">
                <div class="col text-center">
                    <?php
                    $accion = 6;
                    include './views/forms/accion.php';
                    ?>
                </div>
                <div class="row py-5">
                    <div class="col text-center">
                        <input type="submit" class="btn btn-outline-primary" name="borrar_cita" value="Borrar cita">
                    </div>
                    <div class="col text-center">
                        <input type="submit" class="btn btn-outline-primary" name="volver" value="Volver">
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>