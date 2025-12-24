<div class="container">
    <h1>Painel Administrativo</h1>

    <?php if ($resultado == "NULL") { ?>
        <h3 id="semUsuario">Nenhum usuario aguardando na fila</h3>
    <?php } else { ?>

        <?php foreach ($resultado as $rs): ?>
            <div class="card_<?= $rs['sala_id'] ?>">

                <h1 id="salas_<?= $rs['sala_id'] ?>">Sala: <?= $rs['sala'] ?></h1>
                <h1 id="nomes_<?= $rs['sala_id'] ?>">Nome: <?= $rs['nome'] ?></h1>
                <p id="posicaos_<?= $rs['sala_id'] ?>">Posição: #<?= $rs['id'] ?></p>
                <p id="datas_<?= $rs['sala_id'] ?>">Data e hora: <?= $rs['data'] ?></p>
                <audio id="audioAviso" src="/assets/doorbell-95038.mp3" preload="auto"></audio>

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
             response.forEach(item => {
                const aviso = document.getElementById('semUsuario');

                let container = document.getElementById('card_'+item.id_sala);
                let posicaoEl = document.getElementById('posicaos_' + item.id_sala);
                let posicao = posicaoEl ? posicaoEl.innerText : 'null';
            

                if (item.null) {

            

                }else if("Posição: #"+item.id == posicao){

                }else{
                    if (aviso) {aviso.remove()};

                    if (!container) {
                        container = document.createElement('div');
                        container.className = 'card_'+item.id_sala;
                        document.querySelector('.container').appendChild(container);
                    }    
                    const sala = document.createElement('h1');
                    sala.id = 'salas_' + item.id_sala;
                    sala.innerText = "Sala: " + item.sala;

                    const nome = document.createElement('h1');
                    nome.id = 'nomes_' + item.id_sala;
                    nome.innerText = "Nome: " + item.nome;

                    const posicao = document.createElement('p');
                    posicao.id = 'posicaos_' +item.id_sala;
                    posicao.innerText = "Posição: #" + item.id;

                    const data = document.createElement('p');
                    data.id = 'datas_' + item.id_sala;
                    data.innerText = "Data e hora: " + item.data;

                    const botao = document.createElement('a');
                    botao.className = 'btn btn-primary';
                    botao.href = '<?= base_url("/proximo/") ?>' + item.id;
                    botao.innerHTML = '<i class="bi bi-bag-plus-fill"></i> Proximo';

                    container.appendChild(sala);
                    container.appendChild(nome);
                    container.appendChild(posicao);
                    container.appendChild(data);
                    container.appendChild(botao);
                    tocarAudio();

                }
            
        

    });
       }
    });
}

// chama imediatamente
chamarAjax();
function tocarAudio() {
    const audio = document.getElementById('audioAviso');
    if (audio) {
        audio.currentTime = 0; // reinicia
        audio.play().catch(() => {});
    }
}
// chama a cada 2 segundos
setInterval(chamarAjax, 2000);
</script>