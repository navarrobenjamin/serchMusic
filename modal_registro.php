
   <script type="text/javascript">
                  function validar() {
					   nombres=document.getElementById("nombres").value;
					  apellido=document.getElementById("apellido").value;
					  usuario=document.getElementById("usuario").value;
					  fecha=document.getElementById("fecha").value;
     				  pass=document.getElementById("pass").value;
					   confirmar=document.getElementById("confirPasswd").value;
					
			          mail=document.getElementById("email").value;
					 var numeros="0123456789";
                   var letras="abcdefghijklmÃ±opqrstvwxyz";  
			
				  
			if (nombres==""){
				alert ("ingrese su nombre");
				document.getElementById("nombres").focus();
				return false;
			}
			if(apellido==""){
				  alert("ingrese su apellido");
				   document.getElementById("apellido").focus();
				  return false;
			}
		
			if(usuario=="" ){
			   alert("ingrese su usuario");
			   document.getElementById("usuario").focus();
			    return false;
			}else{
			   if(usuario==nombres){
			       alert("El usuario y el nombre deben ser diferentes ");
			       document.getElementById("nombre").focus();
			       return false;
				  }
				   if(usuario.length<3 || usuario.length>17){
				       alert("usuario caracteres permitidos entre 3 y 17");
				        document.getElementById("usuario");
				    return false;
				   }
				  //// validacion de numeros y letras del usuario
				  
				   var en=false;
                   var el=false;
				   for(i=0; i<usuario.length; i++)
                                               {
                        if (numeros.indexOf(usuario.charAt(i),0)!=-1) {  
						// chartArt(POSICION) devuelve el caracter y el indexof la pocicion 
                             en=true;  //  encontro un numero  
                         }
                        if (letras.indexOf(usuario.charAt(i),0)!=-1){
                            el=true;  //encontro una letra
                         }
                   } 
				   
				    if(en!=true){
				       alert("El usuario debe poseer al menos un numero");
					   document.getElementById("usuario").focus();
					   return false;
				   }
				    if(el!=true){
					   alert("El usuario debe poseer al menos una letra");
					    document.getElementById("usuario").focus();
						return false;
					}
				  
			}
			
			if(fecha==""){
				alert("ingrese su fecha");
				 document.getElementById("fecha").focus();
				  return false;

			}
			if(pass==""){
				alert("ingrese su contraseña");
				 document.getElementById("pass").focus();
				  return false;
			}else{
			  
			  if(pass.length<3 || pass.length>15){
			      alert("contraseña permitida entre 3 a 15 caracteres");
				  document.getElementById("pass");
				   
                   return false;			   
				   }
			    	  //// validacion de numeros y letras de la contraseÃ±a
				   var en2=false;
                   var el2=false;
				   for(i=0; i<pass.length; i++)
                                               {
                        if (numeros.indexOf(pass.charAt(i),0)!=-1) {  
						// chartArt(POSICION) devuelve el caracter y el indexof la pocicion 
                             en2=true;  //  encontro un numero  
                         }
                        if (letras.indexOf(pass.charAt(i),0)!=-1){
                            el2=true;  //encontro una letra
                         }
                   } 
				   
				    if(en2!=true){
				       alert("La contraseña debe poseer al menos un numero");
					   document.getElementById("pass").focus();
					   return false;
				   }
				    if(el2!=true){
					   alert("La contraseña debe poseer al menos una letra");
					    document.getElementById("pass").focus();
						return false;
					}
			
			
			}
			
			 if(confirmar==""){
				 alert("ingrese confirmacion de contraseña");
				  document.getElementById("confirPasswd").focus();
				  return false;
			 }else{
			   if(pass!= confirmar){
			       alert("contraseña y confirmacion son difentes");
				   document.getElementById("confirPasswd").focus();
				    return false;
				  }
			 }
			 
		 
 
               if(mail==""){
			      alert("ingrese su correo ");
			 
			      document.getElementById("email").focus();
			       return false;
			 }
			  pos = mail.indexOf("@");  //indexOf devuelve la poscion de la @  partiendo de la primera 
			                              //posicion del arreglo que es 0 .Si no ecuentra la @ devuelve un -1
                if(pos == -1){
					alert("El mail debe poseer una @");
					document.getElementById("email").focus();
                    return false;
                }
                if(pos == 0 || pos == mail.length - 1){
					alert("Mail invalido");
					document.getElementById("email").focus();
                    return false;
                }
                pos2 = mail.lastIndexOf("@"); // lastIndexOf devuelve el valor de la pocicion del @ buscando la ultima @
                if(pos != pos2){
                    alert("El mail debe poseer una @");
					document.getElementById("email").focus();
					return false ;
                }
                posPunto = mail.lastIndexOf(".");
                if(pos > posPunto || posPunto == mail.length - 1){
                    alert("El mail es invalido");
					
					document.getElementById("email").focus();
					return false;
                }
				
				
			 
			 
		

			 
				  }
				
        </script>

       
 
 
 
 
  <!--  modal Agregar Nuevos Registros -->
  <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title  justify-content-center  " id="myModalLabel"> Registro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <form role="form" id="form1" method="POST" action="" onSubmit=" return validar(); ">
            <div class="modal-body">
			          <div class="container-fluid">
                
					  <div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Nombres: </label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="nombres"  name="nombres"  placeholder="Ejemplo: Javiera"   title="Debe tener un numero y una letra" >
					</div>
        </div>
        <div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">apellido: </label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control"id="apellido"  name="apellido"  placeholder="Ejemplo: Pedemonte"   title="Debe tener un numero y una letra" >
					</div>
        </div>
                
                <div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Usuario:</label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="usuario" name="usuario"  placeholder="Ejemplo: usuario123"  title="Debe tener un numero y una letra" >
					</div>
                </div>
        <div class="row form-group">
             <div class="col-sm-3">
                 <label class="control-label" style="position:relative; top:7px;" >Fecha de nacimiento: </label>
              </div>

             <div class="col-sm-9">
                          <input type="date" name="fecha" id="fecha" max="3000-12-31" 
                            min="1000-01-01" class="form-control" >
             </div>
        </div>
				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Contraseña: </label>
					</div>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="pass"  name="pass" maxlength="12" placeholder="Ejemplo: abc12"   title="Debe tener un numero y una letra" >
					</div>
                </div>
        
 <!-- <label >Einde voorverkoop periode</label>
 <input type="date" name="bday" min="1000-01-01"
        max="3000-12-31" class="form-control"> -->

        <div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;">Confirmar contraseña: </label>
					</div>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="confirPasswd"  maxlength="12" name="confirPasswd" placeholder="Confirmar contraseña" >
					</div>
				</div>
				

        <div class="row form-group">
					  <div class="col-sm-3">
						   <label class="control-label" style="position:relative; top:7px;">Correo electronico:</label>
					  </div>
					  <div class="col-sm-9">
						   <input type="text" class="form-control" id="email" name="email" placeholder="info@developerji.com" >
					   </div>
				</div>
			
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="btnRegistro" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" onClick="return h();"></span> Guardar Registro</button>
			
            </div>
                </div> 
              </div>
            </form> 
            </div>
            </div>
      
        
    
    </div>  <!--  fin modal Agregar Nuevos Registros -->


