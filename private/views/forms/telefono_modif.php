<!DOCTYPE html>
<div class="col-lg-4 g-3">
    <label for="telefono" class="form-label">Teléfono</label>
    <input type="tel" class="form-control 
    <?php 
    if ($val_telefono === true) echo "is-valid";
    if ($val_telefono === false) echo "is-invalid";
    ?>
    " name="telefono" id="telefono" 
    <?php 
    if (isset($telefono)) {echo "value = '$telefono'";} else {echo "value = '$logged_telefono'";}
    ?>
    >
    <div class="invalid-feedback">¡Introduzca un número de 9 cifras que empiece por 6, 7, 8 o 9!</div>
</div>