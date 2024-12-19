<?php
include('Conexao/conexao.php');

// Obter o ID do produto da URL
$id = $_GET['id'];

// Consulta SQL para obter as informações do produto
$sql = 'SELECT * FROM produto WHERE produto.id_produto =' . $id . ' ;';
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    // Exibir os detalhes do produto
    $produto = $result->fetch_assoc();
} else {
    echo "Produto não encontrado.";
    exit();
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/449a3898b7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Estilos/produtoSolo.css">
    <link rel="stylesheet" href="Estilos/header.css">
    <script src="JS/index.js" defer></script>

    <title><?php echo $produto['modelo']; ?></title>
</head>
<body>

<header>
    <div class="container">
        <div class="logo"><img src="imagens/Logo.png"></div>
        <div class="menu">
            <nav>
                <a href="index.php">Home</a>
                <a href="produtos.php">Produtos</a>
                <a href="#" style="visibility: hidden;" >Sobre</a>
                <a href="#" style="visibility: hidden;"  >Contatos</a>
            </nav>
        </div>
        <div class="sessao">
            <button><i class="fa-solid fa-right-to-bracket"></i><br> <a href="login.html">Entrar</a></button>
            <button><i class="fa-solid fa-user-plus"></i><br> <a href="cadastro.html">Cadastre-se</a></button>
        </div>
        <div class="perfil">
            <button id="botao-perfil"><i class="fa-solid fa-user-circle"></i></button>
            <div id="menu-perfil" class="conteudo-perfil">
                <a href="compras.html">Carrinho de Compras</a>
                <a href="painelDeProdutos.php">Gerenciar</a>
                <a href="#">Conta</a>
                <a href="Sair">Sair da Conta</a>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="produto">
        <div class="produto-imagem">
            <img src="<?php echo $produto['imagem']; ?>" alt="Produto">
        </div>
        <div class="produto-detalhes">
            <h1><?php echo $produto['modelo']; ?></h1>
            <p><?php echo $produto['desc_breve']; ?></p>
            <h4>Preço: R$ <?php echo $produto['preco']; ?></h4>
            <form action="compras.php" method="post">
                <label for="tamanho">Tamanho:</label>
                <select name="tamanho" id="tamanho" required>
                    <option value="">Selecione o tamanho</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                </select>

                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" value="1" min="1" required>

                <input type="hidden" name="produto_id" value="<?php echo $produto['id_produto']; ?>">

                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
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
</body>
</html>
