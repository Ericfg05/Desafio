<div class="container">
    <h1>Painel Administrativo</h1>
    <?php foreach($resultado as $rs): ?>
            <h1><?= "Sala: ".$rs['sala'] ?></h1>
            <h1><?= "Nome:".$rs['nome'] ?></h1>
            <p><?= "Posição: #". $rs['id'] ?></p>
            <p> <?= "Data e hora: ".$rs['data'] ?></p>
        <?php endforeach; ?>
 
        <input type="hidden" name="id" value="<?= $rs['id'] ?>">
        <a class="btn btn-primary" href="<?= base_url("/proximo/".$rs['id']); ?>">
              <i class="bi bi-bag-plus-fill"></i> 
              Proximo
         </a>

</div>