<?php

function memorial(){
    ini_set('memory_limit','820M'); // Setting to 20M
    ini_set('sqlsrv.ClientBufferMaxKBSize','24M'); // Setting to 20M
    echo ini_get('memory_limit')."<br/>";
    echo ini_get('sqlsrv.ClientBufferMaxKBSize')."<br/>";
}