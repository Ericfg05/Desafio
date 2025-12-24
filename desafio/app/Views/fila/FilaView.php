<?php ?>
    <div class="container" id="card3">
        <?php if($resultado == "NULL"){ ?>
            <h1 id="nUser">Nenhum Usuario aguardando na fila</h1>
            <audio id="audioAviso" src="/assets/doorbell-95038.mp3" preload="auto"></audio>

        <?php }else{?>
            <?php foreach ($resultado as $rs): ?>
           

            <div class="card_<?= $rs['sala_id'] ?>">
                <h1 id="sala_<?= $rs['sala_id'] ?>">Sala: <?= $rs['sala'] ?></h1>
                <h1 id="nome_<?= $rs['sala_id'] ?>">Nome: <?= $rs['nome'] ?></h1>
                <p id="posicao_<?= $rs['sala_id'] ?>">Posição: #<?= $rs['id'] ?></p>
                <p id="data_<?= $rs['sala_id'] ?>">Data e hora: <?= $rs['atendimento'] ?></p>
                <audio id="audioAviso" src="/assets/doorbell-95038.mp3" preload="auto"></audio>
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
        const aviso = document.getElementById('nUser');
        let container = document.getElementById('card_'+item.sala_id);
        let container3 = document.getElementById('card3');
        console.log(container);
        let salaEl =  document.getElementById('sala_'+item.sala_id);
        let sala = salaEl ? salaEl.innerHTML : "null";
               // console.log(sala);
               // console.log(item.sala);

        let nomeEl = document.getElementById('nome_' + item.sala_id);
        let nome = nomeEl ? nomeEl.innerText : 'null';
        
        let posicaoEl = document.getElementById('posicao_' + item.sala_id);
        let posicao = posicaoEl ? posicaoEl.innerText : 'null';

        let dataEl = document.getElementById('data_' + item.sala_id);
        let data = dataEl ? dataEl.innerText : 'null';
        console.log(posicao);
    if(aviso && !container){
         if (aviso ) {aviso.remove()};
            
          if (!container) {
                        container = document.createElement('div');
                        container.className = 'card_'+item.sala_id;
                        document.querySelector('.container').appendChild(container);
                    } 
                         const sala = document.createElement('h1');
                    sala.id = 'sala_' + item.sala_id;
                    sala.innerText = "Sala: " + item.sala;

                    const nome = document.createElement('h1');
                    nome.id = 'nome_' + item.sala_id;
                    nome.innerText = "Nome: " + item.nome;

                    const posicao = document.createElement('p');
                    posicao.id = 'posicao_' +item.sala_id;
                    posicao.innerText = "Posição: #" + item.id;

                    const data = document.createElement('p');
                    data.id = 'data_' + item.sala_id;
                    data.innerText = "Data e hora: " + item.data;

                   

                    container.appendChild(sala);
                    container.appendChild(nome);
                    container.appendChild(posicao);
                    container.appendChild(data);
               
        }else if(posicao == "Posição #: "+item.id){
                    console.log('aquiss');

        }else if(!nomeEl && container === null) {
        console.log('aquis');

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



        container3.appendChild(sala);
        container3.appendChild(nome);
        container3.appendChild(posicao);
        container3.appendChild(data);
       

    }else {
        console.log('aqui');
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
// 
// chama a cada 2 segundos (2000 ms)}
setInterval(chamarAjax, 5000);

    
</script>

    