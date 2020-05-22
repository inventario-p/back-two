<?php

require_once ('../entidad/Mantenimiento.php');
require_once ('../modelo/Mantenimiento.php');
require_once ('../entorno/Conexion.php');

$retorno = array ('exito'=>1,'mensaje'=> 'la información se guardo correctamente', 'data'=>null, 'numeroRegitros'=>0);

try{

    $id = $_REQUEST['id'];
    $nombre = $_REQUEST['nombre'];
    $referencia = $_REQUEST['referencia'];
    $precio = $_REQUEST['precio'];
    $peso = $_REQUEST['peso'];
    $categoria = $_REQUEST['categoria'];
    $stock = $_REQUEST['stock'];

    //$valorRepuesto = implode(",", $repuesto);

    $eMantenimiento = new \entidad\Mantenimiento();
    $eMantenimiento->setId($id);
    $eMantenimiento->setIdEquipo($idEquipo);
    $eMantenimiento->setIdEmpresa($idEmpresa);
    $eMantenimiento->setIdEmpleado($idEmpleado);
    $eMantenimiento->setTipoMnt($tipoMnt); 

    $eMantenimiento->setNoReporte($noReporte);
    $eMantenimiento->setRepuesto($repuesto);
    $eMantenimiento->setFechaRealizacion($fechaRealizacion);
    $eMantenimiento->setCosto($costo);
    $eMantenimiento->setImagenMnt($imagenMnt);
    $eMantenimiento->setPdfReporte($pdfReporte);
    $eMantenimiento->setObservaciones($observaciones);
    $eMantenimiento->setEvaluacionIntervencion($evaluacionIntervencion);

    $mMantenimiento = new \modelo\Mantenimiento($eMantenimiento);
    $mMantenimiento->adicionar();
    
}catch(Exception $e) {
    $retorno['exito']=0;
    $retorno['mensaje'] = $e->getMessage();
}
echo json_encode($retorno);
?>
