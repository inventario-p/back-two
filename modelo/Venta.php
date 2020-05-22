<?php
namespace modelo;
require_once('../entorno/Conexion.php');

class Venta
{
    public $conexion = null;
    private $condicion = null;
    private $whereAnd = null;

    private $id;
    private $idProducto;
    private $valor;
    private $fechaCreacion;

    public function __construct(\entidad\Venta $venta)
    {
        $this->id = $venta->getId();
        $this->idProducto = $venta->getIdProducto();
        $this->valor = $venta->getValor();
        $this->fechaCreacion = $venta->getFechaCreacion();

        $this->conexion = new \conexion();
    }

    public function adicionar()
    {
        $timestamp = date("Y-m-d H:i:s");
        $sentenciaSql = "
                        INSERT INTO 
                        mantenimientosprogramados 
                        (
                        idProducto,
                        valor,
                        fechaCreacion
                        VALUES (
                           $this->idProducto,
                            $this->valor,
                            '$timestamp'
                    )";
        $this->conexion->ejecutar($sentenciaSql);
    }

    public function modificar()
    {
        //aqui se debe de tener cuidado. sobre los datos que se van a ingresar. que tipop de datos son.
        $sentenciaSql = "
                        UPDATE mantenimientosprogramados
                            SET
                            idProducto = $this->idProducto,
                            valor = $this->valor
                        WHERE
                            id = $this->id
                        ";
        $this->conexion->ejecutar($sentenciaSql);
    }

    public function eliminar()
    {
        $sentenciaSql = "
                        DELETE FROM venta
                        WHERE
                            id = $this->id";

        $this->conexion->ejecutar($sentenciaSql);
    }

    public function consultar()
    {
        $this->obtenerCondicion();
        $sentenciaSql = "
                        SELECT 
                            *
                        FROM
                            venta
						$this->condicion
                        ";
        $this->conexion->ejecutar($sentenciaSql);
    }

    function obtenerCondicion()
    {
        $this->condicion = '';
        $this->whereAnd = ' WHERE ';

        if ($this->id != '' && $this->id != 'null') {
            $this->condicion = $this->condicion . $this->whereAnd . " id = $this->id";
            $this->whereAnd = ' AND ';
        }
        if ($this->idProducto != '' && $this->idProducto != 'null') {
            $this->condicion = $this->condicion . $this->whereAnd . " idProducto = $this->idProducto";
            $this->whereAnd = ' AND ';
        }
    }
}
