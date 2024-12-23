<?php
include('conexao.php');
header('Content-Type: application/json');
// Verifique se os parâmetros estão presentes no POST
$id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : null;
$id_subcategoria = isset($_POST['id_subcategoria']) ? $_POST['id_subcategoria'] : null; 
$id_produto = isset($_POST['id_produto']) ? $_POST['id_produto'] : null;

// Verifique se o id_categoria foi passado
if ($id_categoria !== null) {
    // Deleta da tabela categoria
    $catassoc = $conexao->query("SELECT s.id_sub_categoria FROM sub_categoria s JOIN categoria c ON s.id_categoria = c.id_categoria WHERE c.id_categoria =" . $id_categoria . ";");
    
    if($catassoc->num_rows > 0){
        //se houver subcategorias relacionadas a essa categoria

        $conexao->begin_transaction(); // Inicia uma transação

        try {
            while ($row = $catassoc->fetch_assoc()) {
                // Deleta os produtos associados à subcategoria
                $stmt1 = $conexao->prepare("DELETE FROM produto WHERE id_subcategoria = ?");
                $stmt1->bind_param("i", $row['id_sub_categoria']);
                $stmt1->execute();
                
                // Verifica se algum produto foi deletado
                if ($stmt1->affected_rows > 0) {
                    echo json_encode(["success" => true, "message" => "Produtos deletados com sucesso"]);
                }
    
                // Deleta a subcategoria
                $stmt2 = $conexao->prepare("DELETE FROM sub_categoria WHERE id_sub_categoria = ?");
                $stmt2->bind_param("i", $row['id_sub_categoria']);
                $stmt2->execute();
                
                // Verifica se a subcategoria foi deletada
                if ($stmt2->affected_rows > 0) {
                    echo json_encode(["success" => true, "message" => "Subcategoria deletada com sucesso"]);
                }
    
            }
    
            // Deleta a categoria
            $stmt3 = $conexao->prepare("DELETE FROM categoria WHERE id_categoria = ?");
            $stmt3->bind_param("i", $id_categoria);
            $stmt3->execute();
    
            // Verifica se a categoria foi deletada
            if ($stmt3->affected_rows > 0) {
                echo json_encode(["success" => true, "message" => "Categoria deletada com sucesso"]);
            } else {
                echo json_encode(["success" => false, "message" => "Nenhuma categoria encontrada"]);
            }
    
            // Se tudo ocorrer sem erro, confirma a transação
            $conexao->commit();
    
        } catch (Exception $e) {
            // Se ocorrer um erro, faz o rollback da transação
            $conexao->rollback();
            echo json_encode(["success" => false, "message" => "Erro ao deletar dados: " . $e->getMessage()]);
        } finally {
            // Fechar statements após a execução
            $stmt1->close();
            $stmt2->close();
            $stmt3->close();
        }
        
    }else{
        //se não houver subcategorias relacionadas
        $sql = "DELETE from categoria WHERE id_categoria =". $id_categoria . ";";
        $delete = $conexao->query($sql);

        if($delete->affected_rows > 0){
            echo json_encode(["success" => true, "message" => "Categoria deletada com sucesso"]);
        }else{
            echo json_encode(["success" => false, "message" => "Nenhuma categoria encontrada"]);
        }
        $delete->close();
    }
} 
// Verifique se o id_subcategoria foi passado
elseif ($id_subcategoria !== null) {
    // Deleta da tabela sub_categoria
    

    $conexao->begin_transaction();

    try {
        // Deleta a subcategoria
        $stmt = $conexao->prepare("DELETE FROM produto WHERE id_subcategoria = ?");
        $stmt->bind_param("i", $id_subcategoria);
        $stmt->execute();

        // Verifica se a subcategoria foi deletada
        if ($stmt->affected_rows > 0) {
            echo json_encode(["success" => true, "message" => "Subcategoria deletada com sucesso"]);
        } else {
            echo json_encode(["success" => false, "message" => "Nenhuma subcategoria encontrada"]);
        }

        // Deleta os produtos relacionados à subcategoria
        $stmt2 = $conexao->prepare("DELETE FROM sub_categoria WHERE id_sub_categoria = ?;");
        $stmt2->bind_param("i", $id_subcategoria);
        $stmt2->execute();

        if ($stmt2->affected_rows > 0) {
            echo json_encode(["success" => true, "message" => "Produtos relacionados à subcategoria deletados com sucesso"]);
        } else {
            echo json_encode(["success" => false, "message" => "Nenhum produto relacionado à subcategoria encontrado"]);
        }

        // Se ambas as operações foram bem-sucedidas, faz o commit da transação
        $conexao->commit();

        // Fechar statements
        $stmt->close();
        $stmt2->close();
    } catch (Exception $e) {
        // Se ocorrer um erro, faz o rollback da transação
        $conexao->rollback();
        echo json_encode(["success" => false, "message" => "Erro ao deletar dados: " . $e->getMessage()]);
    }
} elseif($id_produto !== null) {

    $stmt = $conexao->prepare("DELETE FROM produto WHERE id_produto = ?");
    $stmt->bind_param("i", $id_produto);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        echo json_encode(["success" => true, "message" => "Produto deletado com sucesso"]);
    }else{
        echo json_encode(["success" => false, "message" => "Nenhum produto correponde"]);
    }
}else {
    echo json_encode(["success" => false, "message" => "Parâmetro inválido"]);
}

?>