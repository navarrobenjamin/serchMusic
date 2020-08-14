<?php
header("Content-Type: text/html;charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', '1');


include("sql.php");
session_start();
$link=conectarSql();
 
$id=$_GET["id_intru"];

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

if(isset($_POST['comentar'])){

  $comentario=$_POST['opinion'];
  $idUsuario=$_SESSION['id_usuario'];


  $stmt = $link->prepare("INSERT INTO comentarios(idUsuario,idInstrumento,texto,fecha) VALUES (?, ?, ?,now())");
  $stmt->bind_param("iis",$_SESSION['id_usuario'], $id, $comentario);
  $stmt->execute();

 // $sql="INSERT INTO comentarios (idUsuario,idInstrumento,texto,fecha) values('".$_SESSION['id_usuario']."','".$id."','".$comentario."', NOW ())";
  //$ejecuta=mysqli_query($link,$sql);
  

  if($stmt) { 
   
} else{
 echo '<script language = javascript>
  alert("insersion fallida.");
  </script>'; 
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
       alert("insersion fallida.");
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
					         $_SESSION['username']=$fila['usuario'];
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
<script type="text/javascript">
                  function validacion() {
					  
					 
			          mail=document.getElementById("correo").value;
					     opinion=document.getElementById("opinion").value;
		
       
               if(mail==""){
                 alert("mail fas");
                    return false;
               }

		
		            pos = mail.indexOf("@");  //indexOf devuelve la poscion de la @  partiendo de la primera 
			                              //posicion del arreglo que es 0 .Si no ecuentra la @ devuelve un -1
                if(pos == -1){
                    alert("El mail debe poseer una @");
                    document.getElementById("correo").focus();
                    return false;
                }
                if(pos == 0 || pos == mail.length - 1){
                    alert("Mail invalido");
                    document.getElementById("correo").focus();
                    return false;
                }
                pos2 = mail.lastIndexOf("@"); // lastIndexOf devuelve el valor de la pocicion del @ buscando la ultima @
                if(pos != pos2){
                    alert("El mail debe poseer una @");
                    document.getElementById("correo").focus();
                    return false ;
                }
                posPunto = mail.lastIndexOf(".");
                if(pos > posPunto || posPunto == mail.length - 1){
                    alert("El mail es invalido");
                    document.getElementById("correo").focus();
                    return false;
                }
				
				
				if(opinion==""){
          alert("Ingrese su opinion");
          document.getElementById("opinion").focus();
          return false;


        }
		     
			 
		

			 
				  }
				
        </script>


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
            <a class="nav-link" href="acerca.php"  >Acerca de</a>
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
       
      // $id=$_GET["id_intru"];
       $consulta="SELECT * FROM instrumento as a,tienda as b,comuna as c  WHERE a.id_instru='$id' and a.id_tienda=b.id_tienda and b.id_comuna=c.id_comuna";
       
       
       $ejecuta=$link->query($consulta);
       $fila=$ejecuta->fetch_array();
       
       
       
       
       ?>


        <div class="row ">

           <div class="col-lg-12 col-md-12 mb-12  ">
             <h2 class="text-center text-light bg-dark" > <?php echo $fila['nombre_instru'];  ?> </h2>    
           </div>


          <div class="col-lg-6 col-md-6 mb-4 " >
          <img src="<?php echo $fila['foto_instru'];  ?>" width="275" height="240" class="zoom mx-auto d-block" >

          </div>

          <div class="col-lg-6 col-md-6 mb-4 bg-light ">
          <br/>
              <p  class=""> <?php echo  $fila['desc_instru'];  ?> </p>

          </div>

          <div class="col-lg-6 col-md-6 mb-4 bg-light">
      
          <p> <?php echo "Precio: $".number_format($fila['precio_unitario'], 0, '', '.');  ?></p>
        <p> <?php echo "Marca: ".$fila['marca_instru'];   ?> </p>
        <p> <?php echo "Nombre de la tienda: ".$fila['nom_tienda'];     ?></p> 
         <p> <?php echo "Direccion: ".$fila['direccion_tienda'];  ?></p>   
        
        <p> <?php echo "Comuna: ".$fila['nombre_comuna'];  ?></p>  
        <p> <?php echo "Telefono: ".$fila['telefono_tienda'];  ?></p>


          </div>
          <div class="col-lg-6 col-md-6 mb-4 bg-light ">
         
          <?php if($fila['id_tienda']==2){ ?>
         <h2 class="text-center ">Encuentranos aquí</h2> <p class="text-center"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26635.890598279646!2d-70.63360483910829!3d-33.43663409136112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbd68c424fbe71c73!2sAudio+Mundo+SPA!5e0!3m2!1ses-419!2scl!4v1511969482962" width="329" height="180" frameborder="0" style="border:3" allowfullscreen  class="border border-primary"></iframe></p> 
        <?php   } if($fila['id_tienda']==1){    ?>
        
        <h2 class="text-center">Encuentranos aquí­</h2> <p class="text-center"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1664.707058439201!2d-70.63773683309455!3d-33.43851592186115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96630b8747ba6a7f%3A0x3c7d9ab1da75c6be!2sCrowne+Plaza!5e0!3m2!1ses-419!2scl!4v1511971269354" width="329" height="180" frameborder="0" style="border:0" allowfullscreen class="border border-primary"></iframe></p> 
        
         <?php } ?>


          </div>
       
       
          
          <!-- formulario muestra los comentarios -->
          <?php
         $sql="SELECT * FROM comentarios inner join usuario on usu_id=idUsuario WHERE idInstrumento='".$id."'";
        
           $ejecutar=$link->query($sql);

           
$num=mysqli_num_rows($ejecutar);




     


           ?>

          <div class="col-lg-12 col-md-12 mb-12  bg-light ">
         
           <h2 class="text-center text-light bg-dark">Comentarios</h2>
           <br/>
           <br/>
            
             <form role="form" name="form1" action="" Method="post" > 

             <?php 
                        if($num>0) {
                         while($fila=$ejecutar->fetch_array()){ ?>
                <div class=" row form-group  ">
                
                    
                    <div class="col-sm-6">
                       <label for="correo">Usuario:</label>
                        <?php echo $fila['usuario']; ?> 
                    </div>
                    <div class="col-sm-6 text-right" >
                         <?php echo $fila['fecha']; ?>
                   </div>
                      <div class="col-sm-12">
                           <small id="passwordHelpBlock" class="form-text text-muted">
                              <?php  echo $fila['texto']; ?>
                           </small>
                      </div>
             
                 </div>
                 <hr/>
                 <?php 
                             }
                             }else{
              
                             echo "<h2 class='text-center'> No existen comentarios </h2>";
                             }
              
                             ?>
                            
               </form>
            
        </div> <!-- div col-lg-12 -->
<!--  fin de formulario que muestra los comentarios -->


<br/>


        <!-- /.row -->



</div>


<br/>
<br/>
<br/>
<?php  if($_SESSION['usuario']){ ?> 
<div class="row"> <!-- inicio row  comentarios -->

<div class="col-lg-12 col-md-12 mb-12  bg-light ">
          
             <div class="container">
              <h2>Escribe tu opinión</h2>
               
                <form role="form" name="form1" action="" Method="post" > 
                   <div class="form-group">
                      
                       <h5><?php   echo $_SESSION['nombre']." ".$_SESSION['apellido'] ; ?> </h5>
                    </div>
                   <div class="form-group">
                     
                     <label data-error="wrong" data-success="right" for="opinion">Opinion:</label>
                     <textarea class="form-control validate"  maxlength="240" rows="opinion" name="opinion" required ></textarea>
                   </div>
    
                   <button type="submit" id="comentar" name="comentar"  class="btn btn-primary">Enviar</button>
                  </form>
               </div> <!-- div container -->
           </div> <!-- div col-lg-12 -->       

</div>  <!-- fin row  comentarios -->
<?php  }?>
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->
 <br/>
 <br/>
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
