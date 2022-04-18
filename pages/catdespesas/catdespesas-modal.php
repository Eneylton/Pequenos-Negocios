<?php

use App\Entidy\Catdespesa;

require __DIR__ . '../../../vendor/autoload.php';

$dados = "";

$param = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$value = Catdespesa::getID('*','catdespesas',$param ,null,null);

$id = $value->id;
$nome = $value->nome;

$dados .= '<div class="row">

            <div class="col-12">
               <div class="form-group">
               <input type="hidden" name="id" value="'.$id.'">
               <label>Nome</label>
               <input style="text-transform:uppercase" type="text" class="form-control" name="nome" value="'.$nome.'">
               </div>
            </div>

          </div>';

$retorna = ['erro' => false, 'dados' => $dados];

echo json_encode($retorna);
