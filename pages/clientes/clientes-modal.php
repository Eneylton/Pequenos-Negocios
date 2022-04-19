

<?php

use App\Entidy\Clientes;

require __DIR__ . '../../../vendor/autoload.php';

$dados = "";
$contador = 0;

$param = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$value = Clientes::getID('*','clientes',$param ,null,null);

$id            = $value->id;
$nome          = $value->nome;
$email          = $value->email;
$telefone      = $value->telefone;
$cep           = $value->cep;
$localidade    = $value->localidade;
$logradouro    = $value->logradouro;
$numero        = $value->numero;
$bairro        = $value->bairro;
$complemento   = $value->complemento;
$uf            = $value->uf;

$dados .= '<div class="row">

            <div class="col-12">
               <div class="form-group">
               <input type="hidden" name="id" value="'.$id.'">
               <label>Nome</label>
               <input style="text-transform:uppercas" type="text" class="form-control" name="nome" value="'.$nome.'">
               </div>
            </div>

           
            <div class="col-8">
            <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" value="'.$email.'">
            </div>

            </div>

            <div class="col-4">

            <div class="form-group">
                  <label>Telefone</label>
                  <input type="text" class="form-control" name="telefone" id="cel" value="'.$telefone.'" >
               </div>

            </div>

            <div class="col-2">
            <div class="form-group">
                  <label>CEP</label>
                  <input type="text" class="form-control" name="cep" id="cep2" onkeyup="Cep2()" value="'.$cep.'">
               </div>
            </div>
            <div class="col-6">
            <div class="form-group">
                  <label>Logradouro</label>
                  <input type="text" class="form-control" name="logradouro" id="logradouro" value="'.$logradouro.'">
               </div>
            </div>
            <div class="col-4">
            <div class="form-group">
                  <label>Bairro</label>
                  <input type="text" class="form-control" name="bairro" id="bairro1" value="'.$bairro.'">
               </div>
            </div>

            <div class="col-2">
            <div class="form-group">
                     <label>Nº</label>
                     <input type="text" class="form-control" name="numero" id="numero1" value="'.$numero.'">
                  </div>
            </div>
            <div class="col-4">
            <div class="form-group">
                     <label>Complemento</label>
                     <input type="text" class="form-control" name="complemento" value="'.$complemento.'">
                  </div>
            </div>

            <div class="col-3">
            <div class="form-group">
                     <label>Cidade</label>
                     <input type="text" class="form-control" name="localidade" id="cidade1" value="'.$localidade.'">
                  </div>
            </div>
            <div class="col-3">

            <div class="form-group">
                     <label>Estado</label>
                     <input type="text" class="form-control" name="uf" id="uf1" value="'.$uf.'">
                  </div>

            </div>

          </div>';

                $retorna = ['erro' => false, 'dados' => $dados];

                echo json_encode($retorna);
?>

