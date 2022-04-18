<?php

use App\Entidy\Acesso;

require __DIR__ . '../../../vendor/autoload.php';

$dados = "";
$contador = 0;

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$value = Acesso::getID('*','acessos',$id ,null,null);

$id_prod = $value->id;
$nivel = $value->nivel;

$dados .= '<div class="row">

            <div class="col-12">
               <div class="form-group">
               <input type="hidden" name="id" value="'.$id.'">
               <label>Produto</label>
               <input style="text-transform:uppercas" type="text" class="form-control" name="nivel" value="'.$nivel.'">
               </div>
            </div>

          </div>
            


';

                $retorna = ['erro' => false, 'dados' => $dados];

                echo json_encode($retorna);
