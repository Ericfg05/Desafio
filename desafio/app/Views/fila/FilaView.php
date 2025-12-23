<?php ?>
    <div class="container">
        <?php if($resultado == "NULL"){ ?>
            <h1>Nenhum Usuario aguardando na fila</h1>
        <?php }else{?>
            <?php foreach($resultado as $rs): ?>
                <h1><?= "Sala: ".$rs['sala'] ?></h1>
                <h1><?= "Nome:".$rs['nome'] ?></h1>
                <p><?= "Posição: #". $rs['id'] ?></p>
                <p> <?= "Data e hora: ".$rs['data'] ?></p>
            <?php endforeach; ?>
            
        <?php }?>
                <p id="resultado"></p>
    </div>
    