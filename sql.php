<?php

function conectarSql(){

/*  ******************forma antigua de php **************
$servidor="localhost";
$usuario="root";
$clave="";
$bd="sitioxml";

$link=mysql_pconnect($servidor,$usuario,$clave)
      or die(mysql_error());

$seleciona=mysql_select_db($bd,$link)
          or die(mysql_error());
		  
	*/	
		
$link=new mysqli("localhost","root","","tienda");

if($link->errno){
	echo "fallo la conexion : (".$link->errno.") ". $link->connect_error;

}else{
	//echo "conexion exitosa ";
	if (!$link->set_charset("utf8")) {
		printf("Error cargando el conjunto de caracteres utf8: %s\n", $link->error);
		exit();
	} else {
		//printf("Conjunto de caracteres actual: %s\n", $link->character_set_name());
	}


}  
		
		  
	///	  
return $link;
}
?>