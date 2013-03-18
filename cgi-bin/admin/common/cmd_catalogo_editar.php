<?

	$qry = "SELECT * FROM Catalogo WHERE ID_catalogo = '$_GET[id]'";
	$res = mysql_query($qry);
	$datos = mysql_fetch_array($res);
	
	if($datos[10] == 'Activo') $selecA = "selected"; else $selecA = "" ;
	if($datos[10] == 'Inactivo') $selecI = "selected"; else $selecI = ""; 

	$qryC = "SELECT ID_ciclos,Nombre FROM Ciclos ORDER BY ID_ciclos ASC";
	$resC = mysql_query($qryC);
	$listaC = mysql_num_rows($resC);
	
	$qryP = "SELECT ID_productos,Nombre FROM Productos ORDER BY Nombre ASC";
	$resP = mysql_query($qryP);
	$listaP = mysql_num_rows($resP);
	
if($_POST[Submit] == "Enviar"){
	$ciclo = $_POST['ciclo'];
	$prod = $_POST['producto'];
	$precio = $_POST['precio'];
	$precioR = $_POST['precioR'];
	$promo = $_POST['promocion'];
	$status = $_POST['estatus'];
	$fecha = date('Y-m-d');
	$hora = date('H:m:s');
	
	$qry = "UPDATE Catalogo SET 
		    ID_ciclos='$ciclo',ID_productos='$prod',Precio='$precio',Precio_refill='$precioR',Promocion='$promo',
			Fecha='$fecha',Hora='$hora',Status='$status'
			WHERE ID_catalogo = '$_POST[id]'";
	//print"$qry";
	$res = mysql_query($qry) or die("Error Interno... Por favor inténtalo de nuevo" . mysql_error() . $qry);?>
	
	<script language="JavaScript" type="text/javascript">
		self.location='index.php?cmd=catalogo';
	</script>
	
<? 
}
require($cfg['path_templates'] . 'catalogo_editar.html');
?>
