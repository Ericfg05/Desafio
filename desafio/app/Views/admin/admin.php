<div class="container">
    <h1>Painel Administrativo</h1>
    <?php if($resultado == "NULL"){?>
        <h3>Nenhum usuario aguardando na fila</h3>
    <?php }else{ ?>
        <?php foreach($resultado as $rs): ?>
                <h1><?= "Sala: ".$rs['sala'] ?></h1>
                <h1 id="pa"><?= "Nome:".$rs['nome'] ?></h1>
                <p><?= "Posição: #". $rs['id'] ?></p>
                <p> <?= "Data e hora: ".$rs['data'] ?></p>
            <?php endforeach; ?>
    
            <input type="hidden" name="id" value="<?= $rs['id'] ?>">
            <a class="btn btn-primary" href="<?= base_url("/proximo/".$rs['id']); ?>">
                <i class="bi bi-bag-plus-fill"></i> 
                Proximo
            </a>
            <br>
            <p id="resultado"></p>
     <?php }?>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
function chamarAjax() {
    $.ajax({
        url: '<?= base_url("/json") ?>',
        type: 'GET',
        cache: false,
        dataType: 'json',
        success: function (response) {
         $("#resultado").val(response);
           // window.alert('ala')
            console.log(response);
        },
        error: function () {
           // document.getElementById('pa').innerHTML = "Nome: teste"
            //console.log(response);
            console.log('Erro na requisição');
        }
    });
}

// chama imediatamente
chamarAjax();

// chama a cada 2 segundos (2000 ms)
setInterval(chamarAjax, 2000);
</script>