<?php
require_once('../entidad/Venta.php');
require_once('../modelo/Venta.php');

$retorno = array ('exito'=>1,'mensaje'=> 'La información se adicionó correctamente');

try{
    $idEmpresa = $_REQUEST['idEmpresa'];
    $fechaInicio = $_REQUEST['fechaInicio'];
    $fechaFin = $_REQUEST['fechaFin'];
    $observaciones = $_REQUEST['observaciones'];
    $estado = $_REQUEST['estado'];
    $mantenimientosPreventivos = $_REQUEST['mantenimientosPreventivos'];

    $eMantenimiento = new \entidad\Venta();
    $eMantenimiento->setIdEmpresa($idEmpresa);
    $eMantenimiento->setFechaInicio($fechaInicio);
    $eMantenimiento->setFechaFin($fechaFin);
    $eMantenimiento->setObservaciones($observaciones);
    $eMantenimiento->setEstado($estado);
    $eMantenimiento->setMantenimientosPreventivos($mantenimientosPreventivos);

    $mMantenimiento = new \modelo\Venta($eMantenimiento);
    $mMantenimiento->adicionar();

}catch(Exception $e) {
    $retorno['exito']=0;
    $retorno['mensaje'] = $e->getMessage();
}
echo json_encode($retorno);
?>
