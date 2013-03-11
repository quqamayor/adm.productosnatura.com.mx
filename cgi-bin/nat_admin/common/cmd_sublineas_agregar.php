<?

	$qry = "SELECT * FROM Lineas ORDER BY Nombre Asc";	
	$res = mysql_query($qry);
	$lista = mysql_num_rows($res);

if($_POST[Submit]=='Enviar') {

$lineas = $_POST['lineas'];
$nombre = $_POST['nombre'];
$desc = $_POST['desc'];
$status = $_POST['estatus'];
$fecha = date('Y-m-d');
$hora = date('H:m:s'); 

	$qry = "INSERT INTO Sublineas VALUES ('','$lineas','$nombre','$desc','$fecha','$hora','$status')";
//	print"$qry";
	$res = mysql_query($qry) or die("Error Interno... Por favor inténtalo de nuevo" . mysql_error() . $qry); ?>
	
	<script language ="javascript" type="text/javascript">
		self.location='index.php?cmd=sublineas';
		</script>
	<?		
}

require($cfg['path_templates'] . 'sublineas_agregar.html');
?>
