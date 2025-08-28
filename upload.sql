-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2025 at 12:15 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upload`
--

-- --------------------------------------------------------

--
-- Table structure for table `arquivos`
--

CREATE TABLE `arquivos` (
  `id` int NOT NULL,
  `nome` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `path` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `data_upload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `arquivos`
--

INSERT INTO `arquivos` (`id`, `nome`, `path`, `data_upload`) VALUES
(10, '8.ficha.pdf', 'arquivos/6880efd4a3eed.pdf', '2025-07-23 11:21:08'),
(11, '8.ficha.pdf', 'arquivos/6881057a9b291.pdf', '2025-07-23 12:53:30'),
(12, '8.ficha.pdf', 'arquivos/688105b12145b.pdf', '2025-07-23 12:54:25'),
(13, 'XequeMapa - 2022.pdf', 'arquivos/688105ce27b96.pdf', '2025-07-23 12:54:54'),
(14, 'XequeMapa - 2022.pdf', 'arquivos/688106442fd8c.pdf', '2025-07-23 12:56:52'),
(15, 'XequeMapa - 2022.pdf', 'arquivos/688106bd55a49.pdf', '2025-07-23 12:58:53'),
(16, 'XequeMapa - 2022.pdf', 'arquivos/688106db735c2.pdf', '2025-07-23 12:59:23'),
(17, '8.ficha.pdf', 'arquivos/688b8c770e45f.pdf', '2025-07-31 12:32:07'),
(18, 'comprovante de inscrição- Senai.pdf', 'arquivos/688b8d1561bf0.pdf', '2025-07-31 12:34:45'),
(19, '8.ficha.pdf', 'arquivos/689150f5e2a57.pdf', '2025-08-04 21:31:49'),
(20, '8.ficha.pdf', 'arquivos/68915946e4c59.pdf', '2025-08-04 22:07:18'),
(21, 'XequeMapa - 2022.pdf', 'arquivos/689215dac51b4.pdf', '2025-08-05 11:31:54'),
(22, 'Currículo-Vitor.pdf', 'arquivos/689216ca6117a.pdf', '2025-08-05 11:35:54'),
(23, 'XequeMapa - 2022.pdf', 'arquivos/689216fc9ad85.pdf', '2025-08-05 11:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `cadastro`
--

CREATE TABLE `cadastro` (
  `id_login` int NOT NULL,
  `nome_login` varchar(140) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(140) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `senha` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `cadastro`
--

INSERT INTO `cadastro` (`id_login`, `nome_login`, `email`, `senha`, `tipo`, `data`) VALUES
(1, 'Vitor ', 'vitoraujomf5@gmail.com', '$2y$10$r7gXSIjyrc/SSsaEBoOpFe2P91UqorixI0x0elzV.zo2KrTWY/2J6', 'admin', '2025-05-29 23:10:06'),
(2, 'admin', 'admin@gmail.com', '$2y$10$G4i8FjUwDPFfWWkLi5/uD.GBNqSURMiGgkBUDYQaBeAtWaFky9l7a', 'user', '2025-05-29 23:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `repositorio`
--

CREATE TABLE `repositorio` (
  `Id_user` int NOT NULL,
  `Autoria` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `nomo_orientador` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `titulo_artigo` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `palavras_chaves` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `data_Publicação` date NOT NULL,
  `tema_central` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `tipoDeProdução` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `resumo` varchar(2000) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `path` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `repositorio`
--

INSERT INTO `repositorio` (`Id_user`, `Autoria`, `nomo_orientador`, `titulo_artigo`, `palavras_chaves`, `data_Publicação`, `tema_central`, `tipoDeProdução`, `resumo`, `path`, `data`) VALUES
(113, 'vitor Araujo ', 'rui', 'A importância do pensamento critico na sociedade de consumo ', 'Sociologia e análise crítica ', '2025-07-18', 'sociedade', 'Artigo Científico', 'Um pensamento critico da sociedade de consumo', 'arquivos/688b8c770e45f.pdf', '2025-07-31 15:32:07'),
(114, 'Camille Araújo', 'sei lá', 'sei lá ', 'analise cínica e neurológica  ', '2025-07-09', 'medicina', 'Artigo Científico', 'analise cínica e neurológica  analise cínica e neurológica  analise cínica e neurológica  analise cínica e neurológica  analise cínica e neurológica  analise cínica e neurológica  analise cínica e neurológica  analise cínica e neurológica  analise cínica e neurológica  analise cínica e neurológica  analise cínica e neurológica  analise cínica e neurológica  analise cínica e neurológica  analise cí', 'arquivos/688b8d1561bf0.pdf', '2025-07-31 15:34:45'),
(117, 'Vitor M. F. Santos ', 'teste', 'Robótica Industrial', 'Industria, Mecânica  Robótica  ', '2004-01-06', 'Robótica', 'Artigo Científico', ' Teste Teste TesteTeste Teste Teste Teste Teste Teste Teste vTeste Teste Teste Teste Teste Teste Teste TesteTeste Teste Teste Teste Teste Teste Teste vTeste Teste Teste Teste Teste Teste Teste TesteTeste Teste Teste Teste Teste Teste Teste vTeste Teste Teste Teste Teste Teste Teste TesteTeste Teste Teste Teste Teste Teste Teste vTeste Teste Teste Teste Teste Teste Teste TesteTeste Teste Teste ', 'arquivos/689215dac51b4.pdf', '2025-08-05 14:31:54'),
(118, 'teste', 'teste', 'teste', 'teste', '2025-08-03', 'teste', 'TCC', 'tetd ghsagdhjsag hsjagd jhsagd jhsagd jhsa dghjsa gdhjsag djhsag djhsagjakgh dahjfkgadkj hgfkjad', 'arquivos/689216ca6117a.pdf', '2025-08-05 14:35:54'),
(119, 'teste', 'teste', 'teste', 'teste', '2025-08-06', 'teste', 'Artigo Científico', ' Teste Teste TesteTeste Teste Teste Teste Teste Teste Teste vTeste Teste Teste Teste Teste Teste Teste TesteTeste Teste Teste Teste Teste Teste Teste vTeste Teste Teste Teste Teste Teste Teste TesteTeste Teste Teste Teste Teste Teste Teste vTeste Teste Teste Teste Teste Teste Teste TesteTeste Teste Teste Teste Teste Teste Teste vTeste Teste Teste Teste Teste Teste Teste TesteTeste Teste Teste Test', 'arquivos/689216fc9ad85.pdf', '2025-08-05 14:36:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `repositorio`
--
ALTER TABLE `repositorio`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id_login` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `repositorio`
--
ALTER TABLE `repositorio`
  MODIFY `Id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
