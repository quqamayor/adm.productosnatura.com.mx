<?

if($_POST[Submit]=='Enviar') {

$nombre = $_POST['nombre'];
$desc = $_POST['desc'];
$status = $_POST['estatus'];
$fecha = date('Y-m-d');
$hora = date('H:m:s'); 

	$qry = "INSERT INTO Lineas VALUES ('','$nombre','$desc','$fecha','$hora','$status')";
	//print"$qry";
	$res = mysql_query($qry) or die("Error Interno... Por favor inténtalo de nuevo" . mysql_error() . $qry); ?>
	
	<script language ="javascript" type="text/javascript">
		self.location='index.php?cmd=lineas';
		</script>
	<?		
}

require($cfg['path_templates'] . 'lineas_agregar.html');	

?>
