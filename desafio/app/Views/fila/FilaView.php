<?php ?>
    <div class="container">
        <?php foreach($resultado as $rs): ?>
            <h1><?= "Sala: ".$rs['sala'] ?></h1>
            <h1><?= "Nome:".$rs['nome'] ?></h1>
            <p><?= "Posição: #". $rs['id'] ?></p>
            <p> <?= "Data e hora: ".$rs['data'] ?></p>
        <?php endforeach; ?>
   
    </div>