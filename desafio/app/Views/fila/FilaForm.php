    
<?php
    if(!empty($msg)): echo $msg; endif; 
?>
<form class="d-flex justify-content-center mt-3" action="<?= base_url('/inserir')?>" method="POST">
    <div class="dvs">
    <div class="col-md-5 mt-4 col-md-6 col-12">
        <h1 class="text-start align-self-start">Pegue sua senha</h1>
    </div>
    <div class=" col-md-5 mt-4 col-md-6 col-12">
        <label for="NomeCompleto" class="form-label fs-3">Nome Completo</label>
        <input type="text" class="form-control campo tamanho" id="NomeCompleto" placeholder="Ex.: Eric Ferreira Gomes" name="nome" >
    </div>
    <div class="col-md-5 mt-4 col-md-6 col-12">
        <label for="inputState" class="form-label fs-3" >Sala</label>
        <select id="inputState" class="form-select form-control-lg" name="sala">
            <option selected> </option>
        <?php foreach($sala as $s):  ?>
        
        <option value=<?= $s->sala_id?>><?= $s->sala_nome ?></option>
        <?php endforeach;?>
        </select>

    </div>
    <div class="mt-4 bot">
        <input class="btn btn-primary btn-enviar" type="submit" value="enviar">

    </div>
    </div>
        </form>
