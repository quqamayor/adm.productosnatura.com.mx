<?

	$qry = "SELECT * FROM Promociones WHERE ID_promociones = '$_GET[id]'";
	$res = mysql_query($qry);
	$datos = mysql_fetch_array($res);
	
	if($datos[6] == 'Activo') $selecA = "selected"; else $selecA = "" ;
	if($datos[6] == 'Inactivo') $selecI = "selected"; else $selecI = ""; 

	$qryC = "SELECT ID_ciclos,Nombre FROM Ciclos ORDER BY ID_ciclos ASC";
	$resC = mysql_query($qryC);
	$listaC = mysql_num_rows($resC);
	
	
if($_POST[Submit] == "Enviar"){
	$ciclo = $_POST['ciclo'];
	$desc = $_POST['desc'];
	$precio = $_POST['precio'];
	$status = $_POST['estatus'];
	$fecha = date('Y-m-d');
	$hora = date('H:m:s');
	
	$qry = "UPDATE Promociones SET 
		    ID_ciclos='$ciclo',Descripcion='$desc',Precio='$precio',
			Fecha='$fecha',Hora='$hora',Status='$status'
			WHERE ID_promociones = '$_POST[id]'";
	//print"$qry";
	$res = mysql_query($qry) or die("Error Interno... Por favor inténtalo de nuevo" . mysql_error() . $qry);?>
	
	<script language="JavaScript" type="text/javascript">
		self.location='index.php?cmd=promociones';
	</script>
	
<? 
}
require($cfg['path_templates'] . 'promociones_editar.html');
?>
