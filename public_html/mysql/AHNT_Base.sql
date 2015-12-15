-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20-Ago-2015 às 05:11
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahnt`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairros`
--

CREATE TABLE IF NOT EXISTS `bairros` (
  `id` int(3) NOT NULL,
  `bairro` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `regiao` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `bairros`
--

INSERT INTO `bairros` (`id`, `bairro`, `regiao`) VALUES
(1, 'Centro', 'Região I'),
(2, 'Esplanada', 'Região I'),
(3, 'São Tarcísio', 'Região I'),
(4, 'Capim', 'Região II'),
(5, 'Cardo', 'Região II'),
(6, 'Sir', 'Região II'),
(7, 'Floresta', 'Região II'),
(8, 'Interlagos', 'Região II'),
(9, 'Sion', 'Região II'),
(10, 'Recanto das Garças', 'Região II'),
(11, 'Alto Esplanada', 'Região II'),
(12, 'Belvedere', 'Região II'),
(13, 'São Pedro', 'Região II'),
(14, 'Universitário', 'Região II'),
(15, 'Santos Dumont', 'Região II'),
(16, 'Santos Dumont II', 'Região II'),
(17, 'Chácaras Braúnas', 'Região II'),
(18, 'Jother Peres', 'Região II'),
(19, 'Sítio das Flores', 'Região II'),
(20, 'Conjunto Sotero Inácio Ramos (SIR)', 'Região II'),
(21, 'Vila Mariquita', 'Região II'),
(22, 'Santa Helena', 'Região III'),
(23, 'Cidade Nova', 'Região IV'),
(24, 'Lagoa Santa', 'Região IV'),
(25, 'Maria Eugênia', 'Região IV'),
(26, 'Santa Rosa de Lima', 'Região IV'),
(27, 'Esperança', 'Região IV'),
(28, 'Morada do Vale', 'Região IV'),
(29, 'Morada do Vale II', 'Região IV'),
(30, 'Morada do Vale III', 'Região IV'),
(31, 'Grã-Duquesa', 'Região IV'),
(32, 'Santo Agostinho', 'Região IV'),
(33, 'Vale Verde', 'Região IV'),
(34, 'Carapina', 'Região V'),
(35, 'Nossa Senhora das Graças', 'Região V'),
(36, 'Santa Efigênia', 'Região V'),
(37, 'Querosene', 'Região V'),
(38, 'Ilha dos Araújos', 'Região VII'),
(39, 'Lourdes', 'Região VIII'),
(40, 'Santa Terezinha', 'Região VIII'),
(41, 'Acampamento', 'Região IX'),
(42, 'Vila Mariana', 'Região IX'),
(43, 'São Geraldo', 'Região IX'),
(44, 'Altinópolis', 'Região X'),
(45, 'Mãe de Deus', 'Região X'),
(46, 'São Braz', 'Região X'),
(47, 'Santo Antônio', 'Região X'),
(48, 'Planalto', 'Região X'),
(49, 'Borges', 'Região X'),
(50, 'Jardim do Trevo', 'Região XI'),
(51, 'Santa Paula', 'Região XI'),
(52, 'Jardim Primavera', 'Região XII'),
(53, 'Vila Parque Ibituruna', 'Região XII'),
(54, 'Vila Parque São João', 'Região XII'),
(55, 'Recanto das Cachoeiras', 'Região XII'),
(56, 'São Paulo', 'Região XIII'),
(57, 'Vila Bretas', 'Região XIV'),
(58, 'São Raimundo', 'Região XV'),
(59, 'Vila Isa', 'Região XV'),
(60, 'Jardim Ipê', 'Região XV'),
(61, 'Vera Cruz', 'Região XV'),
(62, 'Jardim Atalaia', 'Região XV'),
(63, 'Asteca', 'Região XV'),
(64, 'Jardim Alvorada', 'Região XV'),
(65, 'Vale Primavera', 'Região XV'),
(66, 'Betel', 'Região XVI'),
(67, 'Distrito Industrial', 'Região XVI'),
(68, 'Vale Pastoril II', 'Região XVI'),
(69, 'Castanheiras', 'Região XVI'),
(70, 'Jardim Alice', 'Região XVI'),
(71, 'JK I', 'Região XVI'),
(72, 'JK II', 'Região XVI'),
(73, 'JK III', 'Região XVI'),
(74, 'Santa Rita', 'Região XVI'),
(75, 'Nova Santa Rita', 'Região XVI'),
(76, 'Canaã', 'Região XVI'),
(77, 'Vale Pastoril', 'Região XVI'),
(78, 'Turmalina', 'Região XVII'),
(79, 'Sagrada Família', 'Região XVII'),
(80, 'Vila União', 'Região XVII'),
(81, 'Jardim da Penha', 'Região XVII'),
(82, 'Novo Horizonte', 'Região XVII'),
(83, 'Vila Império', 'Região XVII'),
(84, 'São Cristóvão', 'Região XVII'),
(85, 'Nossa Senhora de Fátima', 'Região XVII'),
(86, 'Vila Ozanan', 'Região XVII'),
(87, 'Palmeiras', 'Região XVII'),
(88, 'Redenção', 'Região XVII'),
(89, 'Nova Vila Bretas', 'Região XVII'),
(90, 'Bela Vista', 'Região XVII'),
(91, 'Retiro dos Lagos', 'Região XVII'),
(92, 'Kennedy', 'Região XVII'),
(93, 'Jardim Pérola', 'Região XVII'),
(94, 'Fraternidade', 'Região XVII'),
(95, 'Vila Rica', 'Região XVII'),
(96, 'São José', 'Região XVII'),
(97, 'Caravelas', 'Região XVII'),
(98, 'Tiradentes', 'Região XVII'),
(99, 'Vitória', 'Região XVII'),
(100, 'Cidade Jardim', 'Região XVIII'),
(101, 'Conquista', 'Região XVIII'),
(102, 'Vila do Sol', 'Região XVIII'),
(103, 'Vila do Sol II', 'Região XVIII'),
(104, 'Vila dos Montes', 'Região XVIII'),
(105, 'Elvamar', 'Região XIX'),
(106, 'Vilagge da Serra', 'Região XIX'),
(107, 'Parque das Aroeiras', 'Região XIX'),
(108, 'Encosta do Sol', 'Região XIX'),
(109, 'Alto de Santa Helena', 'Distrito Municipal'),
(110, 'Baguari', 'Distrito Municipal'),
(111, 'Brejaubinha', 'Distrito Municipal'),
(112, 'Chonin', 'Distrito Municipal'),
(113, 'Chonin de Baixo', 'Distrito Municipal'),
(114, 'Goiabal', 'Distrito Municipal'),
(115, 'Derribadinha', 'Distrito Municipal'),
(116, 'Penha do Cassiano', 'Distrito Municipal'),
(117, 'Santo Antônio do Pontal', 'Distrito Municipal'),
(118, 'São José do Itapinoã', 'Distrito Municipal'),
(119, 'São Vítor', 'Distrito Municipal'),
(120, 'Vila Nova Floresta', 'Distrito Municipal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(9) NOT NULL,
  `tipo` int(2) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `contato` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comentario` text COLLATE utf8_unicode_ci NOT NULL,
  `aceito` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'não'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL COMMENT 'ID de login do usuário',
  `login` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nome de usuário do usuário',
  `senha` varchar(25) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Senha de acesso do usuário',
  `privilegios` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'comum'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Ficam armazenados aqui o login e a senha de tais usuários.';

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `login`, `senha`, `privilegios`) VALUES
(1, 'geilson', 'geilson', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens`
--

CREATE TABLE IF NOT EXISTS `postagens` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titulo` varchar(140) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título da publicação',
  `materia` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'A publicação em si',
  `autor` int(11) NOT NULL COMMENT 'Chave estrangeira que liga o autor à sua tabela em usuarios'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela onde as postagens [tipo blog] serão armazenadas';

-- --------------------------------------------------------

--
-- Estrutura da tabela `resenhas`
--

CREATE TABLE IF NOT EXISTS `resenhas` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL COMMENT 'Chave estrangeira para ligação entre à tabela postagens e resenhas',
  `data` datetime DEFAULT NULL,
  `nome` int(11) NOT NULL COMMENT 'Nome do autor do comentário (tabela usuarios)',
  `comentario` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Comentário referente ao id_post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='As resenhas se referem aos comentários feitos nas publicações (tabelas postagens)';

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE IF NOT EXISTS `respostas` (
  `id` int(11) NOT NULL,
  `id_comentario` int(11) NOT NULL COMMENT 'Chave estrangeira para ligação à tabela comentarios',
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` int(11) NOT NULL COMMENT 'Nome (coluna id da tabela usuario) do usuário que deu a resposta',
  `resposta` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Resposta feita pelo usuário (coluna nome desta tabela)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabela onde é armazenados as respostas feita aos comentários (tabela comentarios) realizados pelos os associados';

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas_forum`
--

CREATE TABLE IF NOT EXISTS `respostas_forum` (
  `idresposta` int(11) NOT NULL,
  `id_topico` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `autor` int(6) NOT NULL,
  `resposta` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `topicos_forum`
--

CREATE TABLE IF NOT EXISTS `topicos_forum` (
  `idtopico` int(11) NOT NULL,
  `topico` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `autor` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL COMMENT 'identificador do usuário',
  `id_login` int(6) NOT NULL COMMENT 'Chave estrangeira referenciada à tabela login',
  `id_bairro` int(11) NOT NULL COMMENT 'Chave estrangeira à tabela bairros',
  `nome` varchar(90) COLLATE utf8_unicode_ci NOT NULL COMMENT 'nome do usuário',
  `sobrenome` varchar(120) COLLATE utf8_unicode_ci NOT NULL COMMENT 'sobrenome do usuário',
  `sexo` varchar(9) COLLATE utf8_unicode_ci NOT NULL COMMENT 'sexo do usuário',
  `dt_nasc` date NOT NULL COMMENT 'senha do usuário',
  `email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sobre` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Registro de descrição de usuários';

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_login`, `id_bairro`, `nome`, `sobrenome`, `sexo`, `dt_nasc`, `email`, `telefone`, `celular`, `img`, `sobre`) VALUES
(1, 1, 27, 'Geilson', 'Batista', 'Masculino', '2001-09-11', 'geilson@mail.ru', 40028922, NULL, 'img_200815000756.jpg', 'Sobre mim...');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bairros`
--
ALTER TABLE `bairros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postagens`
--
ALTER TABLE `postagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_idx` (`autor`);

--
-- Indexes for table `resenhas`
--
ALTER TABLE `resenhas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_postagem_idx` (`id_post`);

--
-- Indexes for table `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_idx` (`nome`),
  ADD KEY `fk_comentario_idx` (`id_comentario`);

--
-- Indexes for table `respostas_forum`
--
ALTER TABLE `respostas_forum`
  ADD PRIMARY KEY (`idresposta`),
  ADD KEY `fk_topico_res_idx` (`id_topico`),
  ADD KEY `fk_resposta_usr_idx` (`autor`);

--
-- Indexes for table `topicos_forum`
--
ALTER TABLE `topicos_forum`
  ADD PRIMARY KEY (`idtopico`),
  ADD KEY `fk_topico_usr_idx` (`autor`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_login_id_idx` (`id_login`,`id`),
  ADD KEY `fk_bairro_idx` (`id_bairro`) COMMENT 'Interligação entre as tabelas bairros e usuario onde não sendo possível exclusão e/ou alteração nos registros da tabela bairro';

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bairros`
--
ALTER TABLE `bairros`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID de login do usuário',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `postagens`
--
ALTER TABLE `postagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resenhas`
--
ALTER TABLE `resenhas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respostas_forum`
--
ALTER TABLE `respostas_forum`
  MODIFY `idresposta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topicos_forum`
--
ALTER TABLE `topicos_forum`
  MODIFY `idtopico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador do usuário',AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `postagens`
--
ALTER TABLE `postagens`
  ADD CONSTRAINT `fk_post-usuario` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `resenhas`
--
ALTER TABLE `resenhas`
  ADD CONSTRAINT `fk_postagem` FOREIGN KEY (`id_post`) REFERENCES `postagens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `fk_comentario` FOREIGN KEY (`id_comentario`) REFERENCES `comentarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`nome`) REFERENCES `usuarios` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `respostas_forum`
--
ALTER TABLE `respostas_forum`
  ADD CONSTRAINT `fk_resposta_usr` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_topico_res` FOREIGN KEY (`id_topico`) REFERENCES `topicos_forum` (`idtopico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `topicos_forum`
--
ALTER TABLE `topicos_forum`
  ADD CONSTRAINT `fk_topico_usr` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_bairro` FOREIGN KEY (`id_bairro`) REFERENCES `bairros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_login` FOREIGN KEY (`id_login`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
