<?php 
namespace modelo;
require_once('../entorno/Conexion.php');

class Mantenimiento{
    //* Atributos *//
    public $conexion=null;
    private $condicion=null;
    private $whereAnd=null;

    private $id;
    private $idEquipo;
    private $idEmpresa;
    private $idEmpleado;
    private $tipoMnt;
    private $observaciones;
    private $costo;
    private $noReporte;
    //private $imagenMnt;
    private $pdfReporte;
    private $repuesto;
    private $fechaRealizacion;
    private $evaluacionIntervencion;

    ///
    /// atributos para trabajar en fechas
    ///filtro de datos

    private $minDate;
    private $maxDate;
        
    function __construct(\entidad\Mantenimiento $mantenimiento){
		$this->id = $mantenimiento->getId();
        $this->idEquipo = $mantenimiento->getIdEquipo();
        $this->idEmpresa = $mantenimiento->getIdEmpresa();
		$this->idEmpleado = $mantenimiento->getIdEmpleado();
		$this->tipoMnt = $mantenimiento->getTipoMnt();
		$this->observaciones = $mantenimiento->getObservaciones();
		$this->costo = $mantenimiento->getCosto();
        $this->noReporte = $mantenimiento->getNoReporte();
        $this->imagenMnt = $mantenimiento->getimagenMnt();
        $this->pdfReporte = $mantenimiento->getPdfReporte();
        $this->repuesto = $mantenimiento->getRepuesto();
        $this->fechaRealizacion = $mantenimiento->getFechaRealizacion();
        $this->minDate = $mantenimiento->getMinDate();
        $this->maxDate = $mantenimiento->getMaxDate();
        $this->evaluacionIntervencion = $mantenimiento->getEvaluacionIntervencion();


        $this->conexion = new \Conexion();
	}
    public function adicionar(){
        $sentencia = "
                    INSERT INTO 
                        mantenimiento 
                        (                            
                            idEquipo,
                            idEmpresa,
                            idEmpleado,
                            tipoMnt,
                            observaciones,
                            costo,
                            noReporte,
                            pdfReporte,
                            repuesto,
                            fechaRealizacion,
                            evaluacionIntervencion
                        )
                        VALUES
                        (
                            $this->idEquipo,
                            $this->idEmpresa,
                            $this->idEmpleado,
                            '$this->tipoMnt',
                            '$this->observaciones',
                            $this->costo,
                            $this->noReporte,
                            '$this->pdfReporte',
                            '$this->repuesto',
                            '$this->fechaRealizacion',
                            '$this->evaluacionIntervencion'
                        )
                    ";
        $this->conexion->ejecutar($sentencia);
    }
    public function modificar(){
        $sentencia ="                                        
                    UPDATE
                        mantenimiento
                    SET
                        idEquipo = $this->idEquipo,
                        idEmpresa = $this->idEmpresa,
                        idEmpleado = $this->idEmpleado,
                        tipoMnt = '$this->tipoMnt',
                        observaciones = '$this->observaciones',
                        costo = $this->costo,
                        noReporte = $this->noReporte,
                        pdfReporte = '$this->pdfReporte',
                        repuesto = '$this->repuesto',
                        fechaRealizacion = '$this->fechaRealizacion',
                        evaluacionIntervencion = '$this->evaluacionIntervencion'
                    WHERE
                        id = $this->id
                    ";
        $this->conexion->ejecutar($sentencia);
    }
    public function eliminar(){
        // se eliminan los mantenimientos asociados al equipo, cuando se ejecuta la consulta sql.
        $sentenciaSql = "
                DELETE
                FROM
                    mantenimiento 
                Where id = $this->id";

        $this->conexion->ejecutar($sentenciaSql);
    }

    public function consultar(){
        $this->obtenerCondicion();
        $sentencia ="
                    SELECT
                        m.*,
                        emr.nombreEmpresa,
                        eml.idPersona,
                        p.nombre AS nombrePersona,
                        p.apellido AS apellidoPersona,
                        eq.noEstacion AS noEstacion
                    FROM 
                        mantenimiento AS m
                    INNER JOIN empresa AS emr ON emr.id=m.idEmpresa
                    INNER JOIN empleado AS eml ON eml.id=m.idEmpleado
                    INNER JOIN persona AS p ON p.id = eml.idPersona
                    INNER JOIN equipo AS eq ON eq.id=m.idEquipo
                    $this->condicion
                    ORDER BY m.noReporte ASC
                    ";
        $this->conexion->ejecutar($sentencia);
    }

    public function obtenerCondicion(){
        $this->condicion = "";
        $this->whereAnd = " WHERE ";

        if($this->id !='' && $this->id !='null'){
            $this->condicion = $this->condicion.$this->whereAnd." m.id = $this->id";
            $this->whereAnd = ' AND ';
        }
        if($this->idEquipo !='' && $this->idEquipo !='null'){
            $this->condicion = $this->condicion.$this->whereAnd." m.idEquipo = $this->idEquipo";
            $this->whereAnd = ' AND ';
        }
        if($this->idEmpresa !='' && $this->idEmpresa !='null'){
            $this->condicion = $this->condicion.$this->whereAnd." m.idEmpresa = $this->idEmpresa";
            $this->whereAnd = ' AND ';
        }
        if($this->tipoMnt !='' && $this->tipoMnt !='null'){
            $this->condicion = $this->condicion.$this->whereAnd." m.tipoMnt = '$this->tipoMnt'";
            $this->whereAnd = ' AND ';
        }

        ///consulta para registros en un entre minDate y maxDate
        if($this->minDate !='' && $this->minDate !='null' && $this->maxDate !='' && $this->maxDate !='null'){
            $this->condicion = $this->condicion.$this->whereAnd." m.fechaRealizacion BETWEEN '{$this->minDate}' AND '{$this->maxDate}'";
            $this->whereAnd = ' AND ';
        }

    }
}


