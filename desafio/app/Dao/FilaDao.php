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
        $db      = db_connect();;
        $query = $db->query('SELECT MIN(fila_id) AS min_fila_id from fila where fila_status = 1 and Date(fila_data) = CURDATE()');
        $result = $query->getRow();
       // var_dump( $result);
       $filas =  $this->fila->find($result->min_fila_id);
        //var_dump($filas);
        return $filas;
    }


}


?>