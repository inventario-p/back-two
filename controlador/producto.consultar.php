<?php
require_once ('../entidad/Producto.php');
require_once ('../modelo/Producto.php');

// $retorno = array ('exito'=>1,'mensaje'=> '', 'data'=>null, 'numeroRegitros'=>0);
$retorno = array ();

try{
    $id = $_REQUEST['id'];
    $nombre = $_REQUEST['nombre'];
    $referencia = $_REQUEST['referencia'];
    $precio = $_REQUEST['precio'];
    $peso = $_REQUEST['peso'];
    $categoria = $_REQUEST['categoria'];
    $stock = $_REQUEST['stock'];

    $eProducto = new \entidad\Producto();
    $eProducto->setId($id);
    $eProducto->setNombre($nombre);
    $eProducto->setReferencia($referencia);
    $eProducto->setPrecio($precio);
    $eProducto->setPeso($peso);
    $eProducto->setCategoria($categoria);
    $eProducto->setStock($stock);

    $mProducto = new \modelo\Producto($eProducto);
    $mProducto->consultar();

//    $retorno['numeroRegitros'] = $mProducto->conexion->obtenerNumeroRegistros();
    $contador=0;
    while($fila = $mProducto->conexion->obtenerObjeto()){
        $retorno[$contador]['id'] = $fila->id;
        $retorno[$contador]['nombre'] = $fila->nombre;
        $retorno[$contador]['referencia'] = $fila->referencia;
        $retorno[$contador]['precio'] = $fila->precio;
        $retorno[$contador]['peso'] = $fila->peso;
        $retorno[$contador]['categoria'] = $fila->categoria;
        $retorno[$contador]['stock'] = $fila->stock;
        $retorno[$contador]['fechaCreacion'] = $fila->fechaCreacion;

        $contador++;
    }

}catch(Exception $e) {
//    $retorno['exito'] = 0;
//    $retorno['mensaje'] = $e->getMessage();
}
echo json_encode($retorno);
?>