<!DOCTYPE html>
<!--------------------------------------- Administración de noticias --------------------------------->
<section class="container-fluid">
    <div class="row py-4">
        <div class="col">
            <h2 class="text-center">Administración de noticias</h2>
        </div>
    </div>
    
    <div class="row py-4">
            <div class="col">
                <!-- Crear nueva Noticia -->
                <form action="./main.php" method="post">
                    <?php
                    $accion = 25;
                    include './views/forms/accion.php';
                    ?>
                    <div class="col g-3">
                        <input type="submit" name="crear_noticia" class="btn btn-primary btn-lg" value="Nueva Noticia +">
                    </div>
                </form>
            </div>
        </div>
    <?php
    include './views/noticias/noticias_admin.php'
    ?>
</section>