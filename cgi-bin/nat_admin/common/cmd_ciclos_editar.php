<?
	$qry = "SELECT * FROM Ciclos WHERE ID_ciclos='$_GET[id]'";
	$res = mysql_query($qry);
	$datos = mysql_fetch_array($res);
	list($anio,$mes,$dia)= split('[-]',$datos[2]);
	list($anio_has,$mess,$dia_has)= split('[-]',$datos[3]);

           if($mes == '01'){ $ChecaE = 'selected'; }else{ $ChecaE = ''; } 
           if($mes == '02'){ $ChecaF = 'selected'; }else{ $ChecaF = ''; } 
           if($mes == '03'){ $ChecaMZ = 'selected'; }else{ $ChecaMZ = ''; } 
           if($mes == '04'){ $ChecaA = 'selected'; }else{ $ChecaA = ''; } 
           if($mes == '05'){ $ChecaMY = 'selected'; }else{ $ChecaMY = ''; } 
           if($mes == '06'){ $ChecaJN = 'selected'; }else{ $ChecaJN = ''; } 
           if($mes == '07'){ $ChecaJL = 'selected'; }else{ $ChecaJL = ''; } 
           if($mes == '08'){ $ChecaAG = 'selected'; }else{ $ChecaAG = ''; } 
           if($mes == '09'){ $ChecaS = 'selected'; }else{ $ChecaS = ''; } 
           if($mes == '10'){ $ChecaO = 'selected'; }else{ $ChecaO = ''; } 
           if($mes == '11'){ $ChecaN = 'selected'; }else{ $ChecaN = ''; } 
           if($mes == '12'){ $ChecaD = 'selected'; }else{ $ChecaD = ''; }

		   if($mess == '01'){ $ChecaEn = 'selected'; }else{ $ChecaEn = ''; } 
		   if($mess == '02'){ $ChecaFe = 'selected'; }else{ $ChecaFe = ''; } 
		   if($mess == '03'){ $ChecaMZo = 'selected'; }else{ $ChecaMZo = ''; } 
		   if($mess == '04'){ $ChecaAb = 'selected'; }else{ $ChecaAb = ''; } 
		   if($mess == '05'){ $ChecaMYo = 'selected'; }else{ $ChecaMYo = ''; } 
		   if($mess == '06'){ $ChecaJNo = 'selected'; }else{ $ChecaJNo = ''; } 
		   if($mess == '07'){ $ChecaJLo = 'selected'; }else{ $ChecaJLo = ''; } 
		   if($mess == '08'){ $ChecaAGo = 'selected'; }else{ $ChecaAGo = ''; } 
		   if($mess == '09'){ $ChecaSe = 'selected'; }else{ $ChecaSe = ''; } 
		   if($mess == '10'){ $ChecaOc = 'selected'; }else{ $ChecaOc = ''; } 
		   if($mess == '11'){ $ChecaNo = 'selected'; }else{ $ChecaNo = ''; } 
		   if($mess == '12'){ $ChecaDi = 'selected'; }else{ $ChecaDi = ''; } 

	if($datos[6]=='Activo') $act="selected"; else $act="";
	if($datos[6]=='Inactivo') $inact="selected"; else $inact="";	
         
if($_POST[Submit]=='Enviar') {

$nombre = $_POST['nombre'];
$fecha_desde = "$_POST[anio_ini]-$_POST[mes_ini]-$_POST[dia_ini]";
$fecha_hasta = "$_POST[anio_al]-$_POST[mes_al]-$_POST[dia_al]";
$fecha = date('Y-m-d');
$hora = date('H:m:s'); 
$status = $_POST['estatus'];

	$qry = "UPDATE Ciclos set Nombre='$nombre',Fecha_de='$fecha_desde',Fecha_hasta='$fecha_hasta',Fecha='$fecha',Hora='$hora',Status='$status' WHERE        ID_ciclos=$_POST[id]";
//	print"$qry";
	$res = mysql_query($qry) or die("Error Interno... Por favor inténtalo de nuevo" . mysql_error() . $qry); ?>
	
	<script language ="javascript" type="text/javascript">
		self.location='index.php?cmd=ciclos';
		</script> 
	<?		
}
require($cfg['path_templates'] . 'ciclos_editar.html');
?>
