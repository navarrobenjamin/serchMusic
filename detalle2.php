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
	                      alert("no se logeo ");  self.location = "index.php"
	                     
	                      </script>';
	              }
		
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

          <h1 class="my-4">Categorias</h1>
            <div class="list-group">

               <?php 
				         //// mostrar categorias
                             $consulta="SELECT COUNT(a.id_instru) AS cantidad, b.id_cat, b.desc_cat FROM instrumento AS a, categoria AS b WHERE a.id_cat=b.id_cat GROUP BY b.id_cat, b.id_cat";
                             $ejecuta=$link->query($consulta);
                             $fila=$ejecuta->fetch_array();
				         do{
						
				          ?>	
                           
                      
					        <a href="detalle2.php?id_categoria=<?php echo $fila["id_cat"];  ?> "  class="list-group-item"  style="text-decoration:none"><?php echo $fila["desc_cat"];?> ( <?php echo $fila["cantidad"];?> ) </a>	
                        	  
							 
                    <?php
                
						      } while($fila=$ejecuta->fetch_array())

						       ?>
                  </div><!-- /list-group -->

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
        
          <hr/>
          <h2 class="text-center"> Realiza tu busqueda </h2>
     

        <center>
       <form action="" method="post" id="formulario" >
               
               Precio: <select name="seleccion">
                    <option value="baratos">mas baratos </option>
                    <option value="caros"> mas caros</option>
               </select>
              
               Marcas:<select name ="marcas">
               <?php 
                 $consulta2="select DISTINCT marca_instru from instrumento ";
                  $ejecuta2=$link->query($consulta2);;

                  /// colocar datos de las tablas en un arreglo $arr
                  $n=0; 
                  while($fila2=$ejecuta2->fetch_array()){   //  recorre por columna y guarda la columna en $fila2  
                  $arr[$n]=$fila2; 
                    $n++; 
                   }
                    
	       
		         for($i=0;$i<$n;$i++){  
	             ?>
                  <option> <?php echo $arr[$i]['marca_instru']; ?> </option>
                    <?php }?>
               
               </select>
               
              <br>
                <br>
          <input class="btn btn-primary btn-lg" name="enviar" type="submit"  value="buscar" id="enviar" />
               
               
               </form>
               </center>
   
               <hr/>
      
               <?php //bajar variable de tipo GET
       
       $id=$_GET["id_categoria"];
       $consulta="SELECT * FROM instrumento  WHERE id_cat='$id'";
       
       $ejecuta=$link->query($consulta);
       $fila=$ejecuta->fetch_array();
       
       if($fila['id_cat']==1){
         echo "<h1 class='text-center bg-secondary'> CUERDAS </h1>";
       }
       if($fila['id_cat']==2){
         echo "<h1 class='text-center bg-secondary'> VIENTOS </h1>";
       }
       if($fila['id_cat']==3){
         echo "<h1 class='text-center bg-secondary'>PERCUSIÓN </h1>";
       }
       if($fila['id_cat']==4){
         echo "<h1 class='text-center bg-secondary'>PIANOS Y TECLADOS </h1>";
       }

      // do{


       ?>

           <br/>
           <br/>
           <br/>
           <br/>
        <div class="row">

         <?php   do{ ?>



          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="<?php echo $fila['foto_instru']; ?>" alt="" height="143" width="70" ></a>
              <div class="card-body">
                <h6 class="card-title">
                  <a href="detalle.php?id_intru=<?php echo $fila['id_instru']; ?>"><?php echo $fila['nombre_instru'];?> </a>
                </h6>
                <h5><?php  echo "Precio: $".number_format($fila['precio_unitario'], 0, '', '.');   ?></h5>
                
              </div>
              <div class="card-footer">
                <small class="text-muted"></small>
              </div>
            </div>
          </div>



        

          

          
   <?php  }while($fila=$ejecuta->fetch_array())  ?>
        

        </div>

        
       
    
   <?php // }while($fila=$ejecuta->fetch_array())  ?>
  
   
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
