<?php

use App\Entidy\FormaPagamento;

require __DIR__ . '../../../vendor/autoload.php';

$dados = "";
$contador = 0;

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$value = FormaPagamento::getID('*','forma_pagamento',$id ,null,null);

$id_prod = $value->id;
$nome = $value->nome;

$dados .= '<div class="row">

            <div class="col-12">
               <div class="form-group">
               <input type="hidden" name="id" value="'.$id.'">
               <label>Produto</label>
               <input style="text-transform:uppercas" type="text" class="form-control" name="nome" value="'.$nome.'">
               </div>
            </div>

          </div>
            


';

                $retorna = ['erro' => false, 'dados' => $dados];

                echo json_encode($retorna);
