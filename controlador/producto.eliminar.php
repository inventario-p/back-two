<?php
require_once ('../entidad/Producto.php');
require_once ('../modelo/Producto.php');

$retorno = array ('exito'=>1,'mensaje'=> 'La información se eliminó correctamente');

try{
    $conexion = new \Conexion();
    $id = $_REQUEST['id'];

    $eProducto = new \entidad\Producto();
    $eProducto->setId($id);

    $mProducto = new \modelo\Producto($eProducto);
    $mProducto->eliminar();
    
}catch(Exception $e) {
    $retorno['exito']=0;
    $retorno['mensaje'] = $e->getMessage();
}
echo json_encode($retorno);
?>
