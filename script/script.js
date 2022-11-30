//Definimos los scripts para las vistas de invitado
//Definimos la función para cambiar el anuncio del artículo 1
if (document.querySelectorAll('.menu_invitado').length >0) {
    let counter = 0;
    const cambia_anuncio = () =>{
        if (counter === 0){
            $('#articulo_1').css('background-image',"url('./assets/inicio/articulo_1_2.jpg')");
            $('#anuncio_1').css('display','none');
            $('#anuncio_2').css('display','block');
            counter = 1;
        } else {
            $('#articulo_1').css('background-image',"url('./assets/inicio/articulo_1_1.jpg')");
            $('#anuncio_2').css('display','none');
            $('#anuncio_1').css('display','block');
            counter = 0;
        }
    }
    //Definimos la función para lanzar el temporizador del cambio de colores
    const interval = setInterval(cambia_anuncio,6000);
//Definimos los scripts para las vistas de usuario y admin
} else {
    let counter = 0;
    const cambia_anuncio = () =>{
        if (counter === 0){
            $('#articulo_1').css('background-image',"url('../assets/inicio/articulo_1_2.jpg')");
            $('#anuncio_1').css('display','none');
            $('#anuncio_2').css('display','block');
            counter = 1;
        } else {
            $('#articulo_1').css('background-image',"url('../assets/inicio/articulo_1_1.jpg')");
            $('#anuncio_2').css('display','none');
            $('#anuncio_1').css('display','block');
            counter = 0;
        }
    }
    //Definimos la función para lanzar el temporizador del cambio de colores
    const interval = setInterval(cambia_anuncio,6000);
}


