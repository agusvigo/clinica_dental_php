<!DOCTYPE html>
<div class="col-lg-4 g-3">
    <label for="password_2" class="form-label">Repita la contraseña *</label>
    <input type="password" class="form-control
    <?php 
    if ($val_password_2 === true) echo "is-valid";
    if ($val_password_2 === false) echo "is-invalid";
    ?>
    " name="password_2" id="password_2" required
    <?php 
    if (isset($password_2)) echo "value = '$password_2'";
    ?>
    >
    <div class="invalid-feedback">¡Las contraseñas introducidas no coinciden!</div>
</div>