<?php ?>
    <div class="container">
        <?php if($resultado == "NULL"){ ?>
            <h1>Nenhum Usuario aguardando na fila</h1>
        <?php }else{?>
            <div id="card_3"></div>
            <?php foreach ($resultado as $rs): ?>
            <div class="card_<?= $rs['sala_id'] ?>" data-id="<?= $rs['id'] ?>">
                <h1 id="sala_<?= $rs['sala_id'] ?>">Sala: <?= $rs['sala'] ?></h1>
                <h1 id="nome_<?= $rs['sala_id'] ?>">Nome: <?= $rs['nome'] ?></h1>
                <p id="posicao_<?= $rs['sala_id'] ?>">Posição: #<?= $rs['id'] ?></p>
                <p id="data_<?= $rs['sala_id'] ?>">Data e hora: <?= $rs['data'] ?></p>
            </div>
        <?php endforeach; ?>
            <div id="listaSalas"></div>

        <?php }?>
 
        
    </div>
<script>
    function chamarAjax() {
    $.ajax({
        url: '<?= base_url("/listar") ?>',
        type: 'GET',
        cache: false,
        dataType: 'json',
       success: function (response) {

    response.forEach(item => {
           const container = document.getElementById('card_3');
        let salaEl =  document.getElementById('sala_'+item.sala_id);
        let sala = salaEl ? salaEl.innerHTML : "null";
               // console.log(sala);
               // console.log(item.sala);

        let nomeEl = document.getElementById('nome_' + item.sala_id);
        let nome = nomeEl ? nomeEl.innerText : 'null';
        console.log(nome);
        let posicaoEl = document.getElementById('posicao_' + item.sala_id);
        let posicao = posicaoEl ? posicaoEl.innerText : 'null';

        let dataEl = document.getElementById('data_' + item.sala_id);
        let data = dataEl ? dataEl.innerText : 'null';
       // console.log(posicao);
           if (!nomeEl) {

        const sala = document.createElement('h1');
        sala.id = 'sala_' + item.sala_id;
        sala.innerText = "Sala: " + item.sala;

        const nome = document.createElement('h1');
        nome.id = 'nome_' + item.sala_id;
        nome.innerText = "Nome: " + item.nome;

        const posicao = document.createElement('p');
        posicao.id = 'posicao_' + item.sala_id;
        posicao.innerText = "Posição: #" + item.id;

        const data = document.createElement('p');
        data.id = 'data_' + item.sala_id;
        data.innerText = "Data e hora: " + item.data;

        container.appendChild(sala);
        container.appendChild(nome);
        container.appendChild(posicao);
        container.appendChild(data);

    }else {
        document.getElementById('sala_' + item.sala_id).innerText =
            "Sala: " + item.sala;

        document.getElementById('nome_' + item.sala_id).innerText =
            "Nome: " + item.nome;

        document.getElementById('posicao_' + item.sala_id).innerText =
            "Posição: #" + item.id;

        document.getElementById('data_' + item.sala_id).innerText =
            "Data e hora: " + item.data;
    }
            
        

    });
       }
    })
}

// chama imediatamente
chamarAjax();

// chama a cada 2 segundos (2000 ms)}
setInterval(chamarAjax, 2000);
    
</script>

    