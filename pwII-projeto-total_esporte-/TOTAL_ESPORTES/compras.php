<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/449a3898b7.js" crossorigin="anonymous"></script>
    <title>carrinho de compras</title>
    <link rel="stylesheet" href="Estilos/compras.css">
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
          <a href="compras.html">carrinho de compras</a>
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
<main>
<div class="container-main">
        <h2> Carrinho de Compras </h2>
        <table>
            <thead>
                <tr>
                    <th>ITEM</th>
                    <th>PREÇO</th>
                    <th>QUANTIDADE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>  <div class="item-container">
                        <img src="https://imgnike-a.akamaihd.net/1920x1920/0225960V.jpg" alt="Chuteira A" class="item-image"> Chuteira Nike Zoom Mercurial Superfly 9 Elite Campo</td>
                    <td>R$ 249,90</td>
                    <td><input class="quantity" type="number" value="1" min="1" />
                        <button onclick="removeItem(this)">Remover</button>
                    </td>
                    <div class="button-container">
                
                    </div>
                   
                </tr>
                <tr>
                    <td>  <div class="item-container">
                        <img src="https://imgnike-a.akamaihd.net/1300x1300/022595O6A10.jpg" alt="Chuteira A" class="item-image">Chuteira Nike Mercurial Vapor 15 Elite Campo</td>
                    <td>R$ 339,59</td>
                    <td><input class="quantity" type="number" value="1" min="1" />
                        <button onclick="removeItem(this)">Remover</button>
                    </td>
                    
                </tr>
                <tr>
                    <td>  <div class="item-container">
                        <img src="https://images.tcdn.com.br/img/img_prod/1141538/chuteira_nike_campo_phantom_gx_club_preto_vermelho_16227_1_d9321f755e14d74d71ec2f64b14568f6.jpg" alt="Chuteira A" class="item-image">Chuteira Nike Campo Phantom GX Club Preto/Vermelho</td>
                    <td>R$ 189,90</td>
                    <td><input class="quantity" type="number" value="1" min="1" />
                        <button onclick="removeItem(this)">Remover</button>
                    </td>   
                </tr>
                <button class="checkout-button">Finalizar Compra</button>
                <tr>
                    
                   
                   
                </tr>
            </tbody>
        </table>
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