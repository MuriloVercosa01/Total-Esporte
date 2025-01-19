<?php
    include("conexao.php");
    header('Content-Type: application/json');
    
    // echo json_encode(['success' => true, 'message' => 'Dados recebidos com sucesso']);
    if(isset($_REQUEST)){
       if(isset($_POST['coluna']) && isset($_POST['dado'])){
        echo json_encode(['success' => true, 'message' => 'coluna e dado presente na requisição']);
        if(isset($_POST['emailuser'])){
            echo json_encode(['success' => true, 'message' => 'email do usuario presente na requisição']);
        }else{
            echo json_encode(['success' => false, 'message' => 'email do ususario não esta presente na requisição']);
        }
       }else{
        echo json_encode(['success' => true, 'message' => 'coluna não está presente na requisão']);
       }
    }else{
        echo json_encode(['success' => false, 'message' => 'Sem requisição']);
    }
?>