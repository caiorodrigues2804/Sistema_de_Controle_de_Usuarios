<?php 

    include('conexao.php');

    if(isset($_GET['limpador'])){
        if($_GET['limpador'] == 1){
            $sql = "TRUNCATE TABLE `team`";
            mysqli_query($conexao,$sql);
            echo '
                <script>
                alert("Tabela limpada com sucesso");
                location.href = "fetchassoc.php";
                </script>
                 ';
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <script>
        let conf;
        conf = window.confirm('Tem certeza que deseja limpar a tabela??');

        if(conf){
            location.href = 'limpar_tabela.php?limpador=1';
        } else{
            location.href = 'fetchassoc.php';
        }

    </script>
    
</body>
</html>