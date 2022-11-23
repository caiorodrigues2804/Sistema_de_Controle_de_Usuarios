<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Usuários</title>
    <style>
        .principal{
            /* width:50%; */
            margin: 0 auto;
            padding: 20px;            
            background-color:#fff;
            border:1px solid #e3d3d3;
            border-radius: 5px;
        }
        body{
            background: #eaeaea;
            padding: 20px;
            font-family: arial;
            font-size: 18px;
        }

        label{display:block;font-weight:bold;}

        .espaco{ height: 15px;display:block;}

        input{font-size: 16px; padding:5px; }

        .titulo{font-weight:bold;}

    </style>
</head>
<body>
        <div class="principal">
        
        <?php 

        if(isset($_GET['p'])){

            $pagina = $_GET['p'] . ".php";

            if(is_file("conteudo/$pagina"))
                include("conteudo/$pagina");
            else 
                include("conteudo/404.php");

        }else{
            include("conteudo/inicial.php");
        }

        ?>

        </div>
</body>
</html>