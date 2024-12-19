<?php 
  
    include("conexao.php");

    $teste = $_POST['teste'];

    $inserir = $pdo->prepare("insert into demo (teste)
                     values ('$teste')");
    $inserir->execute();
?>