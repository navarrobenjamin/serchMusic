<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("sql.php");
session_start();
$link=conectarSql();


 if(isset($_SESSION['usuario'])){

 }else{
  $_SESSION['usuario']=null;
 }

	    //$nombre=$_SESSION['nombre'];
       //$apellido=$_SESSION['apellido'];
   
      // $id_usuario=$_SESSION['id_usuario'];
    //  $ruta=$_SESSION['usu_foto'];
       

     //   $consulta2= "SELECT usu_id,usuario,usu_nombre,usu_apellido,paswd FROM usuario WHERE usu_id='".$id_usuario."'"; 

        // $ejecuta2=mysql_query($consulta2,$link) or die(mysql_error());
         //$fila2=mysql_fetch_array($ejecuta2);
		 
	//	 $ejecuta2=$link->query($consulta2);
//				$fila2=$ejecuta2->fetch_array();
				



if(!$_SESSION['usuario']){

  
  $_SESSION['usuario']=null;



}




if(isset($_POST['enviar'])){
   
   $select=$_POST['seleccion'];
     $_SESSION['marca']=$_POST['marcas'];
   
   if($select=="baratos"){
  
       header("Location:busqueda.php");
   }
   
   if($select=="caros"){
   header("Location:productos.php");
   }
   
 
   
  
	
	
}



if(isset($_POST['btnRegistro'])){//para saber si el botÃ³n registrar fue presionado. 
                
				
  // echo "bienvenido";
     $usuario= $_POST["usuario"];
      $nombre= $_POST["nombres"];
      $apellido= $_POST["apellido"];
      $pass= $_POST["pass"];
      $pregunta= $_POST["confirPasswd"];
      
$mail=$_POST["mail"];








     

$consul= "SELECT *FROM usuario WHERE usuario='".$usuario."'"; 

/* forma antigua
$ejec=mysql_query($consul,$link) or die(mysql_error());
$fil= mysql_num_rows($ejec);
*/
$ejec=$link->query($consul);

$fil=mysqli_num_rows($ejec);


if($fil>0) { 
     echo '<script language = javascript>
       alert("el usuario ya existe.")
       </script>';    
    } else {

  
                                                                 
$consulta="INSERT INTO usuario (usuario,usu_nombre,usu_apellido,paswd,usu_mail)values ('".$usuario."','". $nombre."','". $apellido."','".$pass."','".$mail."'   )";
    
/*  forma antigua 
$ejecuta=mysql_query($consulta,$link) or die (mysql_error());
*/

$ejecuta=mysqli_query($link,$consulta);





if($ejecuta>0) { 
         echo '<script language = javascript>
       alert("se registro correctamente.");
       self.location = "index.php"
       </script>';
} else{
      echo '<script language = javascript>
       alert("inserccion fallida.");
       </script>'; 
  }







}

}





     if(isset($_POST['btnIngresar'])){
	    //bajar las variables
	      $nombre=$_POST['txtLogin'];
	      $clave=$_POST['txtClave'];
	     
		
			
		$consulta="SELECT * 
				FROM usuario 
				WHERE usuario='".$nombre."' 
				AND paswd='".$clave."'";
	            
				$ejecuta=$link->query($consulta);
				
				$fila=$ejecuta->fetch_array();
				
				$cantidad=mysqli_num_rows ($ejecuta);
			
			/// forma antigua /////
				//$ejecuta=mysql_query($consulta,$link) or die(mysql_error());
	          //   $fila=mysql_fetch_array($ejecuta);
	            // $cantidad=mysql_num_rows($ejecuta);
				 
				 if($cantidad>0){
	                 $_SESSION['id_usuario'] = $fila['usu_id'];
	
                     $_SESSION['nombre']=$fila['usu_nombre'];
                   	$_SESSION['apellido']=$fila['usu_apellido'];
					
                    $_SESSION['usuario']= true; 
	
              //       echo '<script language = javascript>
	              //        alert("Inicio correcto ");
	                //      </script>';
						  
						  // echo '<script language = javascript>
	              //        self.location = "index.php"
	                //      </script>';

                    // header("Location: index.php");
	             }else{
	                  echo '<script language = javascript>
	                      alert("Inicio de sesion incorrecto");  self.location = "index.php"
	                     
	                      </script>';
	              }
		
}



if(isset($_POST["contacto"])){

  $message1=$_POST['consulta'];
  $nombre=$_POST['nombre'];
  $correo=$_POST['mail'];
  
  // Enviarlo
  
$to = "09dangerous@gmail.com,navarrobenjamin888@gmail.com";
$subject = "Encuentra tu instrumento";
$message = "Nombre: ".$nombre."  \n Mensage: ".$message1;
$headers = "From:".$correo."" . "\r\n" . "CC: destinatarioencopia@email.com";
 
mail($to, $subject, $message, $headers);


  
  }
  




?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Escoge tu instrumento</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">


  

</head>

<body>
<!--<script src="validar.js"></script> --> 
  <?php include("modal_login.php");?>
  <?php include("modal_contacto.php");?>
  <?php include("modal_registro.php");?>
  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="images/web3.jpg" width="60" height="43"  class="rounded-circle">SerchMusic ||  
          <?php     if($_SESSION['usuario']){ ?>
         <img src="images/verde.gif" width="27" height="23"  class="rounded-circle"> 
          <?php } ?>
          </a>
    
      <?php     if($_SESSION['usuario']){ ?>

<font color="#FFFFFF"> 
  <?php echo "Binvenido: ".$_SESSION['nombre']." ".	$_SESSION['apellido'];   ?> 

  </font>
<?php } ?>

      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php if(!$_SESSION['usuario']){ ?> 

          <li class="nav-item">
            <a class="nav-link" href="" data-toggle="modal" data-target="#login">Inicio sesión</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#addNew" >Registro</a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#modalContacto">Contactanos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="acerca.php" data-toggle="modal" data-target="#login">Acerca de</a>
          </li>
        <?php if($_SESSION['usuario']){ ?> 
          
          <li class="nav-item">
            <a class="nav-link" href="sesion.php">Cerrar sesión</a>
          </li>
        <?php } ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

       
            

        </div> <!-- /.col-lg-3 -->
     

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                 <ol class="carousel-indicators">
                   <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                   <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  
                 </ol>
                  <div class="carousel-inner" role="listbox">
                     <div class="carousel-item active">
                         <img class="d-block img-fluid w-100" src="images/descarga2.jpg" alt="First slide">
                      </div>
                    
                     <div class="carousel-item">
                        <img class="d-block img-fluid w-100" src="images/descarga1.jpg" alt="Third slide">
                     </div>
                   </div>  <!-- /carousel-inner" role="listbox-->
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
          </div>  <!-- /carouselExampleIndicators"-->
        
          <br />
<br />
<br />
<br /><br />
               <center><h2>Encuentra tu instrumento </h2> </center>
              <br/> <br/><br/>
    
    <p> 	
     El sitio web esta orientado tantos a los usuarios que busquen instrumentos facilitando este proceso como a los dueños de las tiendas que pueden exhibir sus artí­culos para anhelar ser la mejor opción del mercado.</p>
 <p> 	
 Buscamos ser la empresa líder en entregar a nuestros clientes la mejor calidad comparativa musical que estén buscando, satisfaciendo sus necesidades y brindándoles un excelente servicio cada día para poder ser una organización líder nacional y reconocida internacionalmente por nuestra calidad de servicio.
</p>
<p>
El fin es desarrollar una plataforma web la cual permite buscar y comparar instrumentos musicales de diversas tiendas de instrumentos para facilitar la búsqueda y cotización de instrumentos musicales orientado tantos a los usuarios que busquen instrumentos facilitando este proceso como a los dueños de las tiendas que pueden exhibir sus artículos para anhelar ser la mejor opción del mercado.
</p>


<br />
<br />
<br />
<br /><br />
<br /><br />
<br />




        
     
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
