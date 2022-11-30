<!DOCTYPE html>
<!----------------------------------------------------- Crear Usuario ---------------------------------------------------------->
<div class="container">
    <section class="py-5 container">
        <div class="row">
            <div class="col">
                <h2>Crear Usuario</h2>
                <p>Introducir los datos del nuevo usuario, campos obligatorios *.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="./main.php" method="post" novalidate>
                    <div class="row">
                        <?php
                        $accion =14;
                        include './views/forms/usuario_modif_admin.php';
                        include './views/forms/rol_crear.php';
                        include './views/forms/password_req.php';
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        include './views/forms/nombre_modif_admin.php';
                        include './views/forms/apellidos_modif_admin.php';
                        include './views/forms/mail_modif_admin.php';
                        include './views/forms/telefono_modif_admin.php';
                        include './views/forms/fnac_modif_admin.php';
                        include './views/forms/sexo_buscar.php';
                        include './views/forms/direccion_modif_admin.php';
                        include './views/forms/accion.php';
                        ?>
                    </div>
                    <div class="row py-5">
                        <div class="col text-center">
                            <input type="submit" class="btn btn-outline-primary" name="crear_usuario" value="Crear usuario">
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