<?php 
namespace modelo;
require_once('../entorno/Conexion.php');

class Producto
{
    private $id;
    private $nombre;
    private $referencia;
    private $precio;
    private $peso;
    private $categoria;
    private $stock;
    private $fechaCreacion;
    private $fechaUltimaVenta;

    function __construct(\entidad\Producto $producto)
    {
        $this->id = $producto->getId();
        $this->nombre = $producto->getNombre();
        $this->referencia = $producto->getReferencia();
        $this->precio = $producto->getPrecio();
        $this->peso = $producto->getPeso();
        $this->categoria = $producto->getCategoria();
        $this->stock = $producto->getStock();
        $this->fechaCreacion = $producto->getFechaCreacion();
        $this->fechaUltimaVenta = $producto->getFechaUltimaVenta();

        $this->conexion = new \Conexion();
    }

    public function adicionar()
    {
        $sentencia = "
                    INSERT INTO 
                        producto 
                        (                            
                            nombre,
                            referencia,
                            precio,
                            peso,
                            categoria,
                            stock
                        )
                        VALUES
                        (
                            '$this->nombre',
                            '$this->referencia',
                            $this->precio,
                            $this->peso,
                            '$this->categoria',
                            $this->stock
                        )
                    ";
        $this->conexion->ejecutar($sentencia);
    }

    public function modificar()
    {
        $sentencia = "                                        
                    UPDATE
                        producto
                    SET
                        nombre = $this->nombre,
                        referencia = $this->referencia,
                        precio = $this->precio,
                        peso = '$this->peso',
                        categoria = '$this->categoria',
                        stock = $this->stock,
                    WHERE
                        id = $this->id
                    ";
        $this->conexion->ejecutar($sentencia);
    }

    public function eliminar()
    {
        $sentenciaSql = "
                DELETE
                FROM
                    producto 
                Where id = '$this->id'";

        $this->conexion->ejecutar($sentenciaSql);
    }

    public function consultar()
    {
        $this->obtenerCondicion();
        $sentencia = "
                    SELECT
                        *
                    FROM 
                        producto
                    $this->condicion
                    ";
        $this->conexion->ejecutar($sentencia);
    }

    public function obtenerCondicion()
    {
        $this->condicion = "";
        $this->whereAnd = " WHERE ";

        if ($this->id != '' && $this->id != 'null') {
            $this->condicion = $this->condicion . $this->whereAnd . " id = $this->id";
            $this->whereAnd = ' AND ';
        }
        if ($this->referencia != '' && $this->referencia != 'null') {
            $this->condicion = $this->condicion . $this->whereAnd . " referencia = $this->referencia";
            $this->whereAnd = ' AND ';
        }
        if ($this->stock != '' && $this->stock != 'null') {
            $this->condicion = $this->condicion . $this->whereAnd . " stock = $this->stock";
            $this->whereAnd = ' AND ';
        }

    }
}


