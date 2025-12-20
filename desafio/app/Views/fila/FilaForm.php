<?php
    if(!empty($msg)): echo $msg; endif; 
?>
<form class="container" action="<?= base_url('/inserir')?>" method="POST">
    <div class=" col-md-5 mt-4">
    <label for="NomeCompleto" class="form-label">Nome Completo</label>
    <input type="text" class="form-control" id="NomeCompleto" placeholder="Ex.: Eric Ferreira Gomes" name="nome" >
    </div>
    <div class="col-md-5 mt-4">
        <label for="inputState" class="form-label">State</label>
        <select id="inputState" class="form-select" name="sala">
            <option selected> </option>
        <?php foreach($sala as $s):  ?>
        
        <option value=<?= $s->sala_id?>><?= $s->sala_nome ?></option>
        <?php endforeach;?>
        </select>

    </div>
    <div class="mt-4">
        <input class="btn btn-primary" type="submit" value="Submit">

    </div>
        </form>