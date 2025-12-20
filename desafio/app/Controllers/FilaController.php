<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Dao\FilaDao;
use App\Models\Fila;
use App\Models\Sala;
use CodeIgniter\HTTP\ResponseInterface;
use DateTime;

class FilaController extends BaseController
{
    
    private $salaController;
    private $fila;
    private $sala;
    public function __construct(){
        $this->salaController = new SalaController();
        $this->fila = new Fila();
        $this->sala = new Sala();
        helper('functions');
    }    
    public function index()
    {
        $data['sala'] = $this->salaController->buscarSala();
        $data['nome'] = "";
        $data['salas_id'] = "";
        
        return view('/layoutFila.php', $data);
    }
    public function inserir(){
         date_default_timezone_set('America/Sao_Paulo');
        if(empty($_POST['nome'])){
            $datas['msg'] = msg('Nome em branco','error');
            $datas['sala'] = $this->salaController->buscarSala();
            return view('/layoutFila.php', $datas);
        }else if(empty($_POST['sala'])){
            $datas['msg'] = msg('Sala não selecionada','error');
            $datas['sala'] = $this->salaController->buscarSala();
            return view('/layoutFila.php', $datas);
        }else{
            $data['fila_nome'] = $_POST['nome'];
            $data['fila_sala_id'] = $_POST['sala'];
            $data['fila_data'] = date('Y-m-d');
            $data['fila_hora'] = date('H:i:s');
            $data['fila_status'] = 1;
            $numero = $this->fila->insert($data);
            $datas['sala'] = $this->salaController->buscarSala();
            $datas['msg'] = msg('Você foi adicionado na fila, você está na posição '.$numero.', aguarde!!!','success');
            return view('/layoutFila.php', $datas);
       }     
    }
    public function getFila(){
        
        
        $valor = new FilaDao();
       
        $value = $valor->getValorMenor();
         $valorSala = $this->sala->find($value->fila_sala_id) ;      
        $datas['id'] = $value->fila_id;
        $datas['nome'] = $value->fila_nome;
        $datas['data'] = $value->fila_data_atendimento;
        $datas['sala'] = $valorSala->sala_nome;
        return view('/FilaExpor', $datas);           
        }
    }

