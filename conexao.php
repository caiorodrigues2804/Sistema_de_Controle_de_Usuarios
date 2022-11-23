<?php     

    $host = "localhost"; //Nome do Host
    $usuario = "root"; //nome do usuário
    $senha = ""; //Senha
    $banco_de_dados = "mynotesoline"; //nome do banco de dados

    $conexao = mysqli_connect($host,$usuario,$senha,$banco_de_dados);

    if(!$conexao){
        print 'Ops!! ops aconteceu um imprevisto no banco de dados: ' . mysqli_error() . '<br/>';
    }
     