<?php

namespace App\Controllers;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\BaseController;
use App\Dao\UsuarioDao;
use App\Models\Sala;
use App\Models\Usuario;
use DateTime;

class UsuarioController extends BaseController
{
    private $sala;
    private $user;
    public function __construct()
    {
        $this->sala = new Sala();
        $this->user = new Usuario();
        helper('functions');

    }   
    public function index(){
        return view('/usuario_layout.php');
    }

    public function login(){
        $nome = $_POST['usuario'];
        $senha = $_POST['senha'];
        if(empty($nome)){
            $data['msg'] = msg('Usuario está vazio','danger');
            return view('/usuario_layout.php', $data);
        }else if(empty($senha)){
            $data['msg'] = msg('Senha está vazia','danger');
            return view('/usuario_layout.php', $data);
        }else{
            $senha = md5($senha);
            $where = array('login_nome' => $nome, 'login_senha' => $senha);
            $value = $this->user->where($where)->first();
            
            if($value !==null && !empty($value)){
                $session = session();
                $session->set('nome', $value->login_nome);
                $session->set('sala', $value->login_sala_id);
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
                    'sala' => $valorSala->sala_nome
                ];
           
            }   

            $datas['resultado'] = $rs;// precisa tratar se não tiver usuario.
            }
                return view('/layoutAdmin.php', $datas);
            }else{
                $data['msg'] = msg('Usuario e Senha não encontrado','danger');
                return view('/usuario_layout.php', $data);
            }
        }
        

    }
    public function jsonUser(){
          
            
            
           
            
                $user = new UsuarioDao();
               $user = $user->getSalas();
               if($user == "NULL"){
                    
               }else{
                foreach($user as $vs){
               
                $valorSala = $this->sala->find($vs['sala']) ;   
                $data = new DateTime($vs['data']);
                $rs[] = [
                    'id' => $vs['id'],
                    'nome' => $vs['nome'],
                    'data' => $data->format('d/m/Y'),
                    'sala' => $valorSala->sala_nome
                ];
           
                }
                return $this->response->setjson($rs);
        }
    }

}

