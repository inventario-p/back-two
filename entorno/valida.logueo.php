<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/tmp'));
ini_set('session.gc_probability', 1);
header("Access-Control-Allow-Origin: *");

session_start();
$retorno = array();

if (@$_SESSION['autenticado'] != 1) {
    $retorno['autenticado'] = 0;
    //exit();
}
if(isset($_SESSION['idUsuario'])){
    $retorno['idUsuario'] = $_SESSION['idUsuario'];
    $retorno['nombre'] = $_SESSION['nombre'];
    $retorno['identificacion'] = $_SESSION['identificacion'];
    $retorno['mail'] = $_SESSION['mail'];
    $retorno['usuario'] = $_SESSION['usuario'];
}
echo json_encode($retorno);
?>