<?php
require_once '../entidad/MantenimientosProgramados.php';
require_once '../modelo/MantenimientosProgramados.php';

$retorno = array ('exito'=>1, 'mensaje'=> '', 'data'=>null, 'numeroRegistros'=>'');

try {
    $id = $_REQUEST['id'];
    $idEmpresa = $_REQUEST['idEmpresa'];
    $estado = $_REQUEST['estado'];
    
    $mttosProgramadosE =  new \entidad\MantenimientosProgramados();
    $mttosProgramadosE->setId($id);
    $mttosProgramadosE->setIdEmpresa($idEmpresa);
    $mttosProgramadosE->setEstado($estado);

    $mttosProgramadosM = new \modelo\MantenimientosProgramados($mttosProgramadosE);
    $mttosProgramadosM->consultar();
    
    $retorno['numeroRegistros'] = $mttosProgramadosM->conexion->obtenerNumeroRegistros();
    $contador =0;
    while ($fila = $mttosProgramadosM->conexion->obtenerObjeto()) {
        $retorno['data'][$contador]['nombreEmpresa'] = $fila->nombreEmpresa;
        $retorno['data'][$contador]['id'] = $fila->id;
        $retorno['data'][$contador]['idEmpresa'] = $fila->idEmpresa;
        $retorno['data'][$contador]['fechaInicio'] = $fila->fechaInicio;
        $retorno['data'][$contador]['fechaFin'] = $fila->fechaFin;
        $retorno['data'][$contador]['mantenimientosPreventivos'] = $fila->mantenimientosPreventivos;
        $retorno['data'][$contador]['estado'] = $fila->estado;
        $retorno['data'][$contador]['observaciones'] = $fila->observaciones;
        
        $contador++;
    }
    
} catch (Exception $e) {
    $retorno['exito']=0;
    $retorno['mensaje'] = $e->getMessage();
}
echo json_encode($retorno);

?>