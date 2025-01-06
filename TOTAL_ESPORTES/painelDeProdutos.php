<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/449a3898b7.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel De Controle</title>
    <link rel="stylesheet" href="Estilos/painelDeProdutos.css">
    <link rel="stylesheet" href="Estilos/header.css">
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
    <main>
        <h1>Painel de gerenciamento</h1>

        <div class="adicionar" >
            <h2>adicionar</h2>
            <a href="addprodutos.php" ><button>Adicionar produto</button></a>
            <a href="addcategoria.php" ><button  >Adiconar categoria/subcategoria</button></a>
        </div>
        <div class="painel" >
            <h1>gerenciamento de categorias,sub-categorias e produtos cadastrados</h1>
            <div class="container-lista" > <!-- listagem de categorias -->
                <table> <h3>Categorias</h3>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Categoria</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('Conexao/conexao.php');

                        $sql = "SELECT id_categoria, nome_categoria from categoria;";

                        $result = $conexao->query($sql);
                        
                        //verifica se está tudo certo com a conexão
                        if ($conexao->connect_error) {
                            die("Conexão falhou: " . $conexao->connect_error);
                        }
                        
                        if ($result->num_rows > 0){
                        //caso haja resultados
                            while($row = $result->fetch_assoc()){
                                echo "<tr class='categoria' >";

                                echo "<td><p>" . $row['id_categoria'] . "</p></td><td><p class='edit_text' >" . $row['nome_categoria'] . "</p></td><td><button class='edit-btn'>Editar</button></td><td><button class='delete-btn'>Deletar</button></td>" ; 

                                echo "</tr>";
                            }
                        }else{
                        //caso não haja resultados
                            echo ('sem resultados');
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="container-lista" > <!-- listagem de sub-categorias -->
                <table> <h3>Sub-Categorias</h3>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>sub-Categoria</th>
                            <th>categoria</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('Conexao/conexao.php');

                        $sql = "SELECT id_sub_categoria,sub_categoria.s_categoria, categoria.nome_categoria FROM sub_categoria JOIN categoria ON sub_categoria.id_categoria = categoria.id_categoria;";

                        $result = $conexao->query($sql);
                        
                        //verifica se está tudo certo com a conexão
                        if ($conexao->connect_error) {
                            die("Conexão falhou: " . $conexao->connect_error);
                        }
                        
                        if ($result->num_rows > 0){
                        //caso haja resultados
                            while($row = $result->fetch_assoc()){
                                echo "<tr class='subcategoria'>";

                                echo "<td><p>" . $row['id_sub_categoria'] . "</p></td><td><p class='edit_text' >" . $row['s_categoria'] . "</p></td><td>" . $row['nome_categoria'] . "</p></td><td><button class='edit-btn'>Editar</button></td><td><button class='delete-btn'>Deletar</button></td>" ; 

                                echo "</tr>";
                            }
                        }else{
                        //caso não haja resultados
                            echo ('sem resultados');
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="container-lista" >  <!-- listagem de produtos cadastrados -->
                <table> <h3>produtos</h3>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Modelo</th>
                            <th>subcategoria</th>
                            <th>Categoria</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('Conexao/conexao.php');

                        $sql = "SELECT produto.id_produto,categoria.nome_categoria ,sub_categoria.s_categoria,produto.modelo FROM produto INNER JOIN sub_categoria ON produto.id_subcategoria = sub_categoria.id_sub_categoria INNER JOIN categoria ON produto.id_categoria = categoria.id_categoria;";

                        $result = $conexao->query($sql);
                        
                        //verifica se está tudo certo com a conexão
                        if ($conexao->connect_error) {
                            die("Conexão falhou: " . $conexao->connect_error);
                        }
                        
                        if ($result->num_rows > 0){
                        //caso haja resultados
                            while($row = $result->fetch_assoc()){
                                echo "<tr class='produto' >";

                                echo "<td><p>" . $row['id_produto'] . "</p></td><td><p class='edit_text' >" . $row['modelo'] . "</p></td><td>" . $row['s_categoria'] . "</td><td>" . $row['nome_categoria'] . "</td><td><button class='edit-btn'>Editar</button></td><td><button class='delete-btn'>Deletar</button></td>" ; 

                                echo "</tr>";
                            }
                        }else{
                        //caso não haja resultados
                            echo ('sem resultados');
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="JS/Edit.js"></script>
        <script src="JS/delete.js"></script>
    </main>
                        
</body>
</html>