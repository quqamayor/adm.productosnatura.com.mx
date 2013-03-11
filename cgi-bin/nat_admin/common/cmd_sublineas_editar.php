
<?

	$qryl = "SELECT * FROM Lineas ORDER BY Nombre Asc";	
	$resl = mysql_query($qryl);
	$lista = mysql_num_rows($resl);		

	$qry = "SELECT * FROM Sublineas WHERE ID_sublineas='$_GET[id]'";
	$res = mysql_query($qry);
	$datos = mysql_fetch_array($res);
	
	if($datos[6]=='Activo') $act="selected"; else $act="";
	if($datos[6]=='Inactivo') $inact="selected"; else $inact="";
	
    
if($_POST[Submit]=='Enviar') {

$lineas = $_POST['lineas'];
$nombre = $_POST['nombre'];
$desc = $_POST['desc'];
$status = $_POST['estatus'];
$fecha = date('Y-m-d');
$hora = date('H:m:s'); 

	$qry = "UPDATE Sublineas set ID_lineas='$lineas', Nombre='$nombre',Descripcion='$desc',Fecha='$fecha', Hora='$hora', 			                                 Status='$status' WHERE ID_sublineas=$_POST[id]";
//	print"$qry";
	$res = mysql_query($qry) or die("Error Interno... Por favor inténtalo de nuevo" . mysql_error() . $qry); ?>
	
	<script language ="javascript" type="text/javascript">
		self.location='index.php?cmd=sublineas';
		</script> 
	<?		
}

require($cfg['path_templates'] . 'sublineas_editar.html');
?>
