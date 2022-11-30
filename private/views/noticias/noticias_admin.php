<!DOCTYPE html>
<?php
//Extraemos las arrays con los datos de cada noticia
foreach ($news as $index){
    //Extraemos los datos de cada noticia
    foreach ($index as $columna=>$valor){
        if ($columna === 'idNoticia') $idNoticia = $valor;
        if ($columna === 'titulo') $titulo_not = $valor;
        if ($columna === 'imagen') $image_not = $valor;
        if ($columna === 'texto') $texto_not = $valor;
        if ($columna === 'fecha') $fecha = $valor;
        if ($columna === 'nombre') $nombre_not = $valor;
        if ($columna === 'apellidos') $apellidos_not = $valor;

    }
//reordemanos el valor de la fecha
$day = (substr($fecha,-2,2));
$mounth = (substr($fecha,-5,2));
$year = (substr($fecha,-10,4));
$fecha_not = "$day-$mounth-$year";
?>
<div class="container col-xxl-8 px-4 my-4 noticia border rounded">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-3">
        <div class="col-10 col-sm-8 col-lg-6">
            <img <?php
                    echo "src='../assets/images/$image_not'";
                    ?> class="d-block mx-lg-auto img-fluid rounded" alt="Bootstrap Themes" width="700" loading="lazy">
        </div>
        <div class="col-lg-6">
            <p>
                <?php
                echo $fecha_not;
                ?>
            </p>
            <h3 class="lh-1 mb-3">
                <?php
                echo $titulo_not;
                ?>
            </h3>
            <p class="lead">
                <?php
                echo $texto_not;
                ?>
            </p>
            <p class="font-weight-bold">
                <?php
                echo "Creado por $nombre_not $apellidos_not";
                ?>
            </p>
        </div>
    </div>
    <form action="./main.php" method="post">
    <?php
    $accion = 22;
    include './views/forms/accion.php';
    ?><div class="row mb-3">
            <input type="hidden" name="idNoticia" value="<?php echo $idNoticia; ?>">
            <input type="hidden" name="titulo" value="<?php echo $titulo_not; ?>">
            <input type="hidden" name="imagen" value="<?php echo $image_not; ?>">
            <input type="hidden" name="texto" value="<?php echo $texto_not; ?>">
            <input type="hidden" name="fecha" value="<?php echo $fecha; ?>">
            <div class="text-center col g-3">
                <input type="submit" name="modif_noticia" class="btn btn-outline-primary" value="Modificar">
                <input type="submit" name="borrar_noticia" class="btn btn-outline-danger" value="Borrar">
            </div>
        </div>
    </form>
</div>
<?php
}
?>