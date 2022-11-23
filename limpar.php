<?php 

include('classe/conexao.php');

$sql = "TRUNCATE TABLE `usuario`";

mysqli_query($conexao, $sql);

print '<style>*{font-family:arial;}</style>';
print '<br/><h3>Tabela "Usuário" limpado com sucesso</h3>';

echo '
    <script>
        setTimeout(function(){
            window.location.href = "index.php";
        }, 3000);
    </script>
';


?>

