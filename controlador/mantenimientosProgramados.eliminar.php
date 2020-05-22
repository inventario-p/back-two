<?php
require_once ('../entidad/MantenimientosProgramados.php');
require_once ('../modelo/MantenimientosProgramados.php');

$retorno = array ('exito'=>1,'mensaje'=> 'La información se eliminó correctamente');

try{
    $id = $_POST['id'];

    $eMantenimiento = new \entidad\MantenimientosProgramados();
    $eMantenimiento->setId($id);
    
    $mMantenimiento = new \modelo\MantenimientosProgramados($eMantenimiento);
    $mMantenimiento->eliminar();
    
}catch(Exception $e) {
    $retorno['exito']=0;
    $retorno['mensaje'] = $e->getMessage();
}
echo json_encode($retorno);
?>