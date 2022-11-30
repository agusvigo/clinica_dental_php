<!DOCTYPE html>
<!--------------------------------------- Confirmación de Borrado de noticia ---------------------------------------->
<div class="container">
    <section class="py-5 container text-center">
        <h2>Borrado de noticia número <span class="text-primary"><?php echo "$idNoticia"; ?></span></h2>
        <div class="alert alert-danger m-5" role="alert">
            <h3 id="message">
                <?php
                if (isset($error)) echo $error;
                ?>
            </h3>
        </div>
        <!-- Seleccionamos acción y volvemos al contenido 10 -->
        <form action="./main.php" method="post">
            <input type="hidden" name="idNoticia" value="<?php echo $idNoticia; ?>">
            <div class="row py-5">
                <div class="col text-center">
                    <?php
                    $accion = 23;
                    include './views/forms/accion.php';
                    ?>
                </div>
                <div class="row py-5">
                    <div class="col text-center">
                        <input type="submit" class="btn btn-outline-primary" name="borrar_noticia" value="Borrar Noticia">
                    </div>
                    <div class="col text-center">
                        <input type="submit" class="btn btn-outline-primary" name="volver" value="Volver">
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>