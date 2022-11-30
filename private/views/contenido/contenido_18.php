<!DOCTYPE html>
<!--------------------------------------------- Reset password de usuario --------------------------------------------->
<div class="container">
    <section class="py-5 container">
        <div class="row">
            <div class="col text-center">
                <h2>Reset password del usuario <span class="text-primary">ID User <?php echo $idUser; ?></span> </h2>
                <p>Introducir la nueva contraseña de usuario y pulsar modificar.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="./main.php" method="post">
                        <?php
                        $accion =15;
                        include './views/forms/idUser_modif_admin.php';
                        include './views/forms/idLogin_modif_admin.php';
                        include './views/forms/password_float.php';
                        include './views/forms/password_float_bis.php';
                        include './views/forms/accion.php';
                        ?>
                    <div class="row py-5">
                        <div class="col text-center">
                            <input type="submit" class="btn btn-outline-primary" name="reset_pwd" value="Modificar">
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