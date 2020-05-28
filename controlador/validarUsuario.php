<?php
require_once '../entorno/Conexion.php';
header("Access-Control-Allow-Origin: *");

$retorno = array("exito"=>1, "existe"=>0);

$conexion = new Conexion();

$usuario = $_POST['usuasrio'];
$sentenciaSql = "
                    SELECT
                        usuario
                    FROM
                        usuario
                    WHERE
                        usuario = '$usuario'
                ";
$conexion->ejecutar($sentenciaSql);
if($conexion->obtenerNumeroRegistros() == 1){
    $retorno["existe"] = 1;
}else{
    $retorno["existe"] = 0;
}
echo json_encode($retorno)
?>
