<div class="container" id="containers">

<?php if ($resultado == "NULL") { ?>

    <h1 id="nUser">Nenhum Usuario aguardando na fila</h1>
  

<?php } else { ?>
    <h1 class="mb-5 mt-2" style="font-size: 50pt;" id="atendimento">Atendimento</h1>

    <div id="card3" class="d-flex flex-wrap gap-3 mt-3">
        <?php foreach ($resultado as $rs): ?>
            <div id="cartao_<?=  $rs['sala_id'] ?>" class="card bg-primary text-white mb-4"
                 style="width: calc(50% - 1rem); min-width: 18rem;">

                <div class="card-header" id="header_<?= $rs['sala_id']?>">
                    <h2 id="sala_<?= $rs['sala_id'] ?>">
                        Sala: <?= $rs['sala'] ?>
                    </h2>
                </div>

                <div class="card-body " id="card_<?= $rs['sala_id'] ?>">
                    <h3 id="nome_<?= $rs['sala_id'] ?>">
                        Nome: <?= $rs['nome'] ?>
                    </h3>
                    <h4 id="posicao_<?= $rs['sala_id'] ?>">
                        Posição: #<?= $rs['id'] ?>
                    </h4>
                    <h5 id="data_<?= $rs['sala_id'] ?>">
                        <?= $rs['atendimento'] ?>
                    </h5>
                </div>

            </div>
        <?php endforeach; ?>

    </div>

<?php } ?>

</div>

<script>
    function chamarAjax() {
    $.ajax({
        url: '<?= base_url("/listar") ?>',
        type: 'GET',
        cache: true,
        dataType: 'json',
       success: function (response) {

    response.forEach(item => {
        const aviso = document.getElementById('nUser');
        let container = document.getElementById('card_'+item.sala_id);
        let container3 = document.getElementById('card3');
        let containers = document.getElementById('containers');
        let cards = document.getElementById('cartao_'+item.sala_id);
        let header = document.getElementById('header_'+item.sala_id);
        let atendimento = document.getElementById('atendimento');
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
            
          /*if (!container) {
                container = document.createElement('div');
                container.className = 'card_'+item.sala_id;
                document.querySelector('.container').appendChild(container);
            } */
            const atendimento = document.createElement('h1');
                    atendimento.id = 'atendimento';
                    atendimento.innerText = "Atendimento";
                    atendimento.className = "mb-5 mt-2";
                    atendimento.style.fontSize = "50pt";
                    document.querySelector('.container').appendChild(atendimento);
             if (!container3) {
                container3 = document.createElement('div');
                container3.className = 'd-flex flex-wrap gap-3 mt-3';
                 container3.id = 'card3'; //importante por isso
                document.querySelector('.container').appendChild(container3); // aqui sempre vai colocar sempre quem vai adicionar esse elemento que ta sendo criado
            } 
            if(!cards){
                cards = document.createElement('div');
                    cards.className= 'card bg-primary mb-4 text-white cards_'+item.sala_id;
                    cards.id = 'cartao_'+item.sala_id;
                    cards.style.width = 'calc(50% - 1rem)';
                    cards.style.minWidth= '18rem';
                    document.querySelector('#card3').appendChild(cards);
            }

            if(!header){
                header = document.createElement('div');
                    header.className = 'card-header';
                    header.id = 'header_'+item.sala_id;
                    document.querySelector('#cartao_'+item.sala_id).appendChild(header); 
            }

            if (!container) {
                container = document.createElement('div');
                container.className = 'card-body';
                 container.id = 'card_' + item.sala_id; 
                document.querySelector('#cartao_'+item.sala_id).appendChild(container);
            } 
                    
                    

                    const sala = document.createElement('h2');
                    sala.id = 'sala_' + item.sala_id;
                    sala.innerText = "Sala: " + item.sala;

                    const nome = document.createElement('h3');
                    nome.id = 'nome_' + item.sala_id;
                    nome.innerText = "Nome: " + item.nome;

                    const posicao = document.createElement('h4');
                    posicao.id = 'posicao_' +item.sala_id;
                    posicao.innerText = "Posição: #" + item.id;

                    const data = document.createElement('h5');
                    data.id = 'data_' + item.sala_id;
                    data.innerText = "Data e hora: " + item.data;

                   
                    header.appendChild(sala);
                    container.appendChild(nome);
                    container.appendChild(posicao);
                    container.appendChild(data);
                    cards.appendChild(header);
                    cards.appendChild(container);
               
        }else if(posicao == "Posição #: "+item.id){
                   

        }else if(!nomeEl && cards === null) {
        console.log('aquis');
        if(!cards){
                cards = document.createElement('div');
                    cards.className= 'card bg-primary text-white mb-4 cards_'+item.sala_id;
                    cards.id = 'cartao_'+item.sala_id;
                    cards.style.width = 'calc(50% - 1rem)';
                    cards.style.minWidth= '18rem';
                    document.querySelector('#card3').appendChild(cards);
            }
         if(!header){
            header = document.createElement('div');
            header.className = 'card-header';
            header.id = 'header_'+item.sala_id;
            document.querySelector('#cartao_'+item.sala_id).appendChild(header); 
        }  
        if (!container) {
                container = document.createElement('div');
                container.className = 'card-body';
                 container.id = 'card_' + item.sala_id; 
                document.querySelector('#cartao_'+item.sala_id).appendChild(container);
            }   
           const sala = document.createElement('h2');
                    sala.id = 'sala_' + item.sala_id;
                    sala.innerText = "Sala: " + item.sala;

                    const nome = document.createElement('h3');
                    nome.id = 'nome_' + item.sala_id;
                    nome.innerText = "Nome: " + item.nome;

                    const posicao = document.createElement('h4');
                    posicao.id = 'posicao_' +item.sala_id;
                    posicao.innerText = "Posição: #" + item.id;

                    const data = document.createElement('h5');
                    data.id = 'data_' + item.sala_id;
                    data.innerText = "Data e hora: " + item.data;



        header.appendChild(sala);
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
// 
// chama a cada 2 segundos (2000 ms)}
setInterval(chamarAjax, 5000);

    
</script>

    