<!DOCTYPE html>

<!-- ******************************* Contenido del carrusel************************************** -->
<!-- Contenido del Carrusel -->
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="bd-placeholder-img" width="auto" height="auto" src="./assets/carrusel/carrusel_1.jpg" alt="carousel img 1" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Odontología General</h1>
            <p>Trabajamos con las técnicas y el material mas moderno</p>
            <!-- Button trigger modal 1-->
            <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#modal_1">
              Pida cita
            </button>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="bd-placeholder-img" width="auto" height="auto" src="./assets/carrusel/carrusel_2.jpg" alt="carousel img 1" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">

        <div class="container">
          <div class="carousel-caption">
            <h1>Implantes Dentales</h1>
            <p>El mejor equipo especialista en implantología dental</p>
            <!-- Button trigger modal 3-->
            <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#modal_2">
              Saber más
            </button>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="bd-placeholder-img" width="auto" height="auto" src="./assets/carrusel/carrusel_3.jpg" alt="carousel img 1" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Limpieza desensibilizante con fluoruros (5% NaF)</h1>
            <p>Especialmente este tipo de limpiezas se usan para pacientes con dientes hipersensibles después de preparaciones de cavidad
              o en caso de cuellos de dientes sensibles se sellan efectivamente los túbulos dentinales, son de aplicación fina, se adhieren
              también a superficies dentales húmedas, es ideal para el tratamiento de los cuellos de dientes sensibles y remoción de sarro</p>
            <!-- Button trigger modal 3-->
            <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#modal_3">
              Más Info
            </button>


          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Modal 1-->
  <div class="modal fade" id="modal_1" tabindex="-1" aria-labelledby="modal_1Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pedir cita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6>En nuestra web</h6>
          <p>
            Puede pedir cita a través de nuestra web registrándose previamente mediante el enlace siguente
          </p>
          <form class="mb-3" action="" method="post">
            <input type="submit" class="btn btn-primary" name="registro" value="Registro">
          </form>
          <h6>Por teléfono o WhatsApp</h6>
          <p>
            Puede pedir cita telefónicamente en el teléfono 915478236.
          </p>
          <p>
            También puede pedir cita enviando un WhatsApp al teléfono 667587458.
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal 2-->
  <div class="modal fade" id="modal_2" tabindex="-1" aria-labelledby="modal_2Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Implantes dentales</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6>Implantes dentales</h6>
          <p>
            Si está pensando que los implantes dentales pueden ser la solución para sus problemas de salud y estética dental,
            acaba de encontrar el mejor lugar para acabar con sus problemas dentales. Clínica Dentales una de
            las clínicas dentales más prestigiosas de toda la comunidad de Madrid, basando nuestro éxito en la relación
            calidad/precio de nuestros tratamientos dentales.
          </p>
          <h6>¿En que consisten los implantes dentales?</h6>
          <p>
            Los implantes dentales son elementos metálicos que se ubican quirúrgicamente en los maxilares por debajo de las
            encías, restituyendo las piezas dentales perdidas. El implante se fusiona con el hueso mandibular, lo que
            proporciona un soporte estable para los dientes artificiales. Una ventaja de este procedimiento es que no precisa
            el desgaste de las piezas adyacentes.>
          </p>
          <p>La importancia de la calidad del implante dental usado es fundamental para reducir el índice de fracaso.</p>
          <p>En Clínica Dental ponemos los mejores implantes del mercado:</p>
          <p>– BTI BioTechnology Institute.</p>
          <p>– 3i (Implant Innovations) casa de EE.UU certificada por la ADA.</p>
          <p>– Y todas las marcas de implantes dentales premiun del mercado</p>
          <p>En las prótesis sobre implantes que utilizamos destacamos la soldadura LASER para conseguir un ajuste exacto.</p>
          <p>– Utilización técnica CAD-CAM</p>
          <p>– Utilización de Zirconio.</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal 3-->
  <div class="modal fade" id="modal_3" tabindex="-1" aria-labelledby="modal_3Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Limpieza desensibilizante con fluoruros (5% NaF)</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6>La Hipersensibilidad</h6>
          <p>
            Por lo general se da en dientes sensibles causando dolores temporarios al paciente, donde muchas no se mencionan
            cuando va a visitar el dentista, la causa para la hipersensibilidad son por regla general los túbulos dentinales
            abiertos, la meta del tratamiento es, por eso, cerrarlos.
          </p>
          <p>
            Este tipo de limpiezas de desensibilización rápida y liberación de fluoruros (5 % NaF ≙ 22.600 ppm fluoruro).
          </p>
          <p>
            El ión de fluoruro opera junto con el ión de calcio enriquecido en los túbulos una precipitación del fluoruro
            de calcio que conduce a un sellado seguro de los túbulos.
          </p>
          <p>
            Los dentistas confirman que más de un 85 % de los pacientes ya no tenían ningún dolor después del primer tratamiento,
            aparte el sellado rápido de los túbulos dentinales forma los depósitos de fluoruro de calcio en la superficie dental.
          </p>
          <p>
            Estos protegen el diente ante ataques acídicos, fomentan la remineralización y contribuyen a largo
            plazo a la formación de fluorapatita.
          </p>
          <p>
            La laca tiene, además, xilitol. Adicionalmente a la propiedad que mejora el sabor, xilitol también contiene un efecto
            cariostático. Lo que llamamos laca es como un gel del mismo color del diente.
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>