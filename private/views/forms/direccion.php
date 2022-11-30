<!DOCTYPE html>
<div class="col-lg-8 g-3">
    <label for="direccion" class="form-label">Dirección</label>
    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Introduzca su dirección" 
    <?php 
    if (isset($direccion)) echo "value = '$direccion'";
    ?>
    >
</div>