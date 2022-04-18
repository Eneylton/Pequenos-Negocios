<?php
require __DIR__ . '../../../vendor/autoload.php';
use App\Db\Pagination;
use App\Entidy\Catdespesa;
use App\Session\Login;

define('TITLE','Lista de Despesas');
define('BRAND','Despesas');

Login::requireLogin();

$listar = Catdespesa::getList('*','catdespesas',null, 'nome ASC',null);

include __DIR__ . '../../../includes/layout/header.php';
include __DIR__ . '../../../includes/layout/top.php';
include __DIR__ . '../../../includes/layout/menu.php';
include __DIR__ . '../../../includes/layout/content.php';
include __DIR__ . '../../../includes/catdespesa/catdespesa-form-list.php';
include __DIR__ . '../../../includes/layout/footer.php';

?>

<script>

async function Editar(id){
    const dadosResp = await fetch('catdespesas-modal.php?id=' + id);
    const result = await dadosResp.json();
  
    const editModal = new bootstrap.Modal(document.getElementById("editModal"));
    editModal.show();
    document.querySelector(".edit-modal").innerHTML = result['dados'];
 
}

</script>

