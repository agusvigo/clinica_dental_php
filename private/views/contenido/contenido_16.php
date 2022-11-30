<!DOCTYPE html>
<!---------------------------------------------------------- Borrar ID Usuario ----------------------------------------------------->
<div class="container">
    <section class="py-5 container">
        <div class="row">
            <div class="col">
                <h2>Borrar ID Usuario <span class="text-primary"><?php echo $idUser; ?></span></h2>
                <p>Se borrará el siguiente usuario, pulse borrar para continuar o volver pra cancelar.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="./main.php" method="post">
                    <div class="row">
                        <?php
                        $accion =12;
                        include './views/forms/idUser_modif_admin.php';
                        include './views/forms/idLogin_modif_admin.php';
                        include './views/forms/usuario_borrar_admin.php';
                        include './views/forms/rol_borrar_admin.php';
                        include './views/forms/nombre_borrar_admin.php';
                        include './views/forms/apellidos_borrar_admin.php';
                        include './views/forms/mail_borrar_admin.php';
                        include './views/forms/telefono_borrar_admin.php';
                        include './views/forms/fnac_borrar_admin.php';
                        include './views/forms/sexo_borrar_admin.php';
                        include './views/forms/direccion_borrar_admin.php';
                        include './views/forms/accion.php';
                        ?>
                    </div>
                    <div class="row py-5">
                        <div class="col text-center">
                            <input type="submit" class="btn btn-outline-primary" name="borrar_usuario" value="Borrar Usuario">
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