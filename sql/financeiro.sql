SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `financeiro` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `financeiro`;

DROP TABLE IF EXISTS `lc_cat`;
CREATE TABLE `lc_cat` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

TRUNCATE TABLE `lc_cat`;
INSERT INTO `lc_cat` (`id`, `nome`) VALUES
(28, 'Padrão');

DROP TABLE IF EXISTS `lc_contas`;
CREATE TABLE `lc_contas` (
  `id` int(11) NOT NULL,
  `de_para` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dia` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `observacoes` longtext COLLATE utf8_unicode_ci,
  `tipo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conta_mensal` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `pago` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

TRUNCATE TABLE `lc_contas`;
DROP TABLE IF EXISTS `lc_movimento`;
CREATE TABLE `lc_movimento` (
  `id` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `dia` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `cat` int(11) DEFAULT NULL,
  `descricao` longtext COLLATE utf8_unicode_ci,
  `valor` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

TRUNCATE TABLE `lc_movimento`;
DROP TABLE IF EXISTS `lc_usuarios`;
CREATE TABLE `lc_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

TRUNCATE TABLE `lc_usuarios`;
INSERT INTO `lc_usuarios` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(35, 'Admin', 'admin@admin', 'MTIzNDU2', 'administrador');


ALTER TABLE `lc_cat`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `lc_contas`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `lc_movimento`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `lc_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);


ALTER TABLE `lc_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

ALTER TABLE `lc_contas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

ALTER TABLE `lc_movimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

ALTER TABLE `lc_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
