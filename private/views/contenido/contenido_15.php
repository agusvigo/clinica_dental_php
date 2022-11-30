<!DOCTYPE html>
<!----------------------------------------------------- Modificar Usuario ------------------------------------------------------------>
<div class="container">
    <section class="py-5 container">
        <div class="row">
            <div class="col">
                <h2>Modificar ID Usuario <span class="text-primary"><?php echo $idUser; ?></span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="./main.php" method="post" novalidate>
                    <div class="row">
                        <?php
                        $accion =11;
                        include './views/forms/idUser_modif_admin.php';
                        include './views/forms/idLogin_modif_admin.php';
                        include './views/forms/usuario_modif_old.php';
                        include './views/forms/mail_modif_old.php';
                        include './views/forms/usuario_modif_admin.php';
                        include './views/forms/rol_modif_admin.php';
                        include './views/forms/nombre_modif_admin.php';
                        include './views/forms/apellidos_modif_admin.php';
                        include './views/forms/mail_modif_admin.php';
                        include './views/forms/telefono_modif_admin.php';
                        include './views/forms/fnac_modif_admin.php';
                        include './views/forms/sexo_modif_admin.php';
                        include './views/forms/direccion_modif_admin.php';
                        include './views/forms/accion.php';
                        ?>
                    </div>
                    <div class="row py-5">
                        <div class="col text-center">
                            <input type="submit" class="btn btn-outline-primary" name="modif_usuario" value="Modificar Datos">
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