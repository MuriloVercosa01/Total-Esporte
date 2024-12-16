<?php

include("conexao.php");
// salvarEdit.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    $id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : '';
    $subcategoria = isset($_POST['subcategoria']) ? $_POST['subcategoria'] : '';
    $id_subcategoria = isset($_POST['id_subcategoria']) ? $_POST['id_subcategoria'] : '';

    if($categoria === "" && $id_categoria === ""){
        // edição caso seja subcategoria
        $sql = "UPDATE sub_categoria SET s_categoria = ? WHERE sub_categoria.id_sub_categoria = ?;";

        $result = $conexao->prepare($sql);

        if ($result === false) {
            die('Erro na preparação da consulta: ' . $conexao->error);
        }

        $result->bind_param("si", $subcategoria, $id_subcategoria);

        $result->execute();
        

        // Ou você pode enviar uma resposta JSON para o JavaScript
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'Dados recebidos com sucesso']);

        exit;
    }else{
        // edição de categoria
        $sql = "UPDATE categoria SET nome_categoria = ? WHERE categoria.id_categoria = ?;";

        $result = $conexao->prepare($sql);

        if ($result === false) {
            die('Erro na preparação da consulta: ' . $conexao->error);
        }

        $result->bind_param("si", $categoria, $id_categoria);

        $result->execute();
        

        // Ou você pode enviar uma resposta JSON para o JavaScript
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'Dados recebidos com sucesso']);

        exit;
    }
}
?>