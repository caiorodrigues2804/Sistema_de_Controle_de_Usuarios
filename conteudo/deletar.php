<?php 

if(!$_GET['usuario']){
    echo '<script>
        alert("O usuário não foi informado para exclusão");
        location.href = "index.php"
         </script>';
} 

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Usuários</title>
</head>
<body>
    <script>
        let resultado = window.confirm('Tem certeza que deseja excluir??');
        if(resultado){
            location.href = "index.php?p=deletar_conf&usuario=<?php print $_GET['usuario'];?>";
        } else{
            location.href = 'index.php';
        }
    </script>
    
</body>
</html>