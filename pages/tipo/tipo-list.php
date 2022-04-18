<?php
require __DIR__ . '../../../vendor/autoload.php';

use App\Entidy\Tipo;
use App\Session\Login;

define('TITLE','Lista de Tipo');
define('BRAND','Tipo');

Login::requireLogin();

$listar = Tipo::getList('*','tipo',null, 'id desc',null);

include __DIR__ . '../../../includes/layout/header.php';
include __DIR__ . '../../../includes/layout/top.php';
include __DIR__ . '../../../includes/layout/menu.php';
include __DIR__ . '../../../includes/layout/content.php';
include __DIR__ . '../../../includes/tipo/tipo-form-list.php';
include __DIR__ . '../../../includes/layout/footer.php';

?>

<script>

async function Editar(id){
    const dadosResp = await fetch('tipo-modal.php?id=' + id);
    const result = await dadosResp.json();
  
    const editModal = new bootstrap.Modal(document.getElementById("editModal"));
    editModal.show();
    document.querySelector(".edit-modal").innerHTML = result['dados'];
 
}

</script>
