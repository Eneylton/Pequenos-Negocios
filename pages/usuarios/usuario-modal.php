<?php

use App\Entidy\Acesso;
use App\Entidy\Cargo;
use App\Entidy\Usuario;

require __DIR__ . '../../../vendor/autoload.php';

$contador = 0;
$dados = "";
$select1 = "";
$selected = "";
$select2 = "";

$param = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$value = Usuario::getID('u.id as id,
u.nome as nome,
u.email as email,
u.senha as senha,
c.id as id_cargo,
c.nome as cargo,
a.id as id_acesso,
a.nivel as acesso','usuarios AS u
INNER JOIN
cargos AS c ON (u.cargos_id = c.id)
INNER JOIN
acessos AS a ON (u.acessos_id = a.id)','u.id='.$param, 'null',null);

$id                 = $value->id;
$id_cargo           = $value->id_cargo;
$id_acesso          = $value->id_acesso;
$nome               = $value->nome;
$email              = $value->email;
$cargo              = $value->cargo;
$acesso             = $value->acesso;
$senha              = $value->senha;

$cargos = Cargo :: getList('*','cargos',null, 'nome ASC',null);

foreach ($cargos as $item) {
   if($item->id == $id_cargo ){

      $selected = "selected";
   }else{
      $selected = "";

   }

   $select1 .= '<option value="' . $item->id .'"  '.$selected.'>' . $item->nome . '</option>';
}


$acessos = Acesso :: getList('*','acessos',$id_acesso , 'nivel ASC',null);

foreach ($acessos as $item) {
  
   if($item->id == $id_acesso ){

      $selected = "selected";
   }else{
      $selected = "";

   }
   
   $select2 .= '<option value="' . $item->id . '" '.$selected.'>' . $item->nivel . '</option>';
}



$dados .= ' 
               <input type="hidden" name="id" value="'.$id.'">

               <div class="form-group">
               <label>Nome</label>
               <input type="text" class="form-control" name="nome" value="'.$nome.'" required>
               </div>

               <div class="form-group">
               <label>Email</label>
               <input type="email" class="form-control" name="email" value="'.$email.'" required>
            </div>

            <div class="row">
            <div class="col-6">
            <div class="form-group">
                    <label>Cargos</label>
                    <select class="form-control select" style="width: 100%;" name="cargos_id">
                       
                      '.$select1.'

                    </select>
                 </div>

          
            </div>
           
            <div class="col-6">

            <div class="form-group">
                    <label>Nível de acesso</label>
                    <select class="form-control select" style="width: 100%;" name="acessos_id"  >
                      
                        
                       '.$select2.'

                    </select>
                 </div>
            
            </div>

            <div class="col-6">

            <div class="form-group">
            <label>Senha</label>
            <input type="password" placeholder="Senha" id="password" class="form-control" name="senha"  required >
            </div>

            </div>

            <div class="col-6">

            <div class="form-group">
            <label>Confirma Senha</label>
            <input type="password" placeholder="Confirme Senha" id="confirm_password" class="form-control" required>
            </div>

            </div>
           
           </div>
            
          ';

                $retorna = ['erro' => false, 'dados' => $dados];

                echo json_encode($retorna);
