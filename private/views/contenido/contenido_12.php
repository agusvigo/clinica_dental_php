<!DOCTYPE html>
<!----------------------------------------- Cambiar contraseña ------------------------------------------->
<div class="container">
    <section class="py-5 container">
        <div class="row">
            <div class="col">
                <h2>Perfil del usuario <span class="text-primary"><?php echo $logged_user; ?></span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="./main.php" method="post">
                    <?php
                    $accion = 3;
                    include './views/forms/password_float.php';
                    include './views/forms/password_float_bis.php';
                    include './views/forms/accion.php';
                    ?>
                    <div class="row py-5">
                        <div class="col text-center">
                            <input type="submit" class="btn btn-outline-primary" name="modificar__mi_pwd" value="Cambiar contraseña">
                        </div>
                        <div class="col text-center">
                            <input type="submit" class="btn btn-outline-primary" name="volver" value="Volver">
                        </div>
                    </div>
                </form>
            </div>
        </div> <?php
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