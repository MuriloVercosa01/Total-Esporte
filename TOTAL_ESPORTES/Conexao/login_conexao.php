<?php

    session_start();    

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']) )
    {
        $_email = $_POST['email'];
        $_senha = $_POST['senha'];

        include("conexao.php");

        if($conexao->connect_error){
            die("Conexão falhou:" . $conexao->connect_error);
        }

        $sql = "SELECT * FROM cadastros WHERE email = ? AND senha = ?;";


        $stmt = $conexao->prepare($sql);

        $stmt->bind_param("ss", $_email,$_senha);

        $stmt->execute();

        $result = $stmt->get_result();
        
        if($result->num_rows == 0)
        {
            echo("não há correspondência");
        } else{
            
            $sql2 = "SELECT nome FROM cadastros c WHERE c.email = '". $_email ."';";

            $result = $conexao->query($sql2);

            $row = $result->fetch_assoc();

            $_SESSION['nome_usuario'] = $row['nome'];
            $_SESSION['email'] = $_email;
            $_SESSION['senha'] = $_senha;

            $result->close();
            echo ('<script type="text/javascript" >
                alert("login realizado com sucesso");

                redirecionar("http://localhost/pwII-projeto-total_esporte-/TOTAL_ESPORTES/");

                function redirecionar(url){
                    window.location.href = url;
                } 
            </script>');
        }
    } else{
        //caso não sejam enviadas todas as informações
        echo '<script type="text/javascript" >
                alert("há campos não preenchidos");

                redirecionar("http://localhost/pwII-projeto-total_esporte-/TOTAL_ESPORTES/login.html");

                function redirecionar(url){
                    window.location.href = url;
                } 
            </script>';

    }
?>