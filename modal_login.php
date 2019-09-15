
<!--Modal: Contacto -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
    <div class="modal-dialog" role="document"> 
        <div class="modal-content"> 
          <div class="modal-header text-center"> 
           <h4 class="modal-title w-100 font-weight-bold">Inicia sesión</h4> 
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span> 
             </button> 
           </div> 
           <form role="form" name="form1" action="index.php" Method="post" >  
          <div class="modal-body mx-3"> 
         <!-- <form role="form" name="form1" action="" Method="post" onSubmit="return validalogin();"> -->   
        <div class="md-form mb-5"> 
        <i class="fas fa-envelope prefix grey-text"></i> 
         
        <label data-error="wrong" data-success="right" for="txtLogin">Usuario: </label> 
          <input type="text" id="txtLogin"  name="txtLogin" class="form-control validate" required  > 
        </div> 
        <div class="md-form mb-4"> 
          <i class="fas fa-lock prefix grey-text"></i> 
        
          <label data-error="wrong" data-success="right" for="txtClave">Contraseña:</label> 
          <input type="password" id="txtClave" name="txtClave" class="form-control validate" required> 
          



      
        </div>
        

        </div> 
        <div class="modal-footer d-flex justify-content-center">
        
         <input type="submit" name="btnIngresar" value="Ingresar" class="btn btn-default"  />
         </div> 
        </form>
         </div> 
         </div> 
         </div> <!-- fin Modal: modal contacto -->
         