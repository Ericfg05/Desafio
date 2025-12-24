<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Dao\FilaDao;
use App\Dao\UsuarioDao;
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
        
        date_default_timezone_set('America/Sao_Paulo');

        $valor = new FilaDao();
        $datas['sala'] = $this->sala->findAll();
        
      
        
        $value = $valor->getValorMenor();
       // $val = $resultado;
      //  var_dump($val);
      if($value == "NULL"){
        $datas['resultado'] = "NULL";
      }else{
        
        //var_dump($value);
       
            foreach($value as $vs){
              //  var_dump($vs);
                $valorSala = $this->sala->find($vs['sala']) ;   
                $data = new DateTime($vs['data']);
                $rs[] = [
                    'id' => $vs['id'],
                    'nome' => $vs['nome'],
                    'data' => $data->format('d/m/Y'),
                    'sala' => $valorSala->sala_nome,
                    'sala_id' =>  $valorSala->sala_id

                ];
           
            }
            $datas['resultado'] = $rs;
            /*$valorSala = $this->sala->find($value->fila_sala_id) ;      
            $datas['id'] = $value->fila_id;
            $datas['nome'] = $value->fila_nome;
            $datas['data'] = date('d/m/Y H:i:s');
            $datas['sala'] = $valorSala->sala_nome;*/
           /* $datas['id'] = '$value->fila_id';
            $datas['nome'] = '$value->fila_nome';
            $datas['data'] = 'date(d/m/Y H:i:s)';
            $datas['sala'] = '$valorSala->sala_nome';*/
          //  var_dump($datas);
          }
            return view('/FilaExpor', $datas);        
    }   
    public function jsonLista(){
          $valor = new FilaDao();
        $datas['sala'] = $this->sala->findAll();
        
      
        
        $value = $valor->getValorMenor();
       // $val = $resultado;
      //  var_dump($val);
      if($value == "NULL"){
        $datas['resultado'] = "NULL";
      }else{
        
        //var_dump($value);
       
            foreach($value as $vs){
              //  var_dump($vs);
                $valorSala = $this->sala->find($vs['sala']) ;   
                $data = new DateTime($vs['data']);
                $rs[] = [
                    'id' => $vs['id'],
                    'nome' => $vs['nome'],
                    'data' => $data->format('d/m/Y'),
                    'sala' => $valorSala->sala_nome,
                    'sala_id' =>  $valorSala->sala_id

                ];
           
            }
             
         return $this->response->setjson($rs);
    }
}

    public function proximo($id){
        // pegaria o proxima_sala. ou seja, o atual seria colocado status 0 e adicionado o proximo com a sala que deverá receber o novo atendente.
        $filas = $this->fila->find($id);
       // var_dump($filas);
        $datas = [
            'filas_status' => 0
        ];
        $this->fila->set('fila_status', 0);
        $this->fila->where('fila_id', $filas->fila_id);
        $this->fila->update();
        $user = new UsuarioDao();
               $user = $user->getSalas();
               if($user == "NULL"){
                  $datas['resultado'] = "NULL";
               }else{
                foreach($user as $vs){
               
                $valorSala = $this->sala->find($vs['sala']) ;   
                $data = new DateTime($vs['data']);
                $rs[] = [
                    'id' => $vs['id'],
                    'nome' => $vs['nome'],
                    'data' => $data->format('d/m/Y'),
                    'sala' => $valorSala->sala_nome,
                    'sala_id' => $valorSala->sala_id
                ];
           
            }   

            $datas['resultado'] = $rs;
            }
        return view('/layoutAdmin.php', $datas);
        //return view('/layoutAdmin.php');
        //
    }
}

