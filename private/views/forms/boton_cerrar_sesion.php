<!DOCTYPE html>
<input type="submit" 
<?php
if ($boton_cerrar_sesion){
    ?> class="btn btn-primary" <?php
} else {
    ?> class="btn btn-info" <?php
}
?> name="cerrar_sesion" value="Cerrar Sesión">