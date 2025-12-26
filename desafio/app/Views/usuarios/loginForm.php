<?php
    if(!empty($msg)): echo $msg; endif; 
?>
<form  class="d-flex justify-content-center mt-3" action="<?= base_url('/login') ?>" method='post'>
    <div class="dvs">
        <div class="col-md-5 mt-4 col-md-6 col-12">
            <h1 class="text-start align-self-start">Login</h1>
        </div>
        
        <div class="col-md-5 mt-4 col-md-6 col-12">
            <label for="usuario" class="form-label fs-3">Usuario</label>
            <input type="text" class="form-control form-control-lg" id="usuario" aria-describedby="emailHelp" name="usuario">
         </div>
        <div class="col-md-5 mt-4 col-md-6 col-12">
            <label for="senha" class="form-label fs-3">Senha</label>
            <input type="password" class="form-control form-control-lg" id="senha" name="senha">
        </div>
        <button type="submit" class="btn btn-primary mt-4 btn-enviar">Entrar</button>
    </div>
    </form>
