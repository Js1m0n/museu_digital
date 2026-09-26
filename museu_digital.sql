-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/09/2026 às 19:22
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `museu_digital`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acervo`
--

CREATE TABLE `acervo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `data_historica` varchar(50) DEFAULT NULL,
  `imagem_url` varchar(255) DEFAULT NULL,
  `historico` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `acervo`
--

INSERT INTO `acervo` (`id`, `titulo`, `descricao`, `data_historica`, `imagem_url`, `historico`) VALUES
(2, 'São Miguel Arcanjo', 'As ruínas jesuíticas de São Miguel das Missões são um dos principais vestígios do período das Missões Jesuíticas no Brasil. Declaradas Patrimônio Mundial pela UNESCO, representam a rica troca cultural e os conflitos na cartografia da formação do território sul-americano.', 'São Miguel das Missões - Século XVIII', 'imagens\\bandeirasm.png', ''),
(3, 'São Luiz Gonzaga', 'Fundada originalmente em 1687, a missão de São Luiz Gonzaga foi transferida para seu local atual devido a conflitos. Hoje, abriga a imponente Igreja Matriz que guarda esculturas missioneiras originais feitas pelos indígenas guaranis sob a orientação dos jesuítas.', 'São Luiz Gonzaga - RS', 'imagens\\bandeira_saoluiz.png', ''),
(4, 'Pirapó', 'Município que faz parte da rica história da região, Pirapó preserva em suas terras as memórias e lendas das antigas reduções. A topografia e a cartografia da região são marcadas pela proximidade com o rio, cenário de antigos relatos.', 'Pirapó - RS', 'imagens\\bandeira_pirapo.png', 'FUNDAÇÃO: Setembro de 1903. INSTALAÇÃO DO MUNICÍPIO: Janeiro de 1989. LOCALIZAÇÃO: Região Colonial das Missões, ao Noroeste do estado, distando 28 Km da foz do Rio Ijuí... LIMITES: Roque Gonzales, Dezesseis de Novembro, São Nicolau e Argentina. RODOVIAS DE ACESSO: BR 392, RS 168 e RS 561. DISTÂNCIA DOS MUNICÍPIOS VIZINHOS: Dezesseis de Novembro: 35 Km - Roque Gonzales: 25 Km - Porto Xavier: 23 Km - São Nicolau: 18 Km - São Luiz Gonzaga: 60 Km. ÁREA TOTAL: 287 Km² (quase 29.000 ha).');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `acervo`
--
ALTER TABLE `acervo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acervo`
--
ALTER TABLE `acervo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
