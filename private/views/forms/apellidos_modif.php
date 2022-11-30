<!DOCTYPE html>
<div class="col-lg-8 g-3">
    <label for="apellidos" class="form-label">Apellidos</label>
    <input type="text" class="form-control 
    <?php 
    if ($val_apellidos === true) echo "is-valid";
    if ($val_apellidos === false) echo "is-invalid";
    ?>
    " name="apellidos" id="apellidos" 
    <?php 
    if (isset($nombre)) {echo "value = '$apellidos'";} else {echo "value = '$logged_apellidos'";}
    ?>
    >
    <div class="invalid-feedback">¡Apellidos inválidos, sólo letras entre 2 y 80 caracteres!</div>
</div>