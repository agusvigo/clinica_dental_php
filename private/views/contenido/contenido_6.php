<!DOCTYPE html>
<!------------------------------------------ Perfil ------------------------------------------------------------>
<div class="container">
    <section class="container">
        <div class="row py-4">
            <div class="col">
                <!-- Título -->
                <h2 class="text-center">Perfil del usuario <span class="text-primary"><?php echo $logged_user; ?></span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="./main.php" method="post">
                    <div class="row">
                        <?php
                        $accion = 1;
                        include './views/forms/nombre_disp.php';
                        include './views/forms/apellidos_disp.php';
                        include './views/forms/mail_disp.php';
                        include './views/forms/telefono_disp.php';
                        include './views/forms/fnac_disp.php';
                        include './views/forms/sexo_disp.php';
                        include './views/forms/direccion_disp.php';
                        include './views/forms/accion.php';
                        ?>
                    </div>
                    <div class="row py-5">
                        <div class="col text-center">
                            <input type="submit" class="btn btn-outline-primary" name="modificar_mi_perfil" value="Modificar Datos">
                        </div>
                        <div class="col text-center">
                            <input type="submit" class="btn btn-outline-primary" name="modificar__mi_pwd" value="Cambiar contraseña">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                if (isset($error)) echo $error;
                ?>
            </div>
        </div>
    </section>
</div>