<!DOCTYPE html>
<!------------------------------- Inicio de sesión --------------------------------------------->
<div class="container">
    <section class="py-5 text-center container">
        <div class="div_titulo_seccion">
            <h2 class="text-center display-6 fw-normal lh-1 mb-3">Inicio de Sesión</h2>
        </div>
        <div class="div_cont_seccion">
            <form action="./" method="post">
                <?php
                $accion = 12;
                include './views/forms/usuario.php';
                include './views/forms/password.php';
                include './views/forms/accion.php';
                include './views/forms/submit.php';
                ?>
            </form>
            <?php
            if (isset($error)) {
                ?>
                    <div class="row alert alert-danger" role="alert">
                        <div class="col-lg-10">
                            <h4 class="text-center"> <?php echo $error; ?></h4>
                        </div>
                        <div class="form-floating col-lg-2 g-3">
                            <form action="./" method="post">
                                <input type="submit" class="btn btn-outline-primary" name="registro" id="registro" value="Registro">
                            </form>
                        </div>
                    </div>
                <?php
            }
            ?>
        </div>
    </section>
</div>