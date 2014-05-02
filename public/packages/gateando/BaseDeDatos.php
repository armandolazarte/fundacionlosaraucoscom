<?php 
require_once 'ManejadorBaseDeDatosInterface.php'; 
require_once 'Sql.php'; 

class BaseDeDatos 
{ 
	private $_manejador; 
	
	public function __construct(ManejadorBaseDeDatosInterface $manejador) 
	{ 
		$this->_manejador = $manejador; 
	} 
	
	public function ejecutar(Sql $sql) 
	{ 
		$this->_manejador->conectar(); 
		$datos = $this->_manejador->traerDatos($sql); 
		$this->_manejador->desconectar(); 
		return $datos; 
	}
    
    public function ejecutarSentenciaDirecta($sentencia)
    {
        $this->_manejador->conectar(); 
		$this->_manejador->sentenciaDirecta($sentencia); 
		$this->_manejador->desconectar(); 
    }
}