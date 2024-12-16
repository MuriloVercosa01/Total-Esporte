<?php
    if( !empty($_POST['img']) && !empty($_POST['modelo']) && !empty($_POST['categoria']) && !empty($_POST['subcategoria'])&& !empty($_POST['desc_breve']) && !empty($_POST['valor']) ){
        // caso todos os dados tenham sido enviados
        $_img = $_POST['img'];
        $_modelo = $_POST['modelo'];
        $_categoria = $_POST['categoria'];
        $_subcategoria = $_POST['subcategoria'];
        $_desc = $_POST['desc_breve'];
        $_valor = $_POST['valor'];
        
        include_once('conexao.php');

        if ($conexao->connect_error){
            die('a conexão falhou:' . $conexao->connect_error);
        }

        $sql = "SELECT * FROM sub_categoria WHERE id_sub_categoria = ? AND id_categoria = ?;";

        $stmt = $conexao->prepare($sql);

        $stmt->bind_param("ss",$_subcategoria,$_categoria);

        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows === 0){
            echo' <script>
                    alert("subcategoria relacionada de forma incorreta a categoria");

                    redirecionar("http://localhost/pwII-projeto-total_esporte-/TOTAL_ESPORTES/addprodutos.php");

                    function redirecionar(url){
                        window.location.href = url;
                    } 
                  </script> ';
        }else{
            $sql = 'INSERT INTO produto (imagem,modelo,id_categoria,id_subcategoria,desc_breve,preco) VALUES (?,?,?,?,?,?)';

            $stmt = $conexao->prepare($sql);
    
            $stmt->bind_param("sssssd",$_img,$_modelo,$_categoria,$_subcategoria,$_desc,$_valor);
    
            $stmt->execute();
            //dados inseridos no banco de dados
            echo('<script>
                    alert("produto cadastrado com sucesso");
    
                    redirecionar("http://localhost/pwII-projeto-total_esporte-/TOTAL_ESPORTES/addprodutos.php");
    
                    function redirecionar(url){
                        window.location.href = url;
                    } 
                </script>');
        }
    } else{
        //caso algum campo não tenha sido preenchido
        echo('há campos não preenchidos');
    }
?>