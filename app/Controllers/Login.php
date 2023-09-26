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
        $likeConditions = [];
        foreach($c as $r){
            array_push($columnas,$r['name']);            
            if($r['search']['value']!==''){
                $valor = '%' . $r['search']['value'] . '%';
                $likeConditions[] = "{$r['name']} LIKE '$valor'";
            }  
            
        }
        
       
        if(count($likeConditions)>0){
            $likeClause = implode(' OR ', $likeConditions);
            $m->where($likeClause,null,false);
        }

        $totalfiltro = $m->countAllResults();

        $m->select($columnas);
        if(count($likeConditions)>0){
            $likeClause = implode(' OR ', $likeConditions);
            $m->where($likeClause,null,false);
        }

        $index = $p['order'][0]['column'];
        $order = $p['order'][0]['dir'];
        
        $m->orderBy($columnas[$index], $order);        
        $m->limit($offset,$limit);
        $query = $m->get();
 
        $query = $query->getResultArray();

        
        $data = [];

        foreach ($query as $row) {
            $data[] = array_values($row);
        }

       // print_r($data);die;

        $DATA = [ "draw"=> $draw,
        "recordsTotal"=> $total,
        "recordsFiltered"=> $totalfiltro,
        "data"=>$data];
        echo json_encode($DATA);
    }
}
