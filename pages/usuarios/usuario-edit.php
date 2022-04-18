<?php 

require __DIR__.'../../../vendor/autoload.php';

use App\Entidy\Usuario;
use App\Session\Login;


Login::requireLogin();



if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$usuarios = Usuario::getID('*','usuarios',$_GET['id'],null,null);


if(!$usuarios instanceof Usuario){
    header('location: index.php?status=error');

    exit;
}



if(isset($_GET['email'])){
    
    $usuarios->nome              = $_GET['nome'];
    $usuarios->email             = $_GET['email'];
    $usuarios->cargos_id         = $_GET['cargos_id'];
    $usuarios->acessos_id        = $_GET['acessos_id'];
    $usuarios->senha             = password_hash($_GET['senha'], PASSWORD_DEFAULT);
    $usuarios-> atualizar();

    header('location: usuario-list.php?status=edit');

    exit;
}


