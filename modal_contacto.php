
 <script type="text/javascript">
                  function validar2() {
					  nombre=document.getElementById("nombre").value;
					 
			          mail=document.getElementById("mail").value;
					 consulta=document.getElementById("consulta").value;
		
			
		
		  pos = mail.indexOf("@");  //indexOf devuelve la poscion de la @  partiendo de la primera 
			                              //posicion del arreglo que es 0 .Si no ecuentra la @ devuelve un -1
                if(pos == -1){
                    alert("El mail debe poseer una @");
                    document.getElementById("mail").focus();
                    return false;
                }
                if(pos == 0 || pos == mail.length - 1){
                    alert("Mail invalido");
                    document.getElementById("mail").focus();
                    return false;
                }
                pos2 = mail.lastIndexOf("@"); // lastIndexOf devuelve el valor de la pocicion del @ buscando la ultima @
                if(pos != pos2){
                    alert("El mail debe poseer una @");
                    document.getElementById("mail").focus();
                    return false ;
                }
                posPunto = mail.lastIndexOf(".");
                if(pos > posPunto || posPunto == mail.length - 1){
                    alert("El mail es invalido");
                    document.getElementById("mail").focus();
                    return false;
                }
				
				
				
		      alert("Espera a que nos contactemos contigo..");		
			 
			 
		

			 
				  }
				
        </script>
      



<!--Modal: Contacto -->
<div class="modal fade" id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
    <div class="modal-dialog" role="document"> 
        <div class="modal-content"> 
          <div class="modal-header text-center"> 
           <h4 class="modal-title w-100 font-weight-bold">CONTACTANOS</h4> 
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span> 
             </button> 
           </div> 
           <form role="form" name="form1" action="index.php" Method="post" onSubmit=" return validar2();">  
          <div class="modal-body mx-3"> 
         <!-- <form role="form" name="form1" action="" Method="post" onSubmit="return validalogin();"> -->   
        <div class="md-form mb-5"> 
        <i class="fas fa-envelope prefix grey-text"></i> 
         
        <label data-error="wrong" data-success="right" for="nombre">Nombre:</label> 
          <input type="text" id="nombre"  name="nombre" class="form-control validate" required  > 
        </div> 
        <div class="md-form mb-4"> 
          <i class="fas fa-lock prefix grey-text"></i> 
        
          <label data-error="wrong" data-success="right" for="mail">Correo electronico:</label> 
          <input type="text" id="mail" name="mail" class="form-control validate"  required > 
        </div>
        <div class="md-form mb-4"> 
          <i class="fas fa-lock prefix grey-text"></i> 
        
          <label data-error="wrong" data-success="right" for="consulta">Consulta:</label>
          <textarea class="form-control validate"  maxlength="240" rows="5" id="consulta" name="consulta"  required></textarea>
        </div>

        </div> 
        <div class="modal-footer d-flex justify-content-center">
        
         <input type="submit" name="contacto" value="Ingresar" class="btn btn-default" />
         </div> 
        </form>
         </div> 
         </div> 
         </div> <!-- fin Modal: modal contacto -->