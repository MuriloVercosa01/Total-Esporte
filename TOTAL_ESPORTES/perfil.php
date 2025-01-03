<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/449a3898b7.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/perfil.css">
    <link rel="stylesheet" href="Estilos/header.css">
    <script src="JS/index.js" defer></script>
    <title>Tela de Perfil</title>
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
              <a href="#">Conta</a>
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

    <!-- Seção de perfil -->
<main>
    <div class="container-perfil" >
        <div class="img-container" >
            <img id="img" src="img/placeholder.jpg">
            <h3>Nome de Usuário</h3>
        </div>
        <div class="info-container">
            <h4 class="item" >Nome de Usuário</h4>
            <h4 class="item" >foto de perfil</h4>
            <h4 class="item" >Email cadastrado</h4>
            <h4 class="item" >Senha</h4>
            <button class="item" >Editar</button>
        </div>
    </div>
</main>
    <!--Rodapé-->
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


         