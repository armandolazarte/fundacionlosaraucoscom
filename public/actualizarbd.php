<?php
require_once 'packages/gateando/BaseDeDatos.php';
require_once 'packages/gateando/MySQL.php';
require_once 'packages/gateando/Sql.php';

ini_set('memory_limit', '512M');
set_time_limit(300);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
<title>Actualizar datos</title>
</head>

<body>
<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
  <label for="archivo">Datos</label>
  <input type="file" name="archivo" id="archivo" accesskey="a" tabindex="1" />
  <label for="tipo">Tipo</label>
  <input name="tipo" type="password" id="tipo" accesskey="t" size="5" />
  <label for="token"></label>
  <input type="password" name="token" id="token" />
<input name="enviar" type="submit" id="enviar" value="Enviar" />
</form>
<?php
if(!(isset($_REQUEST['token']) && $_REQUEST['token'] == "danielromeroauk")){
	echo '<div style="color:red;">Acceso denegado</div>';
	exit(0);
}
if(isset($_FILES['archivo'])){
	if ($_FILES['archivo']['size'] > 0){
		$nombretemp = $_FILES['archivo']['tmp_name'];
		$partes_path = pathinfo($_FILES['archivo']['name']);
		$nombrearchivo = htmlspecialchars($partes_path['filename']);
		$extensiones = array('htm', 'html', 'hta', 'htc', 'xhtml', 'shtm', 'shtml', 'stm', 'ssi', 'inc', 'js', 'json', 'xml', 'dtd', 'xsd', 'xsl', 'xslt', 'rss', 'rdf', 'lbi', 'dwt', 'css', 'asp', 'asa', 'aspx', 'ascx', 'asmx', 'cs', 'vb', 'config', 'master', 'cfm', 'cfml', 'cfc', 'as', 'asc', 'asr', 'txt', 'php', 'php3', 'php4', 'php5', 'tpl', 'php-dist', 'phtml', 'lasso', 'jsp', 'jst', 'jsf', 'tld', 'java', 'sql', 'asx', 'wml', 'edml', 'vbs', 'vtm', 'vtml');
		if (!in_array(strtolower($partes_path['extension']), $extensiones)) {
			$nombrearchivo .= ".";
		}
		$nombrearchivo .= $partes_path['extension'];
		if(move_uploaded_file($nombretemp, $nombrearchivo)){
			switch($_POST['tipo'])
			{
				case '1': /*Pagos*/
					if(!(actualizarPagos($nombrearchivo))){
						echo '<div style="color:red;">El nombre del archivo o la extension no es reconocido.</div>';
					}else{
						echo '<div style="color:green;">Pagos registrados</div>';
					}
					break;
				case '2': /*Estados*/
					if(!(actualizarEstados($nombrearchivo))){
						echo '<div style="color:red;">El nombre del archivo o la extension no es reconocido.</div>';
					}else{
						echo '<div style="color:green;">Estados registrados</div>';
					}
					break;
				default:
					echo '<div style="color:red;">El tipo de archivo no fue reconocido.</div>';
			}
			unlink($nombrearchivo);
		}
	}
}
function organizarFecha($fecha)
{
	$fech = preg_split('[/]', $fecha);
	return (0 + $fech[2])."-".(0 + $fech[1])."-".(0 + $fech[0]);
}
function actualizarUsuarios($id, $nombre)
{
	$bd = new BaseDeDatos(new MySQL());
	$sql = new Sql("usuarios");
	$sql->addCondicion("id='".$id."'");
	$existe = $bd->ejecutar($sql);
	if(empty($existe)){
		$bd->ejecutarSentenciaDirecta("insert into usuarios (id, nombre, clave) values ('".$id."', '".$nombre."', '".$id."')");
	}
	return $id;
}
function actualizarConceptos($concepto){
	$bd = new BaseDeDatos(new MySQL());
	$sql = new Sql("conceptos");
	$sql->addCondicion("nombre='".$concepto."'");
	$existe = $bd->ejecutar($sql);
	if(empty($existe)){
		$bd->ejecutarSentenciaDirecta("insert into conceptos (nombre) values ('".$concepto."')");
		$sql = new Sql("conceptos");
		$sql->addCondicion("nombre='".$concepto."'");
		$existe = $bd->ejecutar($sql);
	}
	return $existe[0]['id'];
}
function actualizarFormasPago($formapago){
	$bd = new BaseDeDatos(new MySQL());
	$sql = new Sql("formaspago");
	$sql->addCondicion("nombre='".$formapago."'");
	$existe = $bd->ejecutar($sql);
	if(empty($existe)){
		$bd->ejecutarSentenciaDirecta("insert into formaspago (nombre) values ('".$formapago."')");
		$sql = new Sql("formaspago");
		$sql->addCondicion("nombre='".$formapago."'");
		$existe = $bd->ejecutar($sql);
	}
	return $existe[0]['id'];
}
function actualizarPagos($file)
{
	if($file != "pagostxt"){
		return false;
	}
	$lineas = file($file);
	$bd = new BaseDeDatos(new MySQL());
	$bd->ejecutarSentenciaDirecta("delete from pagos");
	$bd->ejecutarSentenciaDirecta("alter table pagos AUTO_INCREMENT=0");
	foreach ($lineas as $num_linea => $linea) {
		if($num_linea === 0){
			continue;
		}
		$palabras = preg_split("[,]", htmlspecialchars($linea));
		/*echo"<pre>"; print_r($palabras); echo"</pre>";*/
		$usuario = actualizarUsuarios($palabras[0], $palabras[1]);
		if(count($palabras) < 5){
		  return false;
		  break;
		}
		$formapago = actualizarFormasPago($palabras[5]);
		$sentencia = "insert into pagos (usuario, valor, seguro, fecha_pago, forma_pago) values ('".$usuario."', '".$palabras[2]."', '".$palabras[3]."', '".organizarFecha($palabras[4])."', '".$formapago."')";
		$bd->ejecutarSentenciaDirecta($sentencia);
	}
	return true;
}
function actualizarEstados($file)
{
	if($file != "estadostxt"){
		return false;
	}
	$lineas = file($file);
	$bd = new BaseDeDatos(new MySQL());
	$bd->ejecutarSentenciaDirecta("delete from estados");
	$bd->ejecutarSentenciaDirecta("alter table estados AUTO_INCREMENT=0");
	foreach ($lineas as $num_linea => $linea) {
		if($num_linea == 1){
			continue;
		}
		$palabras = preg_split("[,]", htmlspecialchars($linea));
		/*echo"<pre>"; print_r($palabras); echo"</pre>";*/
		if(count($palabras) < 4 && $num_linea != 0){
		  return false;
		  break;
		}
		if($num_linea === 0){
			$bd = new BaseDeDatos(new MySQL());
			$bd->ejecutarSentenciaDirecta("update fechadecorte set fecha='".organizarFecha($palabras[1])."'");
			continue;
		}
		$usuario = actualizarUsuarios($palabras[0], $palabras[1]);
		$concepto = actualizarConceptos($palabras[2]);
		$sentencia = "insert into estados (usuario, concepto, vencido, novencido) values ('".$usuario."', '".$concepto."', '".$palabras[3]."', '".$palabras[4]."')";
		$bd->ejecutarSentenciaDirecta($sentencia);
	}
	return true;
}
?>
</body>
</html>