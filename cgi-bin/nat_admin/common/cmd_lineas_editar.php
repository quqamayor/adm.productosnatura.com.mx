
<?
	$qry = "SELECT * FROM Lineas WHERE ID_lineas='$_GET[id]'";
	$res = mysql_query($qry);
	$datos = mysql_fetch_array($res);
	
	if($datos[5]=='Activo') $act="selected"; else $act="";
	if($datos[5]=='Inactivo') $inact="selected"; else $inact="";	

if($_POST[Submit]=='Enviar') {

$nombre = $_POST['nombre'];
$desc = $_POST['desc'];
$status = $_POST['estatus'];
$fecha = date('Y-m-d');
$hora = date('H:m:s'); 

	$qry = "UPDATE Lineas set Nombre='$nombre',Descripcion='$desc',Fecha='$fecha',Hora='$hora',Status='$status' WHERE ID_lineas=$_POST[id]";
//	print"$qry";
	$res = mysql_query($qry) or die("Error Interno... Por favor inténtalo de nuevo" . mysql_error() . $qry); ?>
	
	<script language ="javascript" type="text/javascript">
		self.location='index.php?cmd=lineas';
		</script> 
	<?		
}

require($cfg['path_templates'] . 'lineas_editar.html');
?>
