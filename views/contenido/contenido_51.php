<!DOCTYPE html>
<!------------------------------- Confirmación de inicio de sesión --------------------------------------------->
<div class="container">
    <section class="py-5 container text-center">
        <h2>Registro Correcto</h2>
        <div class="alert alert-primary" role="alert">
            <h3 id="message">
                <?php
                if (isset($error)) echo $error;
                ?>
            </h3>
        </div>
        <form action="./" method="post">
            <div class="row justify-content-center">
                <?php
                include './views/forms/boton_inicio_sesion_2.php';
                ?>
            </div>
        </form>
    </section>
</div>