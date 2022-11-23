<style>
    #lord{
        overflow-y: auto;
        height: 500px;
    }
</style>
<link rel="stylesheet" type="text/css" href="estilos/estilos.css" />

<?php        

    // DEBUGGING
    // print '<pre>';
    //     print_r($_POST);
    // print '</pre>';

    // CONEXAO
    include('conexao.php');
    
?>
    <br/>
    <form action="limpar_tabela.php" method="post">
    <button>Clique aqui para limpar a tabela</button>
    </form>
    <form action="cadastro.php" method="post">
    <button>Cadastrar [ + ]</button>
    </form>

    <table border="1px">
        <tr align="center">
            <td>ID</td>
            <td>NAME</td>
            <td>POST</td>
            <td>DELETE</td>
            <td>EDIT</td>
        </tr>
<?php 

$arr = Array();

$sql = "SELECT COUNT(*) FROM `team`;";
$results = mysqli_query($conexao,$sql);   
$linhas = mysqli_fetch_assoc($results);

$limitador = $linhas['COUNT(*)'];
$limitador = intval($limitador);
$limitador = ($limitador += 100);
// print $limitador;

for($i = 0;$i < $limitador;$i++){
    
        $sql = "SELECT * FROM `team` WHERE id = '$i'";
        $limi = mysqli_query($conexao,$sql);
        $linhas = mysqli_fetch_assoc($limi);
        // DEBUGGING
        // print '<pre/>';
        // print_r($linhas);
        // print '</pre>';
        $arr[] = $linhas;
        if($i != 0){    
            if(isset($linhas)){
?> 
        <tr>
            <td><?php print($arr[$i]['id']);?></td>
            <td><?php print($arr[$i]['name']);?></td>
            <td><?php print($arr[$i]['post']);?></td>
            <form action="drop_user.php?<?php print 'usuario='. $arr[$i]['id'] ?>" method="post">
            <td align="center"><button type="submit">[ X ]</button></td>
            </form>
            <form action="edit_user.php?<?php print 'usuario='. $arr[$i]['id'] ?>" method="post">
                <input type="hidden" name="id" value="<?php print($arr[$i]['id']); ?>">
                <input type="hidden" name="name" value="<?php print($arr[$i]['name']); ?>">
                <input type="hidden" name="post" value="<?php print($arr[$i]['post']); ?>">
            <td align="center"><button type="submit">[ EDIT ]</button></td>
            </form>
        </tr>
<?php } } }

// DEBUGGING
// print '<pre>';
//     print_r($arr[0]);
// print '</pre>';
?>
    </table>
            </div>

    <br/>
   