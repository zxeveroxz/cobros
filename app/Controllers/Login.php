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
        $total = $m->countAll();
        //d($r);

        $p = $this->request->getPost();
       
        $draw= $this->request->getPost('draw');
        $limit = $this->request->getPost('start');
        $offset = $this->request->getPost('length');

        $c = $this->request->getPost('columns');
        $columnas=[];
        foreach($c as $r){
            array_push($columnas,$r['name']);            
        }
        
        $query = $m->select($columnas)->orderBy('CODCLIENTE', 'desc')->limit($offset,$limit)->get()->getResultArray();
        $data = [];

        foreach ($query as $row) {
            $data[] = array_values($row);
        }

       // print_r($data);die;

        $DATA = [ "draw"=> $draw,
        "recordsTotal"=> $total,
        "recordsFiltered"=> $total,
        "data"=>$data];
        echo json_encode($DATA);
    }
}
