<?php 

require __DIR__.'../../../vendor/autoload.php';

use App\Entidy\Tipo;
use App\Session\Login;

Login::requireLogin();

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$value = Tipo::getID('*','tipo',$_GET['id'],null,null);

if(!$value instanceof Tipo){
    header('location: index.php?status=error');

    exit;
}



if(!isset($_POST['excluir'])){
    
 
    $value->excluir();

    header('location: tipo-list.php?status=del');

    exit;
}

