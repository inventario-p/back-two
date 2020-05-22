<?php

require_once ('../entidad/Producto.php');
require_once ('../modelo/Producto.php');
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

    $eProducto = new \entidad\Producto();
    $eProducto->setNombre($nombre);
    $eProducto->setReferencia($referencia);
    $eProducto->setPrecio($precio);
    $eProducto->setPeso($peso);
    $eProducto->setCategoria($categoria);
    $eProducto->setStock($stock);

    $mProducto = new \modelo\Producto($eProducto);
    $mProducto->adicionar();
    
}catch(Exception $e) {
    $retorno['exito']=0;
    $retorno['mensaje'] = $e->getMessage();
}
echo json_encode($retorno);
?>
