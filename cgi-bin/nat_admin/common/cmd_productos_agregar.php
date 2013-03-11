<?

	$qrySub = "SELECT ID_sublineas,Nombre,ID_lineas FROM Sublineas ORDER BY ID_lineas ASC";
	$resSub = mysql_query($qrySub);
	$listaSub = mysql_num_rows($resSub);
	
if($_POST[Submit] == "Enviar"){
	$sublinea = $_POST['sub'];
	$nombre = $_POST['nombre'];
	$desc = $_POST['desc'];
	$asin = $_POST['asin'];
	$asinR = $_POST['asinR'];
	$size = $_POST['size'];
	$medida = $_POST['medida'];
	$url = $_POST['url'];
	$keyword = $_POST['key'];
	$status = $_POST['estatus'];
	$fecha = date('Y-m-d');
	$hora = date('H:m:s');
	
	$qry = "INSERT INTO Productos VALUES('','$sublinea','$nombre','$desc','$asin','$asinR','$size','$medida',
			'$url','$keyword','$fecha','$hora','$status')";
	//print"$qry";
	$res = mysql_query($qry) or die("Error Interno... Por favor inténtalo de nuevo" . mysql_error() . $qry);?>
	
	<script language="JavaScript" type="text/javascript">
		self.location='index.php?cmd=productos';
	</script>
	
<? 
}
		
	
require($cfg['path_templates'] . 'productos_agregar.html');
?>
