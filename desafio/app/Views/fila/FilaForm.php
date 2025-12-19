<?php

?>
<div class="container">
    <div class="mb-4 col-md-5">
    <label for="NomeCompleto" class="form-label">Nome Completo</label>
    <input type="text" class="form-control" id="NomeCompleto" placeholder="Ex.: Eric Ferreira Gomes">
    </div>
    <div class="col-md-5">
        <label for="inputState" class="form-label">State</label>
        <select id="inputState" class="form-select">
            <option selected></option>
        <?php foreach($sala as $s):  ?>
        
        <option value=<?= $s->sala_id?>><?= $s->sala_nome ?></option>
        <?php endforeach;?>
        </select>

    </div>
 </div>