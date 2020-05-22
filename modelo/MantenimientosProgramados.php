<?php
namespace modelo;
require_once('../entorno/Conexion.php');

class MantenimientosProgramados
{
    public $conexion = null;
    private $condicion = null;
    private $whereAnd = null;

    private $id;
    private $idEmpresa;
    private $fechaInicio;
    private $fechaFin;
    private $observaciones;
    private $estado;
    private $mantenimientosPreventivos;

    public function __construct(\entidad\MantenimientosProgramados $mantenimientosProgramados)
    {
        $this->id = $mantenimientosProgramados->getId();
        $this->idEmpresa = $mantenimientosProgramados->getIdEmpresa();
        $this->fechaInicio = $mantenimientosProgramados->getFechaInicio();
        $this->fechaFin = $mantenimientosProgramados->getFechaFin();
        $this->observaciones = $mantenimientosProgramados->getObservaciones();
        $this->estado = $mantenimientosProgramados->getEstado();
        $this->mantenimientosPreventivos = $mantenimientosProgramados->getMantenimientosPreventivos();

        $this->conexion = new \conexion();
    }

    public function adicionar(){
        $sentenciaSql = "
                        INSERT INTO 
                        mantenimientosprogramados 
                        (
                        idEmpresa,
                        fechaInicio,
                        fechaFin,
                        observaciones,
                        estado,
                        mantenimientosPreventivos)
                        VALUES (
                            $this->idEmpresa,
                            '$this->fechaInicio',
                            '$this->fechaFin',
                            '$this->observaciones',
                            '$this->estado',
                            $this->mantenimientosPreventivos
                    )";
        $this->conexion->ejecutar($sentenciaSql);
    }
    public function modificar() {
        //aqui se debe de tener cuidado. sobre los datos que se van a ingresar. que tipop de datos son.
        $sentenciaSql = "
                        UPDATE mantenimientosprogramados
                            SET
                            idEmpresa = $this->idEmpresa,
                            fechaInicio = '$this->fechaInicio',
                            fechaFin = '$this->fechaFin',
                            observaciones = '$this->observaciones',
                            estado = '$this->estado',
                            mantenimientosPreventivos = $this->mantenimientosPreventivos
                        WHERE
                            id = $this->id
                        ";
        $this->conexion->ejecutar($sentenciaSql);
    }
    public function eliminar(){
        $sentenciaSql = "
                        DELETE FROM mantenimientosprogramados
                        WHERE
                            id = $this->id";

        $this->conexion->ejecutar($sentenciaSql);
    }
    public function consultar() {
        $this->obtenerCondicion();
        //si la consulta que estoy haciendo no me funciona
        //entonces depuro manualmente. como? hago impresiones. de lo quehago.
        $sentenciaSql = "
                        SELECT 
                            m.*, 
                            e.nombreEmpresa as nombreEmpresa
                        FROM
                            mantenimientosprogramados as m
                        INNER JOIN empresa e ON m.idEmpresa = e.id
						$this->condicion
                        ";
        $this->conexion->ejecutar($sentenciaSql);
    }

    function obtenerCondicion(){
        $this->condicion = '';
        $this->whereAnd = ' WHERE ';

        if($this->idEmpresa != '' && $this->idEmpresa != 'null'){
            $this->condicion = $this->condicion.$this->whereAnd." m.idEmpresa = $this->idEmpresa";
            $this->whereAnd = ' AND ';
        }
        if($this->id != '' && $this->id != 'null'){
            $this->condicion = $this->condicion.$this->whereAnd." m.id = $this->id";
            $this->whereAnd = ' AND ';
        }
        if($this->estado != '' && $this->estado != 'null'){
            $this->condicion = $this->condicion.$this->whereAnd." m.estado = $this->estado";
            $this->whereAnd = ' AND ';
        }

        ///Para asegurar que la empresa de la cual se consulta con inner join esta activa
        ///
        //$this->condicion = $this->condicion.$this->whereAnd." e.estado = 1";
    }

}