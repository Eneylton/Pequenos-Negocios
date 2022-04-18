<?php
require __DIR__ . '../../../vendor/autoload.php';

use App\Entidy\Acesso;
use App\Entidy\Cargo;
use   App\Entidy\Usuario;
use   \App\Session\Login;

define('TITLE','Lista de Usuários');
define('BRAND','Usuários');

Login::requireLogin();

$listar = Usuario::getList('u.id as id,
u.nome as nome,
u.email as email,
c.id as id_cargo,
c.nome as cargo,
a.id as id_acesso,
a.nivel as acesso','usuarios AS u    
INNER JOIN
cargos AS c ON (u.cargos_id = c.id)
INNER JOIN
acessos AS a ON (u.acessos_id = a.id)',null, 'u.nome ASC',null);

$cargos = Cargo :: getList('*','cargos',null, 'nome ASC',null);

$acessos = Acesso :: getList('*','acessos',null, 'nivel ASC',null);


include __DIR__ . '../../../includes/layout/header.php';
include __DIR__ . '../../../includes/layout/top.php';
include __DIR__ . '../../../includes/layout/menu.php';
include __DIR__ . '../../../includes/layout/content.php';
include __DIR__ . '../../../includes/usuario/usuario-form-list.php';
include __DIR__ . '../../../includes/layout/footer.php';

?>

<script>

async function Editar(id){
    const dadosResp = await fetch('usuario-modal.php?id=' + id);
    const result = await dadosResp.json();
  
    const editModal = new bootstrap.Modal(document.getElementById("editModal"));
    editModal.show();
    document.querySelector(".edit-modal").innerHTML = result['dados'];
 
}

</script>
