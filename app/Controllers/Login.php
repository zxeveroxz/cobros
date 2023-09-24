<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Model;

class Login extends BaseController
{
    public function index()
    {
       
        echo ini_get('sqlsrv.ClientBufferMaxKBSize')."<br/>";

        $m = Model('Demo');
        $r = $m->findAll(200);
        dd($m);
        return "esto es para vrear la vista 2";
    }
}
