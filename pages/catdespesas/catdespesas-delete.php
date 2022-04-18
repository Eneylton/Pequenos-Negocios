<?php 

require __DIR__.'../../../vendor/autoload.php';

use App\Entidy\Catdespesa;
use App\Session\Login;

Login::requireLogin();

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$value = Catdespesa::getID('*','catdespesas',$_GET['id'],null,null);

if(!$value instanceof Catdespesa){
    header('location: index.php?status=error');

    exit;
}

if(!isset($_POST['excluir'])){
     
    $value->excluir();

    header('location: catdespesas-list.php?status=del');

    exit;
}

