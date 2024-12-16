-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Dez-2024 às 00:16
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `total_esporte`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastros`
--

CREATE TABLE `cadastros` (
  `id_cliente` int(11) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `senha` varchar(10) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart_itens`
--

CREATE TABLE `cart_itens` (
  `id_cart_itens` int(11) NOT NULL,
  `id_cart` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome_categoria`) VALUES
(1, 'chuteira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `tamanho` int(11) DEFAULT NULL,
  `imagem` varchar(500) DEFAULT NULL,
  `desc_breve` varchar(200) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_subcategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `modelo`, `preco`, `tamanho`, `imagem`, `desc_breve`, `id_categoria`, `id_subcategoria`) VALUES
(2, 'Nike Mercurial Vapor', 499.99, NULL, 'https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1023317_vapor.jpg', 'Querendo levar sua velocidade para o próximo nível? Criamos a chuteira Academy com uma unidade Air Zoom melhorada no calcanhar. Ela oferece sensação propulsiva necessária para romper a linha de fundo.', 1, 3),
(3, 'Puma Future', 399.99, NULL, 'https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1019309_puma-future.jpg', 'Chamando todos os craques. Inspirado no estilo de jogo de Neymar Jr, a nova chuteira FUTURE MATCH chegou para você deixá-los loucos. Possui cabedal FUZIONFIT360 com suporte PWRTAPE que tá da maior est', 1, 1),
(4, 'Nike Phantom GX', 359.99, NULL, 'https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1023345_phantom-luna.jpg', 'Querendo levar seu jogo para o próximo nível? A Phantom Luna 2 Academy ajuda a colocá-lo em uma posição privilegiada na rede, seja você o organizador, assistente ou finalizador.', 1, 3),
(5, 'Adidas F50', 299.99, NULL, 'https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1018849_f50-120924.jpg', 'A F50 está de volta! Mais rápida do que nunca, a Chuteira Campo Adidas F50 Club Unissex traz velocidade para dentro das quatro linhas!', 1, 1),
(6, 'Nike Tiempo Legend', 299.99, NULL, 'https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1023352_tiempo.jpg', 'Até mesmo as Lendas descobrem formas de evoluir. Quer esteja começando ou apenas jogando por diversão, a mais recente iteração dos calçados Club colocam você em campo sem comprometer a qualidade.', 1, 2),
(7, 'Adidas Copa Pure', 249.99, NULL, 'https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1018874_copa.jpg', 'Para realmente dominar o jogo, é necessário ficar perto dos companheiros de time e mais perto ainda da bola. Com todo o conforto proporcionado pela chuteira adidas Copa Pure II', 1, 3),
(8, 'Adidas Predator', 599.49, NULL, 'https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1018813_pred-120924.jpg', 'Nova adidas Predator: pura perfeição. Macio e flexível, o cabedal HybridTouch 2.0 sem cadarços dessa chuteira inclui datalhes de borracha aderente Strikeskin para chutes mais precisos.', 1, 3),
(9, 'Puma King', 449.49, NULL, 'https://www.prodirectsport.com/-/media/prodirect/project/en/soccer/tabs---new/standard/boots/silos/1019327_puma-king.jpg', 'O pai tá on! Inspire-se no craque brasileiro Neymar e tome conta do jogo com a nova Chuteira Campo Puma. ', 1, 3),
(10, 'Nike Mercurial Superfly', 299.99, NULL, 'https://imgnike-a.akamaihd.net/360x360/0226060UA9.jpg', 'Incline instantaneamente o campo no design da Superfly 9 Club MG leve e baixa. A velocidade está no Air.', 1, 2),
(11, 'Adidas Predator Edge+', 649.99, NULL, 'https://acdn.mitiendanube.com/stores/001/047/204/products/006050e2-7374-487f-9618-2602fca8e4191-8a33bd221a5929007516748214399312-1024-1024.jpeg', 'Domínio. Controle. Forca. A adidas Predator tem tudo para emplacar', 1, 1),
(12, 'Adidas Predator League In', 329.99, NULL, 'https://www.tradeinn.com/f/14055/140552258/adidas-tenis-de-futsal-predator-league-in.webp', 'Mire na perfeição com a nova adidas Predator. uma entressola Lightstrike leve e uma sola de perfil baixo garantem que você esteja sempre pronto para reagir.', 1, 2),
(13, 'Nike Beco 2', 199.99, NULL, 'https://imgcentauro-a.akamaihd.net/768x768/8295512V.jpg', 'Feita com linhas clean e um visual clássico, a Nike Beco 2 TF permite que a sua jogada fale por si só. ', 1, 2),
(14, 'Cleats Skechers', 600, NULL, 'https://gfx.r-gol.com/media/res/products/520/197520/795x1035/252022-pur_1.webp', 'Impulsione seu jogo com os sapatos Skechers SKX_01 - 1.5 HIGH ELITE FG™. Chuteiras leves com amortecimento HYPER BURST PRO™ altamente ', 1, 1),
(15, 'Predator League Bellingham', 600, NULL, 'https://gfx.r-gol.com/media/res/products/918/190918/795x1035/jh5702_6.webp', 'Categorias: Chuteiras , Finalidade , Produtor , Série , Avançado , Chuteiras de jogadores , Chuteiras - Chuteiras de chão firme (FG). ', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_categoria`
--

CREATE TABLE `sub_categoria` (
  `id_sub_categoria` int(11) NOT NULL,
  `s_categoria` varchar(45) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `sub_categoria`
--

INSERT INTO `sub_categoria` (`id_sub_categoria`, `s_categoria`, `id_categoria`) VALUES
(1, 'campo', 1),
(2, 'futsal', 1),
(3, 'society', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastros`
--
ALTER TABLE `cadastros`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `cart_itens`
--
ALTER TABLE `cart_itens`
  ADD PRIMARY KEY (`id_cart_itens`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_subcategoria` (`id_subcategoria`);

--
-- Índices para tabela `sub_categoria`
--
ALTER TABLE `sub_categoria`
  ADD PRIMARY KEY (`id_sub_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastros`
--
ALTER TABLE `cadastros`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cart_itens`
--
ALTER TABLE `cart_itens`
  MODIFY `id_cart_itens` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `sub_categoria`
--
ALTER TABLE `sub_categoria`
  MODIFY `id_sub_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cadastros` (`id_cliente`);

--
-- Limitadores para a tabela `cart_itens`
--
ALTER TABLE `cart_itens`
  ADD CONSTRAINT `cart_itens_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cadastros` (`id_cliente`),
  ADD CONSTRAINT `cart_itens_ibfk_2` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`),
  ADD CONSTRAINT `cart_itens_ibfk_3` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`id_subcategoria`) REFERENCES `sub_categoria` (`id_sub_categoria`);

--
-- Limitadores para a tabela `sub_categoria`
--
ALTER TABLE `sub_categoria`
  ADD CONSTRAINT `sub_categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
