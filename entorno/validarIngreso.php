<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/tmp'));
ini_set('session.gc_probability', 1);
session_start();
require_once('Conexion.php');
//Establezco la zona horaria por defecto para todas las funciones de fecha y hora utilizadas en el script
date_default_timezone_set('America/Bogota');
$conexion = new \Conexion();
$retorno = array();
$_SESSION['autenticado'] = 0;


$usuario = $_POST['Usuario'];
//$contrasena = md5($_POST['Contrasena']);
$contrasena = $_POST['Contrasena'];
//Obtengo la fecha actual
$fechaActual = date("Y-m-d");

//llamo el procedimiento almacenado que me consulta el usuario
///se modifica el nombre del store procedure anadiendo una a pueto que no fue posible modificarlo.

$sentenciaSql = "
                CALL SpConsultarUsuario('$usuario')
                ";
$conexion->ejecutar($sentenciaSql);


//Valido si el usuario está correcto
if($conexion->obtenerNumeroRegistros() == 1){
    $fila = $conexion->obtenerObjeto();

    //Valido si la contraseña está correcta
    if($fila->contrasena == $contrasena){
        //Valido si el usuario está activo
            $_SESSION['autenticado'] = 1;
            $_SESSION['idUsuario'] = $fila->id;
            $_SESSION['idRol'] = $fila->idRol;
            $_SESSION['idEmpresa'] = $fila->idEmpresa;
            $_SESSION['usuario'] = $fila->usuario;
            $_SESSION['nombre'] = $fila->nombre;
            $_SESSION['apellido'] = $fila->apellido;
            $_SESSION['correo'] = $fila->correo;
            $_SESSION['imagen'] = $fila->imagen;
            $_SESSION['nombreEmpresa'] = $fila->nombreEmpresa;
            $retorno['idRol'] = $fila->idRol;
            $retorno['exito'] = 1;
    }else{
        $retorno['exito'] = 0;
        $retorno['mensaje'] = 'Usuario y/o contraseña inválida';
        //mensajes para probar
        echo "contrasena incorrecta";
    }
}else{
    $retorno['exito'] = 0;
    $retorno['mensaje'] = 'Usuario y/o contraseña inválida.';
    //mensajes para prueba
    //echo "no se encontrò el usuario";
}
echo json_encode($retorno);
?>