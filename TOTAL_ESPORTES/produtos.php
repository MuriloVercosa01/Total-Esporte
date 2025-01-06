<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script src="https://kit.fontawesome.com/449a3898b7.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produtos</title>
    <link  rel="stylesheet" href="Estilos/produtos.css" >
    <link  rel="stylesheet" href="Estilos/header.css" >
    <script src="JS/index.js" defer></script>
    
</head>
<body>

<header>
    <div class="container"> <!--delimitar a distancia do lado esquerdo e direito-->
    <div class="logo"><img src="imagens/Logo.png"></div>  <!--Logo-->

   
    <div class="menu">
        <nav> <!--Representa uma seção de navegação com links ou botões para direcionar para outra página do site-->
            <a href="index.php">Home</a>
            <a href="produtos.php">Produtos</a>
            <a href="#" style="visibility: hidden;" >Sobre</a>
            <a href="#" style="visibility: hidden;">Contatos</a>
        </nav>
    </div>


    <div class="sessao">
        <button><i class="fa-solid fa-right-to-bracket"></i><Br> <a href="login.php">  Entrar  </a></button>
        <button><i class="fa-solid fa-user-plus"></i><Br> <a href="cadastro.php">  Cadastre-se  </a></button>
        
    </div>

    <div class="perfil">
      <button id="botao-perfil"><i class="fa-solid fa-user-circle"></i></button>
      <div id="menu-perfil" class="conteudo-perfil">
          <a href="compras.php">carrinho de compras</a>
          <?php
          if (isset($_SESSION['email']) && $_SESSION['email'] == "adm") {
          echo "<a href='painelDeProdutos.php'>gerenciar</a>";
          }
          ?>
          <!--<a href="painelDeProdutos.php">gerenciar</a>-->
          <a href="perfil.php">Conta</a>
          <a href="Conexao/logoff.php?logout=true" id="sair" >Sair</a>
      </div>
  </div>
  <p style="color: white;" >
    <?php
      if(isset($_SESSION['nome_usuario'])){
      //sessão iniciado
      echo "olá," . $_SESSION['nome_usuario'];
      }
    ?>
  </p>
  </div>

  </div>
</header>

    <div class="nav-bar" >
        <div class="divMenuPesquisa" >
            <input type="text" id="pesquisa" placeholder="Buscar.." >
            <img src="https://cdn-icons-png.flaticon.com/512/3183/3183361.png" >
        </div>
    </div>
    <section><div><h1 class="destaque" >Produtos em destaque</h1></div></section>
    <main>
        <div class="sidebar" >
            <div class="lista" >
                <?php
                include('Conexao/conexao.php');

                $sql = "SELECT nome_categoria , id_categoria FROM categoria;";

                $result = $conexao->query($sql);

                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){

                        $sql_sub = "SELECT s_categoria FROM sub_categoria  WHERE id_categoria =" . $row['id_categoria'] . ";";

                        $result_sub = $conexao->query($sql_sub);

                        echo "<ul>";
                            echo "<h1>" . $row['nome_categoria'] . "</h1>";
                            while ($row_sub = $result_sub->fetch_assoc()){
                                echo "<a href='produtos.php?acao=" . $row_sub['s_categoria'] . "'><li><p class='linha'>" . $row_sub['s_categoria'] . "</p></li></a>";
                            }
                        echo "</ul>";
                    }
                }else{
                    echo('sem resultado');
                }
                ?>
            </div>
        </div>
        <div class="card-box" >
        <?php
            include('Conexao/conexao.php');

            if ($conexao->connect_error) {
                die("Conexão falhou: " . $conexao->connect_error);
            }

            // testa se há parâmetros na url
            if(isset($_GET['acao'])){
                //caso haja parâmetros na url
                                $sql_prod= "SELECT produto.id_produto, produto.imagem,produto.modelo,sub_categoria.s_categoria,produto.desc_breve,produto.preco FROM produto INNER JOIN sub_categoria ON produto.id_subcategoria = sub_categoria.id_sub_categoria WHERE sub_categoria.s_categoria ='" . $_GET['acao'] . "';";
    
                $result_prod = $conexao->query($sql_prod);
    
                if($result_prod->num_rows > 0){
                    while($row_prod = $result_prod->fetch_assoc()){
                        echo "
                        <a href='produtoSolo.php?id=" . $row_prod['id_produto'] . "'>
                            <div class='card'>
                                <img src='" . $row_prod['imagem'] . "'>
                                <h3>" . $row_prod['modelo'] . "</h3>
                                <p id='sub'>" . $row_prod['s_categoria'] . "</p>
                                <p><strong>Descrição:</strong><br>" . $row_prod['desc_breve'] . "</p>
                                <h3>R$ " . $row_prod['preco'] . "</h3>
                            </div>
                        </a>
                        ";
                    }
                }else{
                    echo('nenhum produto encontrado');
                }
            } 
            else {
                //caso não tenha parâmetros na url

                $sql_prod= "SELECT produto.id_produto,produto.imagem,produto.modelo,sub_categoria.s_categoria,produto.desc_breve,produto.preco FROM produto INNER JOIN sub_categoria ON produto.id_categoria = sub_categoria.id_sub_categoria;";
    
                $result_prod = $conexao->query($sql_prod);
    
                if($result_prod->num_rows > 0){
                    while($row_prod = $result_prod->fetch_assoc()){
                        echo "
                        <a href='produtoSolo.php?id=" . $row_prod['id_produto'] . "'>
                            <div class='card'>
                                <img src='" . $row_prod['imagem'] . "'>
                                <h3>" . $row_prod['modelo'] . "</h3>
                                <p id='sub'>" . $row_prod['s_categoria'] . "</p>
                                <p><strong>Descrição:</strong><br>" . $row_prod['desc_breve'] . "</p>
                                <h3>R$ " . $row_prod['preco'] . "</h3>
                            </div>
                        </a>
                        ";
                    }
                }else{
                    echo('nenhum produto encontrado');
                }
            }
        ?>
            <div class="card" ><img src="img/placeholder.jpg" ><h3>nome do modelo</h3><p>categoria</p><p>descrição breve teste teste teste teste teste teste</p><h3>valor $000,00</h3></div>
        </div>
    </main>
<footer>
  <!-- Container principal -->
  <div id="conteudo-rodape">
    <!-- Contatos e redes sociais -->
    <div id="contatos-rodape">
      <img src="imagens/Logo.png" alt="Logo Total Esporte">
      <p>Nossas redes sociais</p>
      <div id="redes-sociais-rodape">
        <a href="#" class="footer-link" id="instagram">
          <i class="fa-brands fa-instagram"></i>
        </a>
        <a href="#" class="footer-link" id="facebook">
          <i class="fa-brands fa-facebook-f"></i>
        </a>
        <a href="#" class="footer-link" id="whatsapp">
          <i class="fa-brands fa-whatsapp"></i>
        </a>
      </div>
    </div>

    <!-- Listas de serviços e produtos -->
    <ul class="lista-rodape">
      <li><h3>Serviços</h3></li>
      <li><p>Entrega grátis a partir de R$ 200,00</p></li>
      <li><p>30 dias para trocas e devoluções</p></li>
      <li><p>Atendimento online 24 horas</p></li>
    </ul>
    <ul class="lista-rodape">
      <li><h3>Produtos</h3></li>
      <li><p>Chuteira Futsal</p></li>
      <li><p>Chuteira Society</p></li>
      <li><p>Chuteira Campo</p></li>
    </ul>

    <!-- Suporte online -->
    <div id="suporte-rodape">
      <h3>Suporte Online</h3>
      <p>
        A Total Esporte oferece suporte online pelo e-mail suporte@totalesporte.com.
        Nossa equipe está pronta para ajudá-lo!
      </p>
      <div id="email-suporte">
        <a>
          <i class="fa-regular fa-envelope"></i>
        </a>
        <h1>suporte@totalesporte.com</h1>
      </div>
    </div>
  </div>

  <!-- Direitos autorais -->
  <div id="direitos-autorais-rodape">
    &#169; 2024 Total Esporte
  </div>
</footer>

</body>
</html>