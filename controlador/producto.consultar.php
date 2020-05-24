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

    $retorno['numeroRegitros'] = $mProducto->conexion->obtenerNumeroRegistros();
    $contador=0;
    while($fila = $mProducto->conexion->obtenerObjeto()){
        $retorno['data'][$contador]['id'] = $fila->id;
        $retorno['data'][$contador]['nombre'] = $fila->nombre;
        $retorno['data'][$contador]['referencia'] = $fila->referencia;
        $retorno['data'][$contador]['precio'] = $fila->precio;
        $retorno['data'][$contador]['peso'] = $fila->peso;
        $retorno['data'][$contador]['categoria'] = $fila->categoria;
        $retorno['data'][$contador]['stock'] = $fila->stock;
        $retorno['data'][$contador]['fechaCreacion'] = $fila->fechaCreacion;

        $contador++;
    }

}catch(Exception $e) {
    $retorno['exito'] = 0;
    $retorno['mensaje'] = $e->getMessage();
}
echo json_encode($retorno);
?>