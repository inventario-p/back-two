<?php 
require_once ('configuracion.php');

class Conexion {
    
    private $conn = null;
    private $recordSet=null;

    //Se ejecuta tan pronto se invoque la clase
    function __construct() {
        $this->conn = new PDO('mysql:host='.SERVER_NAME.';port='.PORT.';dbname='.DATABASE.';charset=utf8', USER, PASSWORD);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    

    //Se ejecutan cuando se invoquen.
    public function ejecutar($sentenciaSql) {
        $this->recordSet = $this->conn->query($sentenciaSql);
        if ($this->recordSet == false)
            throw new Exception('Error ejecutando la consulta. '.$this->conn->error,E_USER_ERROR);
    }
    
    public function obtenerObjeto() {
        return $this->recordSet->fetch(PDO::FETCH_OBJ);
    }

    public function obtenerObjetoAll() {
        return $this->recordSet->fetchall();
    }
    
    public function obtenerNumeroRegistros() {
        return $this->recordSet->rowCount();
    }
    
    function __destruct() {
        if ($this->recordSet)
            $this->recordSet = null;
        
        if ($this->conn)
            $this->conn = null;
    }
    
    public function obtenerNuevoPhp(){
		$nuevoPhp = "<?php ?>";
		return $nuevoPhp;
	}
	public function obtenerJsYCss(){
		$nuevo = "	";
		return $nuevo;
	}
}

?>

