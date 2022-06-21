<?PHP
date_default_timezone_set("America/Argentina/Buenos_Aires");
class conectarBD{
	//Propiedades de la clase
	var $Servidor;
	var $BaseDatos;
	var $Usuario;
	var $Pass;
	var $ConexId;
	var $ConsultaId;
	var $Error_;
	public $Total_reg;
	var $t_servidor;
	function conectarBD () {
		$this->Servidor = 'localhost';
		$this->BaseDatos = 'enpatagonia';
		$this->Usuario ='root' ;
		$this->Pass = '';
		$this->t_servidor=0;
		$this->Total_reg=0;
	}
	
	function conectar() {
		$this->ConexId = mysqli_connect($this->Servidor, $this->Usuario, $this->Pass, $this->BaseDatos);
		if (!$this->ConexId) {
			$this->Error_ = "Fallo al intentar conectar";
			exit ;
		}
		mysqli_autocommit($this->ConexId, TRUE);
		return $this->ConexId;
	}
	
	function ConsultaSelect ($sql = "") {
		$this->ConexId = $this->conectar() or die('Fallo al intentar conectarse a la Base');
		if ($sql == "") {
			$this->Error_ = "Debe especificar una sentencia sql";
			return 0;
		}
		
		$this->ConsultaId = mysqli_query($this->ConexId, $sql) or die(" Error (01)".mysqli_errno($this->ConexId).": ".mysqli_error($this->ConexId)."<BR>");
		if (!$this->ConsultaId) {
			$this->Error_ = "Error(11111) ".mysqli_Error_($this->ConexId);
			return 0;
		}
		$this->Total_reg = mysqli_num_rows($this->ConsultaId);
		mysqli_close($this->ConexId);
		return $this->ConsultaId;
	}
	

	function Ejecutarsql($ssql) {
		$this->ConexId = $this->conectar() or die('Fallo al intentar conectarse a la Base');
		$idquery = mysqli_query($this->ConexId,$ssql);
		if (!$idquery ) {
		    die('Query invalido: ' . mysqli_error($this->ConexId));
		}
		return $idquery;
	}

	public function getInsertedId() {
		$id = mysqli_insert_id($this->ConexId);
		return $id;
	}

	public function affectedRows() {
		$rows = 0;
		$rows = mysqli_affected_rows($this->ConexId);
		return($rows);
	}

}


?>
