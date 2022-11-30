<!DOCTYPE html>
<div class="col-lg-4 g-3">
    <label for="password" class="form-label">Contraseña *</label>
    <input type="password" class="form-control
    <?php 
    if ($val_password === true) echo "is-valid";
    if ($val_password === false) echo "is-invalid";
    ?>
    " name="password" id="password" required
    <?php 
    if (isset($password)) echo "value = '$password'";
    ?>
    >
    <div class="invalid-feedback">¡La contraseña tiene que tener mas de 4 caracteres!</div>
</div>