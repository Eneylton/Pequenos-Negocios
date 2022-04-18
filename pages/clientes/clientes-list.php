<?php
require __DIR__ . '../../../vendor/autoload.php';

use App\Db\Pagination;
use App\Entidy\Clientes;
use App\Session\Login;
use App\Webservice\ViaCEP;

define('TITLE', 'Lista de Clientes');
define('BRAND', 'Clientes');


if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $dadosCEP = ViaCEP::consultaCEP($id);

    $logradouro  = $dadosCEP['logradouro'];
    $bairro  = $dadosCEP['bairro'];
    $localidade  = $dadosCEP['localidade'];
    $uf  = $dadosCEP['uf'];
    $cep  = $dadosCEP['cep'];
} else {
    $id = "";
    $logradouro  = "";
    $bairro  = "";
    $localidade  = "";
    $uf  = "";
    $cep  = "";
}

Login::requireLogin();

$listar = Clientes::getList('*', 'clientes', null, 'id desc', null);


include __DIR__ . '../../../includes/layout/header.php';
include __DIR__ . '../../../includes/layout/top.php';
include __DIR__ . '../../../includes/layout/menu.php';
include __DIR__ . '../../../includes/layout/content.php';
include __DIR__ . '../../../includes/cliente/cliente-form-list.php';
include __DIR__ . '../../../includes/layout/footer.php';

?>

<script>
    async function Editar(id) {
        const dadosResp = await fetch('clientes-modal.php?id=' + id);
        const result = await dadosResp.json();

        const editModal = new bootstrap.Modal(document.getElementById("editModal"));
        editModal.show();
        document.querySelector(".edit-modal").innerHTML = result['dados'];

    }
</script>

<script>
    async function Cep() {

        $("#cep1").on("change", function() {

            var idCEP = $("#cep1").val();
            $.ajax({
                url: 'https://viacep.com.br/ws/' + idCEP + '/json',
                dataType: 'json',
                success: function(resposta) {

                    $("#logradouro1").val(resposta.logradouro);
                    $("#bairro1").val(resposta.bairro);
                    $("#cidade1").val(resposta.localidade);
                    $("#uf1").val(resposta.uf);
                    $("#numero1").focus();
                }

            })

        });
    }
</script>