<?php
function limpiarFormulario($_POST){
    foreach ($_POST as $llave=>$valor){
        $_POST[$llave] = '';
    }
}
?>
