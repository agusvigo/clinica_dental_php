<!DOCTYPE html>
<input type="submit" 
<?php
if ($boton_inicio_sesion){
    ?> class="btn btn-primary menu_invitado" <?php
} else {
    ?> class="btn btn-info menu_invitado" <?php
}
?> name="inicio_sesion" value="Inicio de Sesión">