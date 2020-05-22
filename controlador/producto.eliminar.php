<?php
require_once ('../entidad/Mantenimiento.php');
require_once ('../modelo/Mantenimiento.php');

$retorno = array ('exito'=>1,'mensaje'=> 'La información se eliminó correctamente');

try{
    $conexion = new \Conexion();
    $id = $_POST['id'];

    $eMantenimiento = new \entidad\Mantenimiento();
    $eMantenimiento->setId($id);
    
    $mMantenimiento = new \modelo\Mantenimiento($eMantenimiento);
    $mMantenimiento->eliminar();
    
}catch(Exception $e) {
    $retorno['exito']=0;
    $retorno['mensaje'] = $e->getMessage();
}
echo json_encode($retorno);
?>
