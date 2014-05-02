<?php
require_once 'ManejadorBaseDeDatosInterface.php';
require_once 'Sql.php';

class MySQL implements ManejadorBaseDeDatosInterface
{
	const USUARIO = 'fundaci3_adsiar';
	const CLAVE = 'Jose-Daniel-Walder';
	const BASE = 'fundaci3_araucos';
	// const USUARIO = 'root';
	// const CLAVE = '';
	// const BASE = 'losaraucos';
	const SERVIDOR = 'localhost';
	private $_conexion;

	public function conectar()
	{
		$this->_conexion = mysql_connect( self::SERVIDOR, self::USUARIO, self::CLAVE );
		mysql_select_db( self::BASE, $this->_conexion );
	}
	public function desconectar()
	{
		mysql_close($this->_conexion);
	}
	public function traerDatos(Sql $sql)
	{
	   //echo $sql;
	   $todo = array();
	   $resultado = mysql_query($sql, $this->_conexion);
	   while ($fila = mysql_fetch_assoc($resultado)){
			$todo[] = $fila;
		}
		return $todo;
	}
    public function sentenciaDirecta($sentencia)
    {
        mysql_query($sentencia, $this->_conexion);
    }
}