
<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Exibe todas as variáveis do POST
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}
if (!empty($_POST['tipo']) && !empty($_POST['nome'])){

    include("conexao.php");

    if ($conexao === null) {
        die('Erro ao conectar ao banco de dados.');
    } else {
        echo 'Conexão bem-sucedida!';
    }
    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];
    $nome = $_POST['nome'];
    // tipo = 2, adicionar a subcategoria
    // tipo = 1, adicionar a categoria
    if($tipo == "1"){
        $sql = "INSERT INTO categoria(nome_categoria) VALUES ('". $nome . "');";

        $result = $conexao->query($sql);

        if($result === TRUE){
            echo ' <script>
                    alert("categoria adicionada com sucesso");

                    redirecionar("http://localhost/pwII-projeto-total_esporte-/TOTAL_ESPORTES/addCategoria.php");

                    function redirecionar(url){
                        window.location.href = url;
                    } 
                  </script> ';
        }else{
            ' <script>
                    alert("erros ao adicionar categoria");

                    redirecionar("http://localhost/pwII-projeto-total_esporte-/TOTAL_ESPORTES/addCategoria.php");

                    function redirecionar(url){
                        window.location.href = url;
                    } 
                  </script> ';
        }
        $result->free();
    }elseif ($tipo == "2"){

        $sql2 = "INSERT INTO sub_categoria(id_categoria,s_categoria) VALUES (" . $categoria . ",'" . $nome . "');";

        $result2= $conexao->query($sql2);

        if($result2 === TRUE){
            echo ' <script>
                    alert("subcategoria adicionada com sucesso");

                    redirecionar("http://localhost/pwII-projeto-total_esporte-/TOTAL_ESPORTES/addCategoria.php");

                    function redirecionar(url){
                        window.location.href = url;
                    } 
                  </script> ';
        }else{
            ' <script>
                    alert("erros ao adicionar subcategoria");

                    redirecionar("http://localhost/pwII-projeto-total_esporte-/TOTAL_ESPORTES/addCategoria.php");

                    function redirecionar(url){
                        window.location.href = url;
                    } 
                  </script> ';
        }        
    }


}else{
    echo "há algum campo não preenchido";
}
?>