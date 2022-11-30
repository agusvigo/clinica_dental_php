<!DOCTYPE html>
<div class="col-lg-4 g-3">
    <label for="nombre" class="form-label">Nombre *</label>
    <input type="text" class="form-control
    <?php 
    if ($val_nombre === true) echo "is-valid";
    if ($val_nombre === false) echo "is-invalid";
    ?>
    " name="nombre" id="nombre" required placeholder="Introduzca su nombre" 
    <?php 
    if (isset($nombre)) echo "value = '$nombre'";
    ?>
    >
    <div class="invalid-feedback">¡Nombre inválido, sólo letras entre 2 y 32 caracteres!</div>
</div>