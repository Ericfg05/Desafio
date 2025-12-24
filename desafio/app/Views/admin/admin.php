<div class="container">
    <h1>Painel Administrativo</h1>

    <?php if ($resultado == "NULL") { ?>
        <h3>Nenhum usuario aguardando na fila</h3>
    <?php } else { ?>

        <?php foreach ($resultado as $rs): ?>
            <div class="card_<?= $rs['sala_id'] ?>" data-id="<?= $rs['sala_id'] ?>">

                <h1 id="salas_<?= $rs['sala_id'] ?>">Sala: <?= $rs['sala'] ?></h1>
                <h1 id="nomes_<?= $rs['sala_id'] ?>">Nome: <?= $rs['nome'] ?></h1>
                <p id="posicaos_<?= $rs['sala_id'] ?>">Posição: #<?= $rs['id'] ?></p>
                <p id="datas_<?= $rs['sala_id'] ?>">Data e hora: <?= $rs['data'] ?></p>

            </div>
        <?php endforeach; ?>
              <a class="btn btn-primary" href="<?= base_url("/proximo/".$rs['id']); ?>">
                <i class="bi bi-bag-plus-fill"></i> 
                Proximo
            </a>
    <?php } ?>
</div>

<script>
function chamarAjax() {
    $.ajax({
        url: '<?= base_url("/json") ?>',
        type: 'GET',
        cache: false,
        dataType: 'json',
        success: function (response) {

            // response é UM objeto
            const salaId = response.sala_id;

            const salaEl    = document.getElementById('salas_' + salaId);
            const nomeEl    = document.getElementById('nomes_' + salaId);
            const posicaoEl = document.getElementById('posicaos_' + salaId);
            const dataEl    = document.getElementById('datas_' + salaId);

            // se não existir na tela, não faz nada
            if (!salaEl || !nomeEl || !posicaoEl || !dataEl) {
                console.warn('Elemento não encontrado para sala_id:', salaId);
                return;
            }

            // ATUALIZA apenas
            salaEl.innerText    = "Sala: " + response.sala;
            nomeEl.innerText    = "Nome: " + response.nome;
            posicaoEl.innerText = "Posição: #" + response.id;
            dataEl.innerText    = "Data e hora: " + response.data;
        }
    });
}

// chama imediatamente
chamarAjax();

// chama a cada 2 segundos
setInterval(chamarAjax, 2000);
</script>