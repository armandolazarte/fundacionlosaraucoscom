<?php
/**
 * @author Jairo Alberto Prieto Londoño & Daniel Guillermo Romero Gelvez
 * @copyright 2011 Mayo 29
 */

class Sql 
{
	private $_campos=array();
	private $_from;
	private $_where;
	private $_group;
	private $_having;
	private $_order;
	private $_limit;
    
	function __construct($from)
    {
		$this->_from = $from;
	}
	function addCampo($c)
    {
		foreach(func_get_args() as $campo){
			$this->_campos[]=$campo;
		}
	}
	function delCampo($c)
    {
		foreach(func_get_args() as $campo){
			if (is_int($campo)){
				unset($this->_campos[$campo]);
			}else{
				$clave = array_search($campo, $this->_campos);
				if ($clave!==false){
					unset($this->_campos[$clave]);
				}
			}
		}
	}
	function setFrom($from)
    {
		$this->_from = $from;
	}
	function addCondicion($condicion)
    {
		if (!empty($this->_where)) $this->_where .= " and ";
		$this->_where .= $condicion;
	}
	function limpiarCondicion()
    {
		$this->_where = "";
	}
	function addGrupo($grupo)
    {
		if (!empty($this->_group)) $this->_group .= ", ";
		$this->_group .= $grupo;
	}
	function limpiarGrupos()
    {
		$this->_group = "";
	}
	function addHaving($have)
    {
		if (!empty($this->_having)) $this->_having .= " and ";
		$this->_having .= $have;
	}
	function limpiarHaving()
    {
		$this->_having = "";
	}
	function addOrden($orden)
    {
		if (!empty($this->_order)) $this->_order .= ", ";
		$this->_order .= $orden;
	}
	function limpiarOrden()
    {
		$this->_order = "";
	}
	function setLimite($arg1, $arg2=null)
    {
		$l = "";
		if (!is_null($arg2)) $l = ", " . $arg2;
		$l = $arg1 . $l;
		$this->_limit = $l;
	}
	function limpiarLimite()
    {
		$this->_limit = "";
	}
	
	function __toString()
    {
		$t = "Select " . $this->unionCampos();
		$t .= "\nFrom ". $this->_from;
		$t .= (empty($this->_where)) ? "" : "\nWhere " . $this->_where;
		$t .= (empty($this->_group)) ? "" : "\nGroup by " . $this->_group;
		$t .= (empty($this->_having)) ? "" : "\nHaving " . $this->_having;
		$t .= (empty($this->_order)) ? "" : "\nOrder by " . $this->_order;
		$t .= (empty($this->_limit)) ? "" : "\nLimit " . $this->_limit;
		return $t;
	}
	private function unionCampos()
    {
		$c="";
		if (count($this->_campos)>0)
        {
			$c = implode(", ", $this->_campos);
		} else{
			$c = "*";
		}
		return $c;
	}
}

