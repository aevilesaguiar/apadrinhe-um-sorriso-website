-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16-Out-2021 às 00:20
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `doe_um_sorriso`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email_admin` varchar(50) NOT NULL,
  `fk_user` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`email_admin`),
  KEY `admin_ibfk_1` (`fk_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastra`
--

DROP TABLE IF EXISTS `cadastra`;
CREATE TABLE IF NOT EXISTS `cadastra` (
  `fk_rg_crianca` varchar(12) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  KEY `fk_rg_crianca` (`fk_rg_crianca`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastra`
--

INSERT INTO `cadastra` (`fk_rg_crianca`, `fk_id_cadastro`) VALUES
('44.444.545-4', 1),
('44.878.787-8', 1),
('58.999.989-9', 1),
('44.444.444-4', 55),
('54.545.545-5', 1),
('25.256.236-3', 55),
('25.665.869-5', 79);

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaborador`
--

DROP TABLE IF EXISTS `colaborador`;
CREATE TABLE IF NOT EXISTS `colaborador` (
  `id_colaborador` int(11) NOT NULL AUTO_INCREMENT,
  `funcao` enum('Gerente','Analista de Cadastro','Recebedor','Entregador') DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_colaborador`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `colaborador`
--

INSERT INTO `colaborador` (`id_colaborador`, `funcao`, `fk_id_cadastro`) VALUES
(13, 'Gerente', 70),
(14, 'Gerente', 74),
(15, 'Entregador', 75),
(16, 'Analista de Cadastro', 76);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_crianca`
--

DROP TABLE IF EXISTS `dados_crianca`;
CREATE TABLE IF NOT EXISTS `dados_crianca` (
  `rg_crianca` varchar(12) NOT NULL,
  `nome_crianca` varchar(80) DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `nasc_crianca` date DEFAULT NULL,
  `tamanho_camiseta` enum('RN','1','2','4','6','8','10','12','14','16','P','M','G') DEFAULT NULL,
  `tamanho_sapato` enum('14','15','16','17.5','18.5','19','20','20.5','21','21.5','22','22.5','23','23.5','24','24.5','25','25.5','26','26.5','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45') DEFAULT NULL,
  `tamanho_calca` enum('1','2','4','6','8','10','12','14','16','P','M','G') DEFAULT NULL,
  `brinquedo` varchar(140) DEFAULT NULL,
  `term_arq` varchar(150) DEFAULT NULL,
  `observacao` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`rg_crianca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dados_crianca`
--

INSERT INTO `dados_crianca` (`rg_crianca`, `nome_crianca`, `sexo`, `nasc_crianca`, `tamanho_camiseta`, `tamanho_sapato`, `tamanho_calca`, `brinquedo`, `term_arq`, `observacao`) VALUES
('25.256.236-3', 'Fernanda', 'F', '2000-02-20', 'M', '26.5', '14', 'Boneca', '2-ptcc_ag11.pdf', 'dfd'),
('25.665.869-5', 'Eloisa', 'F', '2010-02-10', 'M', '28', 'G', 'Kit Maquiagem', '5-ptcc_agenda05.pdf', 'sdsd'),
('44.444.444-4', 'Jiulia', 'F', '2021-05-10', '14', '26', '16', 'Boneca', 'mundos paralelos.odt', 'sdsd'),
('44.444.545-4', 'Jessica', 'F', '2010-05-10', '8', '25.5', '10', 'Tenis', '1-programacao_aplicativos_mobile_li__agenda_1_mergulhando.pdf', 'gfg'),
('44.878.787-8', 'Orlando', 'M', '2015-03-10', '16', '26', '14', 'Carrinho de controle remoto', '1-agenda_09_ds_2.pdf', 'uuiu'),
('54.545.545-5', 'Cintia', 'F', '2021-02-10', '12', '16', '10', 'tenis', '1-ptcc_ag11.pdf', 'dsdsd'),
('58.999.989-9', 'Josuel', 'F', '2021-11-05', '14', '26.5', '16', 'Super Man', '5-ptcc_agenda05.pdf', 'lkl');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_pf`
--

DROP TABLE IF EXISTS `dados_pf`;
CREATE TABLE IF NOT EXISTS `dados_pf` (
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(12) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  PRIMARY KEY (`cpf`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dados_pf`
--

INSERT INTO `dados_pf` (`cpf`, `rg`, `fk_id_cadastro`) VALUES
('525.699.999-99', '0000000000', 75),
('544.545.454-54', '0000000000', 77),
('544.545.455-82', '0000000000', 70),
('545.445.454-54', '0000000000', 57),
('545.454.545-44', '0000000000', 71),
('545.454.545-45', '0000000000', 52),
('545.699.999-99', '0000000000', 76),
('552.225.588-88', '0000000000', 74),
('565-656-659-95', '0000000', 2),
('565.455.455-55', '0000000000', 78),
('848.487.887-87', '0000000000', 51),
('858.595.445-85', '0000000000', 73),
('888.787.878-78', '0000000000', 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_pj`
--

DROP TABLE IF EXISTS `dados_pj`;
CREATE TABLE IF NOT EXISTS `dados_pj` (
  `cnpj` varchar(18) NOT NULL,
  `nome_fantasia` varchar(80) DEFAULT NULL,
  `site` varchar(50) DEFAULT NULL,
  `tipo_pj` varchar(50) DEFAULT NULL,
  `inf_recebimento` time DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  PRIMARY KEY (`cnpj`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dados_pj`
--

INSERT INTO `dados_pj` (`cnpj`, `nome_fantasia`, `site`, `tipo_pj`, `inf_recebimento`, `fk_id_cadastro`) VALUES
('25.454.545/4545-45', 'Doe&Viva', 'www.doeparavida.com.br', 'OUTROS', '20:43:11', 55),
('51.154.454/5454-53', 'CARGIL LTDA', 'www.cargil.com.br', 'INDUSTRIA', '41:02:42', 54),
('51.154.454/5454-54', 'DSM', 'www.dsm.com.br', 'PRODUTOR RURAL', '20:43:11', 53),
('58.484.488/4848-88', 'MDL', 'www.mdl-brasil.com.br', 'INDUSTRIA', '20:43:11', 1),
('85.858.585/6222-22', 'Nova Vida', 'www.novavida.com', 'COMUNICAÃ‡ÃƒO', '20:43:11', 79);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_responsavel`
--

DROP TABLE IF EXISTS `dados_responsavel`;
CREATE TABLE IF NOT EXISTS `dados_responsavel` (
  `id_familia` int(11) NOT NULL AUTO_INCREMENT,
  `cpf_resp` varchar(15) DEFAULT NULL,
  `nome_resp` varchar(80) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_familia`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dados_responsavel`
--

INSERT INTO `dados_responsavel` (`id_familia`, `cpf_resp`, `nome_resp`, `fk_id_cadastro`) VALUES
(39, '444.545.454-54', 'JosÃ©', 50),
(40, '887.848.484-88', 'JosÃ©', 51),
(41, '444.545.454-54', 'Manoel', 52),
(42, '544.545.588-78', 'Joao MAnoel', 56),
(43, '554.548.885-8', 'Augusto', 77),
(44, '526.363.636-33', 'Ramuel', 78);

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacao`
--

DROP TABLE IF EXISTS `doacao`;
CREATE TABLE IF NOT EXISTS `doacao` (
  `id_doacao` int(11) NOT NULL AUTO_INCREMENT,
  `status_doacao` varchar(10) DEFAULT NULL,
  `data_hora_entrega` datetime DEFAULT NULL,
  `data_hora_selecao` datetime DEFAULT NULL,
  `data_hora_recebimento` datetime DEFAULT NULL,
  `tipo_presente` varchar(45) DEFAULT NULL,
  `fk_rg_crianca` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_doacao`),
  KEY `fk_rg_crianca` (`fk_rg_crianca`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `doacao`
--

INSERT INTO `doacao` (`id_doacao`, `status_doacao`, `data_hora_entrega`, `data_hora_selecao`, `data_hora_recebimento`, `tipo_presente`, `fk_rg_crianca`) VALUES
(5, 'PENDENTE', NULL, '2021-10-12 22:10:00', NULL, 'KIT COMPLETO', '44.444.545-4'),
(6, 'PENDENTE', NULL, '2021-10-12 22:10:57', NULL, 'KIT SIMPLES', '58.999.989-9'),
(7, 'PENDENTE', NULL, '2021-10-12 23:10:49', NULL, 'KIT SIMPLES', '44.444.545-4'),
(8, 'PENDENTE', NULL, '2021-10-12 23:10:22', NULL, 'KIT SIMPLES', '44.444.545-4'),
(9, 'PENDENTE', NULL, '2021-10-12 23:10:10', NULL, 'KIT COMPLETO', '44.444.444-4'),
(10, 'PENDENTE', NULL, '2021-10-12 23:10:20', NULL, 'KIT SIMPLES', '44.444.545-4'),
(11, 'PENDENTE', NULL, '2021-10-12 23:10:27', NULL, 'KIT SIMPLES', '44.444.444-4'),
(12, 'PENDENTE', NULL, '2021-10-15 20:10:03', NULL, 'KIT SIMPLES', '54.545.545-5'),
(13, 'PENDENTE', NULL, '2021-10-15 20:10:35', NULL, 'KIT SIMPLES', '25.256.236-3'),
(14, 'PENDENTE', NULL, '2021-10-15 20:10:58', NULL, 'KIT COMPLETO', '25.665.869-5'),
(15, 'PENDENTE', NULL, '2021-10-15 20:10:30', NULL, 'KIT COMPLETO', '25.665.869-5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `doa_exibe`
--

DROP TABLE IF EXISTS `doa_exibe`;
CREATE TABLE IF NOT EXISTS `doa_exibe` (
  `fk_id_doacao` int(11) DEFAULT NULL,
  `fk_id_mensagem` int(11) DEFAULT NULL,
  KEY `fk_id_doacao` (`fk_id_doacao`),
  KEY `fk_id_mensagem` (`fk_id_mensagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fale_conosco`
--

DROP TABLE IF EXISTS `fale_conosco`;
CREATE TABLE IF NOT EXISTS `fale_conosco` (
  `id_fale_conosco` int(10) NOT NULL,
  `e_mail_fale_conosco` varchar(50) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `mensagem` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_fale_conosco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerencia`
--

DROP TABLE IF EXISTS `gerencia`;
CREATE TABLE IF NOT EXISTS `gerencia` (
  `fk_id_doacao` int(11) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  KEY `fk_id_doacao` (`fk_id_doacao`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `gerencia`
--

INSERT INTO `gerencia` (`fk_id_doacao`, `fk_id_cadastro`) VALUES
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 55),
(10, 1),
(11, 55),
(12, 1),
(13, 55),
(14, 79),
(15, 79);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem_sistema`
--

DROP TABLE IF EXISTS `mensagem_sistema`;
CREATE TABLE IF NOT EXISTS `mensagem_sistema` (
  `id_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `status_sistema` varchar(10) DEFAULT NULL,
  `mensagem` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_mensagem`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensagem_sistema`
--

INSERT INTO `mensagem_sistema` (`id_mensagem`, `status_sistema`, `mensagem`) VALUES
(16, 'FINALIZADO', 'CNPJ Inexistente\r\n'),
(17, 'FINALIZADO', 'CNPJ Inexistente'),
(18, 'FINALIZADO', 'kkj'),
(19, 'FINALIZADO', 'k\r\n'),
(20, 'FINALIZADO', 'lmklmk'),
(21, 'FINALIZADO', 'kjhjhj'),
(22, 'FINALIZADO', 'kl'),
(23, 'FINALIZADO', 'tghh'),
(24, 'FINALIZADO', 'kkj]\r\n'),
(25, 'FINALIZADO', 'fgfgfg'),
(26, 'FINALIZADO', 'ghhgh'),
(27, 'FINALIZADO', 'okjji'),
(28, 'FINALIZADO', 'erer'),
(29, 'PENDENTE', 'wewe'),
(30, 'PENDENTE', 'sdsd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `e_mail_newsletter` varchar(50) NOT NULL,
  PRIMARY KEY (`e_mail_newsletter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id_cadastro` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_cadastro` varchar(45) DEFAULT NULL,
  `nivel_acesso` int(1) DEFAULT NULL,
  `status_cadastro` varchar(10) DEFAULT NULL,
  `nome` varchar(80) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `rede_social` varchar(100) DEFAULT NULL,
  `e_mail` varchar(50) DEFAULT NULL,
  `numendereco` varchar(5) DEFAULT NULL,
  `logradouro` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` enum('AC','AL','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RR','RO','RJ','RN','RS','SC','SP','SE','TO') DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `fk_user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cadastro`),
  KEY `perfil_ibfk_1` (`fk_user`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_cadastro`, `tipo_cadastro`, `nivel_acesso`, `status_cadastro`, `nome`, `telefone`, `rede_social`, `e_mail`, `numendereco`, `logradouro`, `cidade`, `estado`, `cep`, `bairro`, `complemento`, `fk_user`) VALUES
(1, 'organizacao', 0, 'EA', 'MDL LTDA', '(11) 2515-5455', 'linkdln/mdl', 'mdl@mdlbrasil.com.br', '454', 'Av. Prink', 'SÃ£o Paulo', 'SP', '44487-878', 'Distrito Industrial', 'Ao lado da faber', 'mdl@mdlbrasil.com.br'),
(2, 'doador_pf', 0, 'OK', 'JosÃ© Guilherme', '(54) 5887-87878', 'facebook.com/jose guilherme', 'jose.guilherme@outlook.com.br', '545', 'Rua Hunger Sabaro', 'Sorocaba', 'SP', '54584-887', 'Jardim da Jufis', 'Ao lado ', 'jose.guilherme@outlook.com.br'),
(50, 'familia', 0, 'OK', 'Maria', '(45) 4444-54545', '', 'maria@hotmail.com', '55', 'Rua Natal', 'Salvador', 'BA', '18120-000', 'SertÃ£ozinho', 'Voud', 'familia@familia.com'),
(51, 'familia', 0, 'OK', 'Marina', '(54) 5454-55454', '', 'marina@hotmail.com', '545', 'Orion viaro', 'SÃ£o Paulo', 'SP', '54454-545', 'Jardim da Jufis', 'wsddsd', 'familia@familia.com'),
(52, 'familia', 0, 'OK', 'Marialva', '(54) 5454-54545', '', 'marialva@hotmail.com', '54545', 'Rua das fiqueiras', 'SÃ£o Paulo', 'SP', '45454-544', 'Sertao zinho 2', 'Aeroporto', 'familia@familia.com'),
(53, 'doador_pj', 0, 'RP', 'DSM LTDA', '(54) 5454-54545', 'facebook.com/dsm', 'dsm@hotmail.com', '448', 'Estrada Cefri', 'Mairique', 'SP', '54545-454', 'Cefri', 'perto da cefri', 'dsm@hotmail.com'),
(54, 'doador_pj', 0, 'RP', 'CARGIL LTDA', '(54) 5445-4545', 'facebook.com/cargil', 'cargil@cargil.com.br', '545', 'Rua da Silva', 'Sorocaba', 'SP', '54454-454', 'Sorocaba', 'Ao lado da faber', 'cargil@cargil.com.br'),
(55, 'organizacao', 0, 'EA', 'Doe para Vida LTDA', '(25) 4545-45454', 'facebook.com/doeparavida', 'doeparavida@hotmail.com', '5445', 'Rua Orion Viario', 'Sorocaba', 'SP', '54545-454', 'SÃ£o paulo', 'Sorocaba', 'doeparavida@hotmail.com'),
(56, 'familia', 0, 'OK', 'Jessica', '(45) 4545-45454', '', 'jessica@gmail.com', '4545', 'Rua da flores', 'Sorocaba', 'SP', '54545-454', 'JAbuticabal', 'sss', 'familia@familia.com'),
(57, 'doador_pf', 0, 'EA', 'joao', '(45) 4545-45454', 'facebook.com/joao', 'joao@hotmail.com', '545', 'Rua das alamedas', 'Sorocaba', 'SP', '54545-454', 'Jardim vitÃ³ria', 'ksk', 'joao@hotmail.com'),
(70, 'colaborador', 0, 'OK', '', '54545454445', '', 'ko@gmail.com', '56', '56', 'sao paulo', 'PR', '54545-454', 'Jardim vitÃ³ria', 'ksk', 'ko@gmail.com'),
(71, 'colaborador', 0, 'OK', '', '(54) 5454-55545', '', 'asasa', '44', '44', 'sao paulo', 'PR', '54554-545', 'asa', 'sasas', 'asas@gmail.com'),
(72, 'colaborador', 0, 'OK', 'asasa', '(54) 5454-55545', '', 'asas@gmail.com', '44', '44', 'sao paulo', 'PR', '54554-545', 'asa', 'sasas', 'asas@gmail.com'),
(73, 'colaborador', 0, 'OK', 'asasa', '(54) 5454-55545', '', 'asjjas@gmail.com', '44', '44', 'sao paulo', 'PR', '54554-545', 'asa', 'sasas', 'asjjas@gmail.com'),
(74, 'colaborador', 0, 'OK', 'asasa', '(54) 5454-55545', '', 'a855sjjas@gmail.com', '44', '44', 'sao paulo', 'PR', '54554-545', 'asa', 'sasas', 'a855sjjas@gmail.com'),
(75, 'colaborador', 0, 'OK', 'jose', '(44) 4444-44444', '', 'ko@gmail.com', '4', '4', 'sao paulo', 'PR', '54545-454', 'Jardim vitÃ³ria', 'ksk', 'ko@gmail.com'),
(76, 'colaborador', 0, 'OK', 'jose', '(44) 4444-44444', '', 'kdo@gmail.com', '4', '4', 'sao paulo', 'PR', '54545-454', 'Jardim vitÃ³ria', 'ksk', 'kdo@gmail.com'),
(77, 'familia', 0, 'OK', 'Joana', '(54) 5455-5555', '', 'joana@hotmail.com', '42', 'Jasmin', 'Sorocaba', 'BA', '12525-525', 'TrÃªs LAgoas', 'sss', 'familia@familia.com'),
(78, 'familia', 0, 'OK', 'Amanda', '(54) 5454-4141', '', 'fernanda@gmail.com', '42', 'Jasmin', 'SÃ£o Paulo', 'PA', '12525-525', 'SÃ£o luis', '656', 'familia@familia.com'),
(79, 'organizacao', 0, 'EA', 'Nova Vida LTDA', '(54) 5454-4141', 'facebook.com/nova vida', 'novavida@hotmail.com', '42', 'Jasmin', 'SÃ£o Paulo', 'PA', '12525-525', 'SÃ£o luis', '656', 'novavida@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_exibe`
--

DROP TABLE IF EXISTS `perfil_exibe`;
CREATE TABLE IF NOT EXISTS `perfil_exibe` (
  `fk_id_mensagem` int(11) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  KEY `fk_id_mensagem` (`fk_id_mensagem`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil_exibe`
--

INSERT INTO `perfil_exibe` (`fk_id_mensagem`, `fk_id_cadastro`) VALUES
(16, 53),
(17, 53),
(18, 53),
(19, 53),
(20, 53),
(21, 53),
(22, 53),
(23, 53),
(24, 53),
(25, 53),
(26, 53),
(27, 53),
(28, 53),
(29, 53),
(30, 53);

-- --------------------------------------------------------

--
-- Estrutura da tabela `possui_colab`
--

DROP TABLE IF EXISTS `possui_colab`;
CREATE TABLE IF NOT EXISTS `possui_colab` (
  `fk_cpf` varchar(15) DEFAULT NULL,
  `fk_cnpj` varchar(18) DEFAULT NULL,
  `fk_id_colaborador` int(11) DEFAULT NULL,
  KEY `fk_cpf` (`fk_cpf`),
  KEY `fk_cnpj` (`fk_cnpj`),
  KEY `fk_id_colaborador` (`fk_id_colaborador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `possui_colab`
--

INSERT INTO `possui_colab` (`fk_cpf`, `fk_cnpj`, `fk_id_colaborador`) VALUES
('544.545.455-82', '58.484.488/4848-88', 13),
('552.225.588-88', '58.484.488/4848-88', 14),
('525.699.999-99', '58.484.488/4848-88', 15),
('545.699.999-99', '58.484.488/4848-88', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `possui_cri`
--

DROP TABLE IF EXISTS `possui_cri`;
CREATE TABLE IF NOT EXISTS `possui_cri` (
  `fk_rg_crianca` varchar(12) DEFAULT NULL,
  `fk_id_familia` int(11) DEFAULT NULL,
  KEY `fk_rg_crianca` (`fk_rg_crianca`),
  KEY `fk_id_familia` (`fk_id_familia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `possui_cri`
--

INSERT INTO `possui_cri` (`fk_rg_crianca`, `fk_id_familia`) VALUES
('44.444.545-4', 39),
('44.878.787-8', 40),
('58.999.989-9', 41),
('44.444.444-4', 42),
('54.545.545-5', 43),
('25.256.236-3', 44);

-- --------------------------------------------------------

--
-- Estrutura da tabela `realiza`
--

DROP TABLE IF EXISTS `realiza`;
CREATE TABLE IF NOT EXISTS `realiza` (
  `fk_id_doacao` int(11) DEFAULT NULL,
  `fk_id_cadastro` int(11) DEFAULT NULL,
  KEY `fk_id_doacao` (`fk_id_doacao`),
  KEY `fk_id_cadastro` (`fk_id_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `realiza`
--

INSERT INTO `realiza` (`fk_id_doacao`, `fk_id_cadastro`) VALUES
(5, 53),
(6, 54),
(7, 54),
(8, 2),
(9, 2),
(10, 2),
(11, 57),
(12, 2),
(13, 55),
(14, 2),
(15, 53);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `user` varchar(50) NOT NULL,
  `senha` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`user`, `senha`) VALUES
('a855sjjas@gmail.com', '44'),
('asas@gmail.com', 'asa'),
('asjjas@gmail.com', '54545'),
('cargil@cargil.com.br', '123456'),
('colaborador@colaborador.com', '123456'),
('doeparavida@hotmail.com', '123456'),
('dsm@hotmail.com', '123456'),
('familia@familia.com', '123456'),
('joao@hotmail.com', '123456'),
('jose.guilherme@outlook.com.br', '123456'),
('kdo@gmail.com', ''),
('ko@gmail.com', '44444'),
('mdl@mdlbrasil.com.br', '123456'),
('novavida@hotmail.com', '123456');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `usuario` (`user`);

--
-- Limitadores para a tabela `cadastra`
--
ALTER TABLE `cadastra`
  ADD CONSTRAINT `cadastra_ibfk_1` FOREIGN KEY (`fk_rg_crianca`) REFERENCES `dados_crianca` (`rg_crianca`),
  ADD CONSTRAINT `cadastra_ibfk_2` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `colaborador`
--
ALTER TABLE `colaborador`
  ADD CONSTRAINT `colaborador_ibfk_1` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `dados_pf`
--
ALTER TABLE `dados_pf`
  ADD CONSTRAINT `dados_pf_ibfk_1` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `dados_pj`
--
ALTER TABLE `dados_pj`
  ADD CONSTRAINT `dados_pj_ibfk_1` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `dados_responsavel`
--
ALTER TABLE `dados_responsavel`
  ADD CONSTRAINT `dados_responsavel_ibfk_1` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `doacao`
--
ALTER TABLE `doacao`
  ADD CONSTRAINT `doacao_ibfk_1` FOREIGN KEY (`fk_rg_crianca`) REFERENCES `dados_crianca` (`rg_crianca`);

--
-- Limitadores para a tabela `doa_exibe`
--
ALTER TABLE `doa_exibe`
  ADD CONSTRAINT `doa_exibe_ibfk_1` FOREIGN KEY (`fk_id_doacao`) REFERENCES `doacao` (`id_doacao`),
  ADD CONSTRAINT `doa_exibe_ibfk_2` FOREIGN KEY (`fk_id_mensagem`) REFERENCES `mensagem_sistema` (`id_mensagem`);

--
-- Limitadores para a tabela `gerencia`
--
ALTER TABLE `gerencia`
  ADD CONSTRAINT `gerencia_ibfk_1` FOREIGN KEY (`fk_id_doacao`) REFERENCES `doacao` (`id_doacao`),
  ADD CONSTRAINT `gerencia_ibfk_2` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `usuario` (`user`);

--
-- Limitadores para a tabela `perfil_exibe`
--
ALTER TABLE `perfil_exibe`
  ADD CONSTRAINT `perfil_exibe_ibfk_1` FOREIGN KEY (`fk_id_mensagem`) REFERENCES `mensagem_sistema` (`id_mensagem`),
  ADD CONSTRAINT `perfil_exibe_ibfk_2` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);

--
-- Limitadores para a tabela `possui_colab`
--
ALTER TABLE `possui_colab`
  ADD CONSTRAINT `possui_colab_ibfk_1` FOREIGN KEY (`fk_cpf`) REFERENCES `dados_pf` (`cpf`),
  ADD CONSTRAINT `possui_colab_ibfk_2` FOREIGN KEY (`fk_cnpj`) REFERENCES `dados_pj` (`cnpj`),
  ADD CONSTRAINT `possui_colab_ibfk_3` FOREIGN KEY (`fk_id_colaborador`) REFERENCES `colaborador` (`id_colaborador`);

--
-- Limitadores para a tabela `possui_cri`
--
ALTER TABLE `possui_cri`
  ADD CONSTRAINT `possui_cri_ibfk_1` FOREIGN KEY (`fk_rg_crianca`) REFERENCES `dados_crianca` (`rg_crianca`),
  ADD CONSTRAINT `possui_cri_ibfk_2` FOREIGN KEY (`fk_id_familia`) REFERENCES `dados_responsavel` (`id_familia`);

--
-- Limitadores para a tabela `realiza`
--
ALTER TABLE `realiza`
  ADD CONSTRAINT `realiza_ibfk_1` FOREIGN KEY (`fk_id_doacao`) REFERENCES `doacao` (`id_doacao`),
  ADD CONSTRAINT `realiza_ibfk_2` FOREIGN KEY (`fk_id_cadastro`) REFERENCES `perfil` (`id_cadastro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
