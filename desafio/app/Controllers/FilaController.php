<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FilaController extends BaseController
{
    private $sala;
    public function __construct(){
        $this->sala = new SalaController();
    }    
    public function index()
    {
        $data['sala'] = $this->sala->buscarSala();
        return view('/layoutFila.php', $data);
    }
}
