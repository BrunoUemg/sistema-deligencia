<?php 

include_once "header.php";

?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Cadastrar usuário</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
           

            <form method="POST" action="envio_cadastro_usuario.php">
            
                <div class="row">
                  <div class="form-group col-md-4">
                    <label>Nome do usuario</label><br>
                    <input type="text" class="form-control"  required="required"    name="nomeUsuario" id="">
                  </div>
                  <div class="form-group col-md-4">
                    <label>CPF do usuário</label><br>
                    <input type="text" class="form-control"  required="required" onkeyup="mascara('###.###.###-##',this,event,true)" name="userAcesso" id="">
                  </div>
                  
                  
                  
                 </div>
                  <div class="card-action">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                 
                   </div>
              </form>


         </div>
            </div>
       </div>
</div>
</div>
</div>
       <?php 
       
       include_once "footer.php"
       ?>