<!DOCTYPE html>
<div class="col-lg-4 g-3">
    <label for="mail" class="form-label">Correo electrónico *</label>
    <input type="mail" class="form-control 
    <?php 
    if ($val_mail === true) echo "is-valid";
    if ($val_mail === false) echo "is-invalid";
    ?>
    " name="mail" id="mail" required placeholder="Introduzca su email" 
    <?php 
    if (isset($mail)) echo "value = '$mail'";
    ?>
    >
    <div class="invalid-feedback">¡Introduzca una dirección de correo electrónica válida!</div>
</div>