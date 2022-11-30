<!DOCTYPE html>
<!----------------------------- Página de confirmación de registro ------------------------------------------>
<div class="container">
    <section class="py-5 container text-center">
        <h2>Area Privada</h2>
        <div class="alert alert-primary" role="alert">
            <h3 id="message">
                <?php
                if (isset($error)) echo $error;
                ?>
            </h3>
        </div>
        <a class="btn btn-primary" href="./private/main.php" role="button">Continuar</a>
    </section>
</div>