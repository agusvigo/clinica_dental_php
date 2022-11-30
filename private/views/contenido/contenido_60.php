<!DOCTYPE html>
<!--------------------------------------- Confirmación de Creación de cita ---------------------------------------->
<div class="container">
    <section class="py-5 container text-center">
        <h2>Creación de cita</h2>
        <div class="alert alert-primary m-5" role="alert">
            <h3 id="message">Se ha creado la cita solicitada correctamente</h3>
        </div>
        <!-- Volvemos al contenido 9 -->
        <form action="./main.php" method="post">
            <div class="row py-5">
                <div class="col text-center">
                    <?php
                    $accion = 21;
                    include './views/forms/accion.php';
                    ?>
                </div>
                <div class="row py-5">
                    <div class="col text-center">
                        <input type="submit" class="btn btn-outline-primary" name="volver" value="Volver">
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>