<?
	$qry = "SELECT * FROM Ciclos ORDER BY Nombre Asc";	
	$res = mysql_query($qry);
	$lista = mysql_num_rows($res);

if($_POST[Submit]=='Enviar') {

$nombre = $_POST['nombre'];
$fecha_de = "$_POST[anio_ini]-$_POST[mes_ini]-$_POST[dia_ini]";
$fecha_hasta = "$_POST[anio_al]-$_POST[mes_al]-$_POST[dia_al]";
$fecha = date('Y-m-d');
$hora = date('H:m:s'); 
$status = $_POST['estatus'];

	$qry = "INSERT INTO Ciclos VALUES ('','$nombre','$fecha_de','$fecha_hasta','$fecha','$hora','$status')";

//	print"$qry";
	$res = mysql_query($qry) or die("Error Interno... Por favor inténtalo de nuevo" . mysql_error() . $qry); ?>
	
	<script language ="javascript" type="text/javascript">
		self.location='index.php?cmd=ciclos';
		</script>
	<?		
}

require($cfg['path_templates'] . 'ciclos_agregar.html');
?>
