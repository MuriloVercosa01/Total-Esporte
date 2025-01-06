<?php
  session_start();
?>
<html lang="pt-br">
<head>
    <script src="https://kit.fontawesome.com/449a3898b7.js" crossorigin="anonymous"></script> <!--Código Font Awesome para os ícones do site-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/index.css">
    <link rel="stylesheet" href="Estilos/indexSlide.css">
    <link rel="stylesheet" href="Estilos/header.css">
    <script src="JS/slide.js" defer></script>
    <script src="JS/index.js" defer></script>

    <title>HOME TOTAL ESPORTE</title>
</head>
<body>
    


<!--Cabeçalho-->
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
<!--Fim Cabeçalho-->

<BR> 


<!--Slider Carrosel-->

<section class="slider">
    <div class="slider-content">
<!--Uma ponte entre CSS e JavaScript que não possui função visual."-->
        <input type="radio" name="btn-radio" id="radio1">
        <input type="radio" name="btn-radio" id="radio2">
        <input type="radio" name="btn-radio" id="radio3">

        <div class="slide-box primeiro">
            <a class="img-desktop" href="produtos.php"><img  src="imagens/MabappeWEB.jpg" alt="slide1"></a>
            <a class="img-mobile" href="produtos.php"><img src="imagens/MbappeMOB.jpg" alt="slide1"></a>
        </div>

        <div class="slide-box">
            <a class="img-desktop" href="produtos.php"><img  src="imagens/NeymarWEB.png" alt="slide2"></a>
            <a class="img-mobile" href="produtos.php"><img src="imagens/NeymarMOB.jpg" alt="slide2"></a>
        </div>

        <div class="slide-box">
            <a class="img-desktop" href="produtos.php"><img  src="imagens/PumaWEB.jpg" alt="slide3"></a>
            <a class="img-mobile" href="produtos.php"><img src="imagens/PumaMOB.jpg" alt="slide3"></a>
        </div>

        <div class="nav-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
        </div>

        <div class="nav-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
        </div>


    </div>
</section>

<!--FIM Slider Carrosel-->

<br> <br> <br> <br> <br> <br>




<!--Carrosel Rolagem Chuteira-->

<div class="texto1"><h1>Chuteiras em Destaques</h1></div>

<section class="carrosel-rolagem">
    <div class="conteiner-rolagem">

      <div class="item">
        <a href="produtoSolo.php?id=2" >
        <img src="https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1023317_vapor.jpg">
        <p>Nike Mercurial Vapor</p>
        </a>
      </div>

      <div class="item">
        <a href="produtoSolo.php?id=3" >
        <img src="https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1019309_puma-future.jpg" >
        <p>Puma Future</p>
        </a>
      </div>
      <div class="item">
      <a href="produtoSolo.php?id=4" >
        <img src="https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1023345_phantom-luna.jpg">
        <p>Nike Phantom GX</p>
        </a>
      </div>
      <div class="item">
      <a href="produtoSolo.php?id=5" >
        <img src="https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1018849_f50-120924.jpg">
        <p>Adidas F50</p>
        </a>
      </div>
      <div class="item">
      <a href="produtoSolo.php?id=6" >
        <img src="https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1023352_tiempo.jpg">
        <p>Nike Tiempo Legend</p>
      </div>
      <div class="item">
      <a href="produtoSolo.php?id=7" >
        <img src="https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1018874_copa.jpg">
        <p>Adidas Copa Pure</p>
        </a>
      </div>
      <div class="item">
      <a href="produtoSolo.php?id=8" >
        <img src="https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1018813_pred-120924.jpg">
        <p>Adidas Predator</p>
        </a>
      </div>
      <div class="item">
      <a href="produtoSolo.php?id=9" >
        <img src="https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1019327_puma-king.jpg">
        <p>Puma King</p>
        </a>
      </div>
    </div>
  </section>

  <!--FIM Carrosel Rolagem Chuteira-->
  
  <br>


<div class="tabela-produtos">
    <table>

        <td>  <a href="produtoSolo.php?id=15"> <img src="https://gfx.r-gol.com/media/pub/ListopadBanery24/belligolddwabanerydesktopEN-kopia.webp"> </a> </td>
        <td> <a href="produtoSolo.php?id=14"><img src="https://gfx.r-gol.com/media/pub/ListopadBanery24/dwabaneryskechersdesktopEN-kopia.webp"></a></td>
   

    </table>
</div>


<divi class="fornecedores">
  <table>
    <td><img src="https://gfx.r-gol.com/media/pub/LipiecBanery/NoweLogoADIDAS139.webp" alt=""></td>
    <td><img src="https://gfx.r-gol.com/media/pub/LipiecBanery/nikesmall139.webp" alt=""></td>
    <td><img src="https://gfx.r-gol.com/media/pub/LipiecBanery/pumaNew139.webp" alt=""></td>
    <td><img src="https://gfx.r-gol.com/media/pub/LipiecBanery/nblogosmall139.webp" alt=""></td>
    <td><img src="https://gfx.r-gol.com/media/pub/LipiecBanery/jomalogosmal139.webp" alt=""></td>

  </table>
</divi>


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