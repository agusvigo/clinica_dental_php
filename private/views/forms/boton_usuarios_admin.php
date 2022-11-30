<!DOCTYPE html>
<input type="submit" 
<?php
if ($boton_usuarios_admin){
    ?> class="btn btn-primary" <?php
} else {
    ?> class="btn btn-info" <?php
}
?> name="usuarios_admin" value="Usuarios-administración">