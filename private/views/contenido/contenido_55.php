<!DOCTYPE html>
<!--------------------------------------- Confirmación de Borrado de Usuario ---------------------------------------->
<div class="container">
    <section class="py-5 container text-center">
        <h2 class= "ml-5">Borrado de Usuario</h2>
        <div class="alert alert-primary m-5" role="alert">
            <h3 id="message">
                <?php
                if (isset($error)) echo $error;
                ?>
            </h3>
        </div>
        <!-- Volvemos al contenido 6 -->
        <form action="./main.php" method="post">
            <div class="row py-5">
                <div class="col text-center">
                    <?php
                    $accion = 11;
                    include './views/forms/accion.php';
                    ?>
                    <input type="submit" class="btn btn-outline-primary" name="volver" value="Aceptar">
                </div>
            </div>
        </form>
    </section>
</div>