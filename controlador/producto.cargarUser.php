<?php
require_once ('../entorno/Conexion.php');

$retorno = array ('exito'=>1,'mensaje'=> '', 'data'=>null, 'numeroRegitros'=>0);

try{
    $idEmpresa = $_REQUEST['idEmpresa'];
    
    $conexion1 = new \Conexion();
    $conexion2 = new \Conexion();
    $conexion3 = new \Conexion();
    $conexion4 = new \Conexion();
    $conexion5 = new \Conexion();
    $conexion6 = new \Conexion();
    $conexion7 = new \Conexion();
    $conexion8 = new \Conexion();
    $conexion9 = new \Conexion();
    $conexion10 = new \Conexion();
    $conexion11 = new \Conexion();

    $sentencia1 = "SELECT COUNT(*) AS n, SUM(costo) AS costoN FROM mantenimiento WHERE idEmpresa = $idEmpresa AND tipoMnt = 'Preventivo'";
    $sentencia2 = "SELECT COUNT(*) AS n, SUM(costo) AS costoN FROM mantenimiento WHERE idEmpresa = $idEmpresa AND tipoMnt = 'Correctivo'";
    $sentencia3 = "SELECT COUNT(*) AS n, SUM(costo) AS costoN FROM mantenimiento WHERE idEmpresa = $idEmpresa AND tipoMnt = 'Instalacion'";
    $sentencia4 = "SELECT COUNT(*) AS n, SUM(costo) AS costoN FROM mantenimiento WHERE idEmpresa = $idEmpresa AND tipoMnt = 'Revisiones'";
    $sentencia5 = "SELECT COUNT(*) AS n, SUM(costo) AS costoN FROM mantenimiento WHERE idEmpresa = $idEmpresa AND tipoMnt = 'Traslado'";
    $sentencia6 = "SELECT COUNT(*) AS n, SUM(costo) AS costoN FROM mantenimiento WHERE idEmpresa = $idEmpresa AND tipoMnt = 'Falla Area'";
    $sentencia7 = "SELECT COUNT(*) AS n, SUM(costo) AS costoN FROM mantenimiento WHERE idEmpresa = $idEmpresa AND tipoMnt = 'Falla Personal'";
    $sentencia8 = "SELECT COUNT(*) AS n, SUM(costo) AS costoN FROM mantenimiento WHERE idEmpresa = $idEmpresa AND tipoMnt = 'Baja'";
    $sentencia9 = "SELECT COUNT(*) AS n, SUM(costo) AS costoN FROM mantenimiento WHERE idEmpresa = $idEmpresa AND tipoMnt = 'Consumibles'";
    $sentencia10 = "SELECT COUNT(*) AS n, SUM(costo) AS costoN FROM mantenimiento WHERE idEmpresa = $idEmpresa AND tipoMnt = 'Operacional y de Desempeno'";
    $sentencia11 = "SELECT COUNT(*) AS n, SUM(costo) AS costoN FROM mantenimiento WHERE idEmpresa = $idEmpresa AND tipoMnt = 'Monitoreo'";


    $conexion1->ejecutar($sentencia1);
    $conexion2->ejecutar($sentencia2);
    $conexion3->ejecutar($sentencia3);
    $conexion4->ejecutar($sentencia4);
    $conexion5->ejecutar($sentencia5);
    $conexion6->ejecutar($sentencia6);
    $conexion7->ejecutar($sentencia7);
    $conexion8->ejecutar($sentencia8);
    $conexion9->ejecutar($sentencia9);
    $conexion10->ejecutar($sentencia10);
    $conexion11->ejecutar($sentencia11);

    $fila1 = $conexion1->obtenerObjeto();
    $fila2 = $conexion2->obtenerObjeto();
    $fila3 = $conexion3->obtenerObjeto();
    $fila4 = $conexion4->obtenerObjeto();
    $fila5 = $conexion5->obtenerObjeto();
    $fila6 = $conexion6->obtenerObjeto();
    $fila7 = $conexion7->obtenerObjeto();
    $fila8 = $conexion8->obtenerObjeto();
    $fila9 = $conexion9->obtenerObjeto();
    $fila10 = $conexion10->obtenerObjeto();
    $fila11 = $conexion11->obtenerObjeto();
    
    $retorno['n1'] = $fila1->n;
    $retorno['n2'] = $fila2->n;
    $retorno['n3'] = $fila3->n;
    $retorno['n4'] = $fila4->n;
    $retorno['n5'] = $fila5->n;
    $retorno['n6'] = $fila6->n;
    $retorno['n7'] = $fila7->n;
    $retorno['n8'] = $fila8->n;
    $retorno['n9'] = $fila9->n;
    $retorno['n10'] = $fila10->n;
    $retorno['n11'] = $fila11->n;

    $retorno['costo1'] = $fila1->costoN;
    $retorno['costo2'] = $fila2->costoN;
    $retorno['costo3'] = $fila3->costoN;
    $retorno['costo4'] = $fila4->costoN;
    $retorno['costo5'] = $fila5->costoN;
    $retorno['costo6'] = $fila6->costoN;
    $retorno['costo7'] = $fila7->costoN;
    $retorno['costo8'] = $fila8->costoN;
    $retorno['costo9'] = $fila9->costoN;
    $retorno['costo10'] = $fila10->costoN;
    $retorno['costo11'] = $fila11->costoN;

  	$conexionR = new \Conexion();
  	$sentenciaRepuesto = "SELECT repuesto FROM mantenimiento WHERE idEmpresa = $idEmpresa  AND repuesto <> ''";
  	
  	$conexionR->ejecutar($sentenciaRepuesto);
  	$contador=0;
  	while($fila = $conexionR->obtenerObjeto()){
  		$retorno['data'][$contador]['repuesto'] = $fila->repuesto;
  		$contador++;
  	}


    
}catch(Exception $e) {
    $retorno['exito']=0;
    $retorno['mensaje'] = $e->getMessage();
}
echo json_encode($retorno);
?>