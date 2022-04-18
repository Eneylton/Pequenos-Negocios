<?php
require __DIR__ . '../../../vendor/autoload.php';

use   App\Entidy\Acesso;
use   \App\Session\Login;

define('TITLE','Lista de Acessos');
define('BRAND','Acessos');


Login::requireLogin();


$listar = Acesso::getList('*','acessos',null, 'id desc',null);

include __DIR__ . '../../../includes/layout/header.php';
include __DIR__ . '../../../includes/layout/top.php';
include __DIR__ . '../../../includes/layout/menu.php';
include __DIR__ . '../../../includes/layout/content.php';
include __DIR__ . '../../../includes/acesso/acesso-form-list.php';
include __DIR__ . '../../../includes/layout/footer.php';

?>

<script>

async function Editar(id){
    const dadosResp = await fetch('acesso-modal.php?id=' + id);
    const result = await dadosResp.json();
  
    const editModal = new bootstrap.Modal(document.getElementById("editModal"));
    editModal.show();
    document.querySelector(".edit-modal").innerHTML = result['dados'];
 
}

</script>
