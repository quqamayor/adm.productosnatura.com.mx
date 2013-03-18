<? 

$va['mensaje'] = "Su usuario o contraseña es incorrecto, verifique por favor!";
$usu   = $_POST["usuario"];
//$clave = $_POST["pwd"];
$clave = encrip($_POST["pwd"]);
//print"usuario = '$_POST[usuario]' and password = '$_POST[pwd]'";
#print"usuario = $usu <br> pwd = $clave<br>";

$pass = mysql_query("select ID_usuarios,Usuario,Contrasena from Usuarios where Usuario = '$usu' and Contrasena = '$clave' ");
//print"select ID_usuarios,Usuario,Contrasena from Usuarios where Usuario = '$usu' and Contrasena = '$clave'";

if(mysql_num_rows($pass) > 0){
    //print"si";
	list($id,$nombre,$pwd) = mysql_fetch_row($pass);
	#print"$nombre == $usu && $pwd == $clave";
	
	if($nombre == $usu && $pwd == $clave){
	//print"si entro";
		$_SESSION["USID"] = $id;
		require($cfg['path_templates'] . 'home.html');
	}else{
		require($cfg['path_templates'] . 'login.html');
	}
}else{
	require($cfg['path_templates'] . 'login.html');
}

?>
