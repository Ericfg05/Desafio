<div class="container">
    <h1 class="mb-4 mt-3">Painel Administrativo</h1>

    <?php if ($resultado == "NULL") { ?>
        <h3 id="semUsuario">Nenhum usuario aguardando na fila</h3>
    <?php } else { ?>

        <?php foreach ($resultado as $rs): ?>
            <div class="card" id="card_<?= $rs['sala_id'] ?>" style="width: calc(50% - 1rem); min-width: 18rem;">
                <div class="card-header" id="header_<?= $rs['sala_id'] ?>">
                <h1 id="nomes_<?= $rs['sala_id'] ?>">Nome: <?= $rs['nome'] ?></h1>
                </div>
                <div class="card-body" id="body_<?= $rs['sala_id'] ?>">
                <h1 id="salas_<?= $rs['sala_id'] ?>">Sala: <?= $rs['sala'] ?></h1>

                <p id="posicaos_<?= $rs['sala_id'] ?>">Posição: #<?= $rs['id'] ?></p>
                <p id="datas_<?= $rs['sala_id'] ?>">Data e hora: <?= $rs['data'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
              <a class="btn btn-primary mt-3" href="<?= base_url("/proximo/".$rs['id']); ?>">
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
                let header = document.getElementById('header_'+item.id_sala);
                let body = document.getElementById('body_'+item.id_sala);

                let posicaoEl = document.getElementById('posicaos_' + item.id_sala);
                let posicao = posicaoEl ? posicaoEl.innerText : 'null';
            

                if (item.null) {

            

                }else if("Posição: #"+item.id == posicao){

                }else{
                    if (aviso) {aviso.remove()};

                    if (!container) {
                        container = document.createElement('div');
                        container.className = 'card';
                        container.style.width = 'calc(50% - 1rem)';
                        container.style.minWidth = '18rem';
                        container.id = 'card_'+item.id_sala;
                        document.querySelector('.container').appendChild(container);
                    }  
                    if (!header) {
                        header = document.createElement('div');
                        header.className ='card-header';
                        header.id = 'header_'+item.id_sala;
                    } 
                    if (!body) {
                        body = document.createElement('div');
                        body.className = 'card-body';
                        body.id = 'body_'+item.id_sala;
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
                    botao.className = 'btn btn-primary mt-3';
                    botao.href = '<?= base_url("/proximo/") ?>' + item.id;
                    botao.innerHTML = '<i class="bi bi-bag-plus-fill"></i> Proximo';

                    body.appendChild(sala);
                    header.appendChild(nome);
                    body.appendChild(posicao);
                    body.appendChild(data);
                    container.appendChild(header);
                    container.appendChild(body);
                    document.querySelector('.container').appendChild(botao);




                }
            
        

    });
       }
    });
}

// chama imediatamente
chamarAjax();

// chama a cada 2 segundos
setInterval(chamarAjax, 2000);
</script>