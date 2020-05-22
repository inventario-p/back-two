<?php
require_once('../entidad/Venta.php');
require_once('../modelo/Venta.php');

$retorno = array ('exito'=>1,'mensaje'=> 'La información se eliminó correctamente');

try{
    $id = $_POST['id'];

    $eMantenimiento = new \entidad\Venta();
    $eMantenimiento->setId($id);
    
    $mMantenimiento = new \modelo\Venta($eMantenimiento);
    $mMantenimiento->eliminar();
    
}catch(Exception $e) {
    $retorno['exito']=0;
    $retorno['mensaje'] = $e->getMessage();
}
echo json_encode($retorno);
?>