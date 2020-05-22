<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/tmp'));
ini_set('session.gc_probability', 1);
session_start();
$retorno = array();

if (@$_SESSION['autenticado'] != 1) {
    $retorno['autenticado'] = 0;
    //exit();
}
if(isset($_SESSION['idUsuario'])){
    $retorno['idUsuario'] = $_SESSION['idUsuario'];
    $retorno['idRol'] = $_SESSION['idRol'];
    $retorno['idEmpresa'] = $_SESSION['idEmpresa'];
    $retorno['usuario'] = $_SESSION['usuario'];
    $retorno['nombre'] = $_SESSION['nombre'];
    $retorno['apellido'] = $_SESSION['apellido'];
    $retorno['correo'] = $_SESSION['correo'];
    $retorno['imagen'] = $_SESSION['imagen'];
    $retorno['nombreEmpresa'] = $_SESSION['nombreEmpresa'];
}
echo json_encode($retorno);
?>