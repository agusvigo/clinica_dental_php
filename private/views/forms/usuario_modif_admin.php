<!DOCTYPE html>
<div class="col-lg-4 g-3">
    <label for="usuario" class="form-label">Usuario</label>
    <input type="text" class="form-control 
    <?php 
    if ($val_usuario === true) echo "is-valid";
    if ($val_usuario === false) echo "is-invalid";
    ?>
    " name="usuario" id="usuario" 
    <?php 
    if (isset($usuario)) echo "value = '$usuario'";
    ?>
    >
    <div class="invalid-feedback">¡Usuario inválido, sólo letras y números entre 2 y 32 caracteres!</div>
</div>