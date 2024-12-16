<?php
    print_r($_REQUEST);
    if(!empty($_POST['email']) && !empty($_POST['nome']) && !empty($_POST['senha']) && !empty($_POST['csenha']) && isset($_POST['submit']) )
    {
        echo('todos os dados foram enviados');
        //caso todos os dados tenham sido enviados
        $_email = $_POST['email'];
        $_nome = $_POST['nome'];
        $_senha = $_POST['senha'];
        $_comSenha = $_POST['csenha'];

        include_once('conexao.php');

        if ($conexao->connect_error){
            die('a conexão falhou:' . $conexao->connect_error);
        }
        //consultado email cadastrados no banco de dados
        $sql = "SELECT * FROM cadastros WHERE email = '$_email'";

        $stmt = $conexao->prepare($sql);

        $stmt->execute();

        $emailsCadastrado = $stmt->get_result();
        //consultando nomes de usuarios cadastrados
        $sql = "SELECT * FROM cadastros WHERE nome = '$_nome'";

        $stmt = $conexao->prepare($sql);

        $stmt->execute();

        $nomesCadastrados = $stmt->get_result();

        if($_senha == $_comSenha && mysqli_num_rows($emailsCadastrado) == 0){
            if(mysqli_num_rows($nomesCadastrados) != 0){
                echo ('<script>
                alert("nome de usuario já cadastrado");

                redirecionar("http://localhost/pwII-projeto-total_esporte-/TOTAL_ESPORTES/cadastro.php");

                function redirecionar(url){
                    window.location.href = url;
                } 
                </script>');
            }
            //inserindo os dados do cadastro no banco de dados
            $sql = "INSERT INTO cadastros (senha,nome,email) VALUES (?,?,?)";

            $stmt = $conexao->prepare($sql);
            
            $stmt->bind_param("iss",$_senha,$_nome,$_email);

            $stmt->execute();
            //echo ('<h1>funcionou</h1>');
            echo 
            ('<script>
                alert("cadastro realizado com sucesso");

                redirecionar("http://localhost/pwII-projeto-total_esporte-/TOTAL_ESPORTES/login.php");

                function redirecionar(url){
                    window.location.href = url;
                } 
            </script>');
            //header("Location:http://localhost/pwII-projeto-total_esporte-/TOTAL_ESPORTES/login.php");

            exit();


        }else{
            echo 
            ('<script>
                alert("email já cadastrado ou senha não confere");

                redirecionar("http://localhost/pwII-projeto-total_esporte-/TOTAL_ESPORTES/cadastro.php");

                function redirecionar(url){
                    window.location.href = url;
                } 
            </script>');
        }
    }
    else{
        echo('há campos não preenchidos');
    }
?>