<?php
    if(!empty($msg)): echo $msg; endif; 
?>
<div class="container">
    <form action="<?= base_url('/login') ?>" method='post'>
        <div class="col-md-5 mt-4">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" aria-describedby="emailHelp" name="usuario">
         </div>
        <div class="col-md-5 mt-4">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha">
        </div>
        <button type="submit" class="btn btn-primary mt-4">Entrar</button>
    </form>
</div>