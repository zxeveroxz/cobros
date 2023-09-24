<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Model;

class Login extends BaseController
{
    public function index()
    {

        $m = Model('Demo');
        $r = $m->findAll(100);
        dd($r);
        return "esto es para vrear la vista 2";
    }
}
