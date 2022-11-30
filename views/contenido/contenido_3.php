<!DOCTYPE html>
<!------------------------------- Página de Registro --------------------------------------->
<div class="container">
    <section class="py-5 container">
        <h2  class="text-center display-6 fw-normal lh-1 mb-3">Registro de nuevo usuario</h2>
        <p>Datos obligatorios *</p>
        <form action="./" method="post" novalidate>
            <div class="row">
                <?php
                $accion = 11;
                include './views/forms/usuario_req.php';
                include './views/forms/password_req.php';
                include './views/forms/password_bis_req.php';
                include './views/forms/nombre_req.php';
                include './views/forms/apellidos_req.php';
                include './views/forms/mail_req.php';
                include './views/forms/telefono_req.php';
                include './views/forms/fnac_req.php';
                include './views/forms/sexo.php';
                include './views/forms/direccion.php';
                include './views/forms/accion.php';
                ?>
            </div>
            <?php
            include './views/forms/submit.php';
            ?>
        </form>
        <!-- Si las contraseñas no coinciden devuelve un mensaje de error -->
        <?php
        if (isset($error)) {
        ?>
            <div class="row justify-content-center">
                <div class="col-lg-8 alert alert-danger" role="alert">
                    <h4 class="text-center">
                        <?php
                        echo $error;
                        ?>
                    </h4>
                </div>
            </div>
        <?php
        }
        ?>

        <!-- Si el usuario o el correo ya existe devuelve un mensaje de error con un enlace a la página de inicio -->
        <?php
        if (isset($error_2)) {
        ?>
            <div class="row alert alert-danger" role="alert">
                <div class="col-lg-10">
                    <h4 class="text-center"> <?php echo $error_2; ?></h4>
                </div>
                <div class="form-floating col-lg-2 g-3">
                    <form action="./" method="post">
                        <input type="submit" class="btn btn-outline-primary" name="inicio_sesion" id="inicio_sesion" value="Inicio de Sesión">
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
</div>