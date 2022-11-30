<!DOCTYPE html>
<div class="col-lg-8 g-3">
    <label for="direccion" class="form-label">Dirección</label>
    <input type="text" class="form-control" name="direccion" id="direccion" 
    <?php 
    if (isset($direccion)) {echo "value = '$direccion'";} else {echo "value = '$logged_direccion'";}
    ?>
    >
</div>