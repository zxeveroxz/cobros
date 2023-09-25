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

    public function index2(){
        
        return view('tabla');
    }

    public function tabla(){
        $m = Model('Demo');
        $r = $m->countAll();
        //d($r);

        $p = $this->request->getPost();
        d($p);

        $DATA = [ "draw"=> 1,
        "recordsTotal"=> $r,
        "recordsFiltered"=> $r];
        echo json_encode($DATA);
    }
}
