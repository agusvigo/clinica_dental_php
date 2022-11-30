<!DOCTYPE html>
<div class="col-lg-4 g-3">
    <label for="fnac" class="form-label">Fecha de nacimiento</label>
    <input type="date" class="form-control 
    <?php 
    if ($val_fnac === true) echo "is-valid";
    if ($val_fnac === false) echo "is-invalid";
    ?>
    " name="fnac" id="fnac" 
    <?php 
    if (isset($fnac)) {echo "value = '$fnac'";} else {echo "value = '$logged_fnac'";}
    ?>
    >
    <div class="invalid-feedback">¡Tiene que ser mayor de 18 años para registarse!</div>
</div>