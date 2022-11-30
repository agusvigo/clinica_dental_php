<!DOCTYPE html>
<div class="col-lg-4 g-3">
    <label for="sexo" class="form-label">Sexo</label>
    <select class="form-select" name="sexo" id="sexo" disabled>
        <?php
        if ($sexo === ''){
            ?>
            <option value="" selected>Seleccionar valor</option>
            <?php
        } else {
            ?>
            <option value="">Seleccionar valor</option>
            <?php
        }
        if ($sexo === 'femenino'){
            ?>
            <option value="femenino" selected>Femenino</option>
            <?php
        } else {
            ?>
            <option value="femenino">Femenino</option>
            <?php
        }
        if ($sexo === 'masculino'){
            ?>
            <option value="masculino" selected>Masculino</option>
            <?php
        } else {
            ?>
            <option value="masculino">Masculino</option>
            <?php
        }
        if ($sexo === 'otros'){
            ?>
            <option value="otros" selected>Otros</option>
            <?php
        } else {
            ?>
            <option value="otros">Otros</option>
            <?php
        }
        ?>
    </select>
</div>