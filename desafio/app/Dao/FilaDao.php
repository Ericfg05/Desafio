<?php 
namespace App\Dao;

use App\Models\Fila;
use App\Models\Sala;

class FilaDao{

    private $salaController;
    private $fila;
    private $sala;
    public function __construct(){
        //$this->salaController = new SalaController();
        $this->fila = new Fila();
        $this->sala = new Sala();
    } 

    public function getValorMenor() { 
        $db      = db_connect();
        $id = $this->sala->findAll();

        foreach($id as $ids){
        $query = $db->query('SELECT MIN(fila_id) AS min_fila_id from fila where fila_status = 1 and Date(fila_data) = CURDATE() and fila_sala_id ='. $ids->sala_id);
        $result = $query->getRow();
        
                if($result->min_fila_id !== null){
                   // var_dump($result->min_fila_id);
                    $fi =  $this->fila->find($result->min_fila_id);
                // var_dump($fi);
                    $resultado[] =[
                        'id' => $fi->fila_id ?? NULL ,
                        'nome'=> $fi->fila_nome ?? null,
                        'data' => $fi->fila_data ?? null,
                        'hora' => $fi->fila_hora ?? null,
                        'status' => $fi->fila_status ?? null,
                        'sala' => $fi->fila_sala_id ?? null,
                        'atendimento' => date('d/m/Y H:i:s') ?? null
                    ];
            }
   
    }
        
         $data['fila'] = $resultado ?? "NULL";
   // var_dump($data['fila']);
        return $data['fila'];
    }
        
    
           
    }





?>