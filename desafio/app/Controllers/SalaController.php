<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Sala;
use CodeIgniter\HTTP\ResponseInterface;

class SalaController extends BaseController
{
    private $sala;
    public function __construct(){
        $this->sala = new Sala();
    }
    
    public function buscarSala() : Array
    {
         return $this->sala->findAll();
    }
}
