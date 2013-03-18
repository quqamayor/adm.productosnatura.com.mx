<?

	$qry = "SELECT * FROM Productos WHERE ID_productos = '$_GET[id]'";
	$res = mysql_query($qry);
	$datos = mysql_fetch_array($res); 	
	
	if($datos[12] == 'Activo') $selecA = "selected"; else $selecA = "" ;
	if($datos[12] == 'Inactivo') $selecI = "selected"; else $selecI = "" ;
	
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
	
	$qry = "UPDATE Productos SET 
		    ID_sublineas='$sublinea',Nombre='$nombre',Descripcion='$desc',ASIN='$asin',ASIN_Refill='$asinR',
			Size='$size',Medida='$medida',Url='$url',Keywords='$keyword',Fecha='$fecha',Hora='$hora',Status='$status' 
			WHERE ID_productos = '$_POST[id]'";
	//print"$qry";
	$res = mysql_query($qry) or die("Error Interno... Por favor inténtalo de nuevo" . mysql_error() . $qry);?>
	
	<script language="JavaScript" type="text/javascript">
		self.location='index.php?cmd=productos';
	</script>
	
<? 
}
require($cfg['path_templates'] . 'productos_editar.html');
?>
