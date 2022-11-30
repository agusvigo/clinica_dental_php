<!DOCTYPE html>
<!---------------------------------------------------- Modificación de Noticia --------------------------------------------------------->
<section class="container-fluid">
    <div class="row py-4">
        <div class="col">
            <h2 class="text-center">Modificación de Noticia <span class="text-primary"><?php echo "$idNoticia"; ?></span></h2>
        </div>
    </div>

    <!-- Modificación de la imagen-->

    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6 text-center">
            <?php
        if (!isset($acc)) {
            ?>
            <div class="row  justify-content-center">
                <div class="col-6 text-center">
                    <h5>Si desea modificar la imagen de la noticia seleccione una para subirla al servidor y a continuación pulse Modificar Noticia</h5>
                </div>
            </div>
            <?php
        }
            
            
            //Definimos las variables
            $ok = '';
            $destino = '';
            $img = null;
            /****************Subimos el archivo enviado por el formulario por 'POST'******************/
            if (isset($acc)) {
                if ($acc === 'subir') {
                    // si venimos del formulario sacamos los datos del archivo
                    $tamano = $_FILES["archivo"]['size'];
                    $tipo = $_FILES["archivo"]['type'];
                    $archivo = $_FILES["archivo"]['name'];

                    if ($archivo != "") {
                        // guardamos el archivo en el raiz siempre que no venga vacio
                        //y lo llamamos 'nuevo_' y el nombre que tubiera en el rodenador
                        $destino =  "../assets/images/uploaded_$archivo";
                        if (copy($_FILES['archivo']['tmp_name'], $destino)) {
                            $ok = 'Archivo subido: si';
                        } else {
                            $ok = 'Archivo subido: no';
                        }
                    } else {
                        $ok = 'no se selecciono archivo';
                    }
                }
                /*******************************Reidmensionamos la imagen**************************************/
                //Extraemos la información de las dimensiones de la imagen y la extensión
                $img_info = getimagesize($destino);
                list($width, $heigth) = $img_info;

                //Cargamos la imagen según el tipo de imagen
                if (isset($img_info['mime'])) {
                    if ($img_info['mime'] === 'image/gif') {
                        $img = imagecreatefromgif($destino);
                    } elseif ($img_info['mime'] === 'image/png') {
                        $img = imagecreatefrompng($destino);
                    } elseif ($img_info['mime'] === 'image/jpeg') {
                        $img = imagecreatefromjpeg($destino);
                    } else {
                        echo "Suba un fichero válido, formatos admitidos 'jpeg', 'bmp' o 'gif'.";
                        exit();
                    }

                    //Redimensionamos la imagen a un ancho de 400 px conservando la relación de aspecto
                    $new_width = 700;
                    $img_resized = imagescale($img, $new_width);
                    imagejpeg($img_resized, '../assets/images/img_resized.jpeg');
                    imagedestroy($img);
                    imagedestroy($img_resized);
                    //Borramos la imagen original
                    unlink($destino);

                    /*************************mostramos la imagen en el navegador************************************/
                    if (file_exists('../assets/images/img_resized.jpeg')) {
                        ?>
                        <img src="../assets/images/img_resized.jpeg" alt="fichero subido">
                        <?php
                    } else {
                        echo "Suba un fichero más válido, formatos admitidos 'jpeg', 'bmp' o 'gif'.";
                    }
                } else {
                    echo "Suba un fichero válido, formatos admitidos 'jpeg', 'bmp' o 'gif'.";
                }
            }

            /***************************Formulario de subida de la imagen************************************/

            ?>

            <p><?php echo  $ok ?></p>
            <form action="" method="post" enctype="multipart/form-data">
                <input name="archivo" type="file" size="35" />
                <input name="enviar" type="submit" value="Subir fichero" />
                <input name="acc" type="hidden" value="subir" />
                <input name="accion" type="hidden" value="22" />
                <input name="modif_noticia" type="hidden" value="modif_noticia" />
                <input name="idNoticia" type="hidden" <?php if (isset($idNoticia)) echo "value = '$idNoticia'"; ?> />
                <input name="fecha" type="hidden" <?php if (isset($fecha)) echo "value = '$fecha'"; ?> />
                <input name="titulo" type="hidden" <?php if (isset($titulo)) echo "value = '$titulo'"; ?> />
                <input name="texto" type="hidden" <?php if (isset($texto)) echo "value = '$texto'"; ?> />
            </form>
        </div>

        <!-- Formulario para la modificacion de datos -->
        <div class="col-lg-6">
            <div class="row py-4">
                <div class="col">
                    <form action="./main.php" method="post">
                        <div class="row">
                            <?php
                            $accion = 24;
                            include './views/forms/accion.php';
                            ?>
                            <div class="text-center col g-3">
                                <div class="row justify-content-center">
                                <input type="hidden" name="idNoticia" value = "<?php echo $idNoticia; ?>">
                                <input type="hidden" name="idUser" value = "<?php echo $logged_idUser; ?>">
                                    <div class="form-floating col-lg-4 g-3">
                                        <input type="date" name="fecha" class="form-control" id="floatingfecha" placeholder="Fecha" value = <?php if (isset($fecha)) echo $fecha; ?>>
                                        <label for="floatingimagen">Fecha</label>
                                    </div>
                                    <div class="form-floating col-lg-9 g-3">
                                        <input type="text" name="titulo" class="form-control" id="floatingtitulo" placeholder="Título" <?php if (isset($titulo)) echo "value = '$titulo'"; ?>>
                                        <input type="hidden" name="titulo_orig" value = "<?php echo $titulo; ?>">
                                        <label for="floatingtitulo">Título</label>
                                    </div>
                                    <div class="form-floating col-lg-9 g-3">
                                        <textarea class="form-control" id="floatingTextarea" name="texto" style="height: 300px"><?php if (isset($texto)) echo $texto; ?></textarea>
                                        <label for="floatingTextarea">Texto de la noticia</label>
                                    </div>
                                    <div class="row py-5">
                                        <div class="col text-center">
                                            <input type="submit" class="btn btn-outline-primary" name="modif_noticia" value="Modificar Noticia">
                                        </div>
                                        <div class="col text-center">
                                            <input type="submit" class="btn btn-outline-primary" name="volver" value="Volver">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
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