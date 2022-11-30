<!DOCTYPE html>

<!--******************************* Contenido de la página de inicio*********************************** -->

<section class="container-fluid">
  <div class="row py-4">
    <div class="col">
      <h2 class="text-center display-6 fw-normal lh-1 mb-3">Bienvenido a nuestra clínica dental</h2>
    </div>
  </div>
  <?php
  include './views/inicio/carrusel.php';
  ?>
  <div class="row justify-content-around">
  <?php
  include './views/inicio/columna_principal.php';
  include './views/inicio/columna_lateral.php';
  ?>
  </div>
</section>