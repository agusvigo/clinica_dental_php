<!DOCTYPE html>
<?php
//Extraemos las arrays con los datos de cada noticia
foreach ($news as $index){
    //Extraemos los datos de cada noticia
    foreach ($index as $columna=>$valor){
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
                    ?> class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" loading="lazy">
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
</div>
<?php
}
?>