<?php

namespace entidad;

class MantenimientosProgramados
{
    private $id;
    private $idEmpresa;
    private $fechaInicio;
    private $fechaFin;
    private $observaciones;
    private $fechaCreación;
    private $estado;
    private $mantenimientosPreventivos;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresa()
    {
        return $this->idEmpresa;
    }

    /**
     * @param mixed $idEmpresa
     */
    public function setIdEmpresa($idEmpresa)
    {
        $this->idEmpresa = $idEmpresa;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * @param mixed $fechaInicio
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }

    /**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * @param mixed $fechaFin
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param mixed $observaciones
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }

    /**
     * @return mixed
     */
    public function getFechaCreación()
    {
        return $this->fechaCreación;
    }

    /**
     * @param mixed $fechaCreación
     */
    public function setFechaCreación($fechaCreación)
    {
        $this->fechaCreación = $fechaCreación;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getMantenimientosPreventivos()
    {
        return $this->mantenimientosPreventivos;
    }

    /**
     * @param mixed $mantenimientosPreventivos
     */
    public function setMantenimientosPreventivos($mantenimientosPreventivos)
    {
        $this->mantenimientosPreventivos = $mantenimientosPreventivos;
    }

}