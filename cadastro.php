<link rel="stylesheet" type="text/css" href="estilos/estilos.css" />
<?php 
        include('conexao.php');

        // INSERÇÂO
        if($_POST){
            if(isset($_GET['cadastro'])){
            $sql = "INSERT INTO `team` (`name`,`post`)VALUES('$_POST[nome]','$_POST[descricao]');";
            mysqli_query($conexao,$sql);
            echo '<script>
                setTimeout(() => {
                    alert("Cadastrado realizado com sucesso");
                    location.href = "fetchassoc.php";
                }, 100)
                  </script>';
             }
        }
?>
<br/>
<form action="cadastro.php?cadastro=1" method="post">
    <fieldset style="width: 400px;">
        <legend>Cadastrar</legend>        
        
        <label>Nome:</label>
        <input name="nome" type="text" placeholder="Digite o nome"/>
        <br/>
        <br/>        
        <label>Descrição:</label>
        <input name="descricao" type="text" placeholder="Digite a descricao"/>        
        <br/>
        <br/>
        <button type="submit">Cadastrar</button>
        <button type="button" id="voltar">Voltar</button>
        <script>
            document.querySelector("#voltar").addEventListener("click",() => {
                location.href = "fetchassoc.php";
            })
        </script>
        </fieldset>

 
     
     
    
    
