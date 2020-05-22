<?php
require_once ('../entidad/MantenimientosProgramados.php');
require_once ('../modelo/MantenimientosProgramados.php');

$retorno = array ('exito'=>1,'mensaje'=> 'La información se adicionó correctamente');

try{
    $id = $_REQUEST['id'];
    $idEmpresa = $_REQUEST['idEmpresa'];
    $fechaInicio = $_REQUEST['fechaInicio'];
    $fechaFin = $_REQUEST['fechaFin'];
    $observaciones = $_REQUEST['observaciones'];
    $estado = $_REQUEST['estado'];
    $mantenimientosPreventivos = $_REQUEST['mantenimientosPreventivos'];

    $eMantenimiento = new \entidad\MantenimientosProgramados();
    $eMantenimiento->setId($id);
    $eMantenimiento->setIdEmpresa($idEmpresa);
    $eMantenimiento->setFechaInicio($fechaInicio);
    $eMantenimiento->setFechaFin($fechaFin);
    $eMantenimiento->setObservaciones($observaciones);
    $eMantenimiento->setEstado($estado);
    $eMantenimiento->setMantenimientosPreventivos($mantenimientosPreventivos);

    $mMantenimiento = new \modelo\MantenimientosProgramados($eMantenimiento);
    $mMantenimiento->modificar();

}catch(Exception $e) {
    $retorno['exito']=0;
    $retorno['mensaje'] = $e->getMessage();
}
echo json_encode($retorno);
?>
