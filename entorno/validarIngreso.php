<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/tmp'));
ini_set('session.gc_probability', 1);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST');

session_start();
require_once('Conexion.php');

date_default_timezone_set('America/Bogota');
$conexion = new \Conexion();
$retorno = array();
$_SESSION['autenticado'] = 0;

$usuario = $_REQUEST['Usuario'];
$contrasena = $_REQUEST['Contrasena'];
$fechaActual = date("Y-m-d");
$mensaje = 'Usuario y/o contraseña inválida';

//llamo el procedimiento almacenado que me consulta el usuario

$sentenciaSql = "
                SELECT * FROM `usuario` WHERE usuario = '$usuario'
                ";
$conexion->ejecutar($sentenciaSql);


//Valido si el usuario está correcto
if($conexion->obtenerNumeroRegistros() == 1){
    $fila = $conexion->obtenerObjeto();

    //Valido si la contraseña está correcta
    if($fila->contrasena == $contrasena){
        //Valido si el usuario está activo
            $_SESSION['autenticado'] = 1;
            $_SESSION['nombre'] = $fila->nombre;
            $_SESSION['identificacion'] = $fila->identificacion;
            $_SESSION['mail'] = $fila->mail;
            $_SESSION['usuario'] = $fila->usuario;
            $retorno['exito'] = 1;
            $retorno['mensaje'] = "Usuario Autenticado";

    }else{
        $retorno['exito'] = 0;
        $retorno['mensaje'] = $mensaje;
        //echo "contrasena incorrecta = ".$fila->contrasena;
    }
}else{
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $mensaje;
}
echo json_encode($retorno);
?>