<?php
require_once ('../entidad/Mantenimiento.php');
require_once ('../modelo/Mantenimiento.php');

$retorno = array ('exito'=>1,'mensaje'=> '', 'data'=>null, 'numeroRegitros'=>0);

try{
    $id = $_POST['id'];
    $idEquipo = $_POST['idEquipo'];
    $idEmpresa = $_POST['idEmpresa'];
    $tipoMnt = $_POST['tipoMnt'];
    $noReporte = $_POST['noReporte'];
    ///filtro de rangos
    $minDate = $_POST['minDate'];
    $maxDate = $_POST['maxDate'];

    $eMantenimiento = new \entidad\Mantenimiento();
    $eMantenimiento->setId($id);
    $eMantenimiento->setIdEquipo($idEquipo);
    $eMantenimiento->setIdEmpresa($idEmpresa);
    $eMantenimiento->setTipoMnt($tipoMnt);
    $eMantenimiento->setNoReporte($noReporte);
    $eMantenimiento->setMinDate($minDate);
    $eMantenimiento->setMaxDate($maxDate);

    $mMantenimiento = new \modelo\Mantenimiento($eMantenimiento);
    $mMantenimiento->consultar();

    $retorno['numeroRegitros'] = $mMantenimiento->conexion->obtenerNumeroRegistros();
    $contador=0;
    while($fila = $mMantenimiento->conexion->obtenerObjeto()){
        $retorno['data'][$contador]['id'] = $fila->id;
        $retorno['data'][$contador]['idEquipo'] = $fila->idEquipo;
        $retorno['data'][$contador]['idEmpresa'] = $fila->idEmpresa;
        $retorno['data'][$contador]['idEmpleado'] = $fila->idEmpleado;

        $retorno['data'][$contador]['tipoMnt'] = $fila->tipoMnt;
        $retorno['data'][$contador]['observaciones'] = $fila->observaciones;
        $retorno['data'][$contador]['costo'] = $fila->costo;
        $retorno['data'][$contador]['noReporte'] = $fila->noReporte;
        $retorno['data'][$contador]['pdfReporte'] = $fila->pdfReporte;
        $retorno['data'][$contador]['repuesto'] = $fila->repuesto;
        $retorno['data'][$contador]['fechaRealizacion'] = $fila->fechaRealizacion;
        $retorno['data'][$contador]['fechaCreacion'] = $fila->fechaCreacion;
        $retorno['data'][$contador]['evaluacionIntervencion'] = $fila->evaluacionIntervencion;

        $retorno['data'][$contador]['nombreEmpresa'] = $fila->nombreEmpresa;
        ///se desabilita nombre puesto que no se observa transporte de datos.
        //$retorno['data'][$contador]['nombre'] = $fila->nombre;
        $retorno['data'][$contador]['nombresPersona'] = $fila->nombrePersona." ".$fila->apellidoPersona;

        $retorno['data'][$contador]['noEstacion'] = $fila->noEstacion;


        $contador++;
    }
    
}catch(Exception $e) {
    $retorno['exito']=0;
    $retorno['mensaje'] = $e->getMessage();
}
echo json_encode($retorno);
?>