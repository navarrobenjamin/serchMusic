<?php


// Inicializa la sesi&oacute;n.
// Si est&aacute; usando session_name("algo"), &iexcl;no lo olvide ahora!
session_start();

// Destruye todas las variables de la sesi&oacute;n
$_SESSION = array();
// Finalmente, destruye la sesi&oacute;n
session_destroy();

session_start();
$_SESSION['usuario']=null;
header("Location:index.php");
 
?>