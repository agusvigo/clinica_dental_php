<!DOCTYPE html>
<div class="col-lg-4 g-3">
    <label for="rol" class="form-label">Rol</label>
    <input type="text" class="form-control 
    <?php 
    if ($val_rol === true) echo "is-valid";
    if ($val_rol === false) echo "is-invalid";
    ?>
    " name="rol" id="rol" 
    <?php 
    if (isset($rol)) echo "value = '$rol'";
    ?>
    >
    <div class="invalid-feedback">¡Los únicos valores válidos son 'user' o 'admin'!</div>
</div>