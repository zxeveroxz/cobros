<?php
$servidor = "25.15.243.250";
$base = "DBFREST";
$user="sa";
$pass="masterkey";
$info = array('Database'=>$base,'UID'=>$user,'PWD'=>$pass,"TrustServerCertificate"=>true);
$conex= sqlsrv_connect($servidor,$info);

if($conex===false){

    $stmt = sqlsrv_query($conex, "select TOP 50 * from CLIENTES");
    print_r(sqlsrv_fetch_array($stmt));
}else{
    die(print_r(sqlsrv_errors(),true));
}



?>
