-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Set-2022 às 14:23
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nomec` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nomec`) VALUES
(4, '1'),
(5, '2'),
(6, '3'),
(7, '4'),
(8, '5'),
(9, 'balcao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `user`, `pass`) VALUES
(1, 'agroimp', '12345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `cod` int(11) NOT NULL,
  `nome` varchar(400) NOT NULL,
  `estoque` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `valor` float NOT NULL,
  `valorv` float(255,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`cod`, `nome`, `estoque`, `cat`, `valor`, `valorv`) VALUES
(1111, 'corda 8mm/ 240m/ 0,80 centavos ao metro', 1, 7, 0.8, 0.00),
(1112, 'corda 10mm 165m/ 1,20 real ao metro', 1, 7, 1.2, 0.00),
(1113, 'corda 6mm 190m/ 0,60 centavos ao metro', 1, 7, 0.6, 0.00),
(1114, 'corda 4mm 340m/ 0,40 centavos ao metro', 1, 7, 0.4, 0.00),
(10101, 'luva tricotada banho nitrÃ­co/ SUPER SAFETY', 12, 0, 0, 0.00),
(101010, 'luva tricotada banho nitrico/ tam G/ SUPER SAFETY', 12, 5, 5.87, 9.80),
(101011, 'luva pigmentada/ 4 fios/ tam unico / JULI-ANA', 12, 5, 3.54, 6.50),
(101012, 'luva latex natural grip amarela/ tam P/m/g/xg DANNY', 29, 5, 3.28, 6.49),
(101013, 'luva malha mesclada 4 fios/ tam unico/ JULI-ANA', 10, 5, 2.81, 5.20),
(101014, 'luva vaqueta pura LVPM/ LZTOOLS', 2, 5, 20.21, 34.99),
(101015, 'luva neolatex e neoprine/ tam G/ DANNY', 12, 5, 9.16, 15.99),
(101016, 'luva tricotada/ flextactil preta/ tam G', 12, 5, 3.95, 6.99),
(101017, 'luva nitrica punho malha/LIGHFLEX/ tam XG', 3, 5, 10.84, 18.01),
(101018, 'vassoura grama plastica com cabo/ LZTOOLS', 6, 5, 12.99, 19.99),
(101019, 'sacho com cabo 1 ponta ', 1, 5, 19.12, 29.99),
(101020, 'broxa pintura plastica media ', 3, 5, 3.56, 7.01),
(101021, 'broxa pintura plastica grande', 2, 5, 5.17, 10.01),
(101022, 'ratoeira ferro pequena zincada ', 24, 5, 2.78, 5.01),
(101023, 'esguicho excÃªntrico longo 2,8mm', 5, 5, 34.99, 58.01),
(101024, 'irrigador giratÃ³rio base espiga', 2, 5, 16.81, 27.99),
(101025, 'esguicho reto ajustavel 1/2', 5, 5, 4.61, 8.99),
(101026, 'esguicho 7 funÃ§Ãµes 1/2', 3, 5, 10.43, 18.99),
(101027, 'mordente arame  n.5 ', 1, 5, 44.91, 69.99),
(101028, 'mascara respiratoria sem cartucho/ CG', 2, 5, 36.81, 50.99),
(101029, 'lixa d agua grao 80', 25, 5, 1.57, 3.01),
(101030, 'lixa d agua grao 100', 50, 5, 1.57, 3.01),
(101031, 'pedra afiadora oval 230mm', 2, 5, 4.34, 9.01),
(101032, 'pedra face dupla 150 mm', 1, 5, 6.41, 11.99),
(101033, 'fita isolante imperial/ 3M/ 18mm x 5m', 10, 5, 2.49, 5.01),
(101034, 'fita isolante imperial 3M/ 18mmx10m ', 10, 5, 3.97, 9.01),
(101035, 'fita isolante imperial 3M/ 18mmx20m', 10, 5, 7.09, 14.01),
(101036, 'singer graxa/oleo multiuso/100ml', 6, 5, 6.41, 12.01),
(101037, 'graxa amarela 1kg/ unigrax', 2, 5, 27.91, 47.99),
(101038, 'oleo corrente motosserra 5l/ unix', 1, 5, 82.31, 120.01),
(101039, 'oleo motossera 1L/unix', 1, 5, 21.21, 34.99),
(101040, 'saca rolha plastico', 4, 5, 1.51, 3.99),
(101041, 'funil biscoito inox', 5, 5, 4.91, 9.99),
(101042, 'facao cabo plastico 16', 2, 5, 24.18, 38.99),
(101043, 'facao cabo plastico 18', 2, 5, 26.62, 43.99),
(101044, 'vassoura com cabo', 12, 5, 11.68, 14.99),
(101045, 'rodo com cabo plastico', 5, 5, 11.55, 16.99),
(101046, 'pa lixo plastica', 4, 5, 3.79, 7.99),
(101047, 'valvula para pulvirizador', 2, 5, 5.25, 9.01),
(101048, 'britola aÃ§o carbono', 5, 5, 21.15, 35.99),
(101049, 'linha nylon quadrada/ 190m', 1, 5, 1.01, 2.20),
(101050, 'linha nylon redonda/325m', 1, 5, 0.81, 2.01),
(101051, 'pino quebra dedo', 20, 0, 3.11, 0.00),
(101052, 'pino quebra dedo 7/16', 20, 9, 3.11, 5.99),
(101053, 'ferrolho fio chato porta cadeado', 12, 5, 8.93, 15.50),
(101054, 'gancho com chapa para rede/7,0mm', 12, 5, 4.75, 8.99),
(101055, 'chumbada 03', 1, 9, 0.48, 1.01),
(101056, 'chumbada 01', 1, 9, 0.1, 0.51),
(101057, 'boia 06', 100, 9, 0.1, 0.50),
(101058, 'boia 07', 50, 9, 0.2, 0.60),
(101059, 'boia 03', 100, 9, 0.1, 0.41),
(101060, 'chumbo espingarda 4,5mm', 1, 9, 12.99, 18.99),
(101061, 'chumbo espingarda 5,5mm', 1, 9, 14.59, 25.99),
(101062, 'cadeado 35mm/ PADO', 2, 9, 23.47, 38.99),
(101063, 'cadeado 40mm/ PADO ', 2, 9, 26.57, 39.99),
(101064, 'linha nylon branca dourado 0,20mm', 10, 9, 2.24, 0.00),
(101065, 'linha nylon branca dourado 0,40mm', 10, 9, 3.16, 6.99),
(101066, 'linha nylon dourado 0,50mm', 10, 9, 4.94, 10.99),
(101067, 'linha nylon dourado 0,70', 10, 9, 7.64, 13.99),
(101068, 'linha nylon dourado 0,90mm', 10, 9, 11.45, 19.99),
(101069, 'alcinho curvo leve 12 dentes/ sem cabo', 2, 5, 20.5, 0.00),
(101070, 'cabo de madeira para alcinho reforcado', 6, 5, 5.51, 10.99),
(101071, 'cabo madeira para foice', 6, 5, 6.52, 12.99),
(101072, 'adaptador externo 3/4', 50, 5, 0.65, 1.30),
(101073, 'adaptador externo 1p', 25, 5, 1.25, 2.51),
(101074, 'adaptador externo 1/2', 50, 5, 0.5, 1.01),
(101075, 'tee preto interno 1/2', 50, 5, 0.97, 2.50),
(101076, 'tee preto interno 3/4', 25, 5, 1.48, 3.01),
(101077, 'tee preto interno 1p', 25, 5, 2.07, 4.99),
(101078, 'uniao preta interna 1/2', 50, 5, 0.42, 1.01),
(101079, 'uniao preta interna 3/4', 50, 5, 0.45, 1.01),
(101080, 'uniao preta interna 1p ', 25, 5, 1.09, 2.99),
(101081, 'tee preto triplo 1/2', 25, 5, 0.73, 1.99),
(101082, 'tee preto triplo 3/4', 25, 5, 1.45, 3.99),
(101083, 'fita veda rosca 18mmx50m', 3, 9, 4.9, 8.01),
(101084, 'torneira boia para caixa de agua 1/2 3/4 ', 2, 5, 8.91, 15.99),
(101085, 'boia automatica de nivel', 3, 5, 27.18, 50.99),
(101086, 'jogo broca aÃ§o rÃ¡pido 3 peÃ§as 6/8/10', 1, 5, 30.91, 58.99),
(101087, 'jogo broca para concreto golden line 5/6/8/10', 3, 5, 23.81, 45.99),
(101088, 'argola abraÃ§adeira fita 32-44mm', 10, 5, 3.36, 7.01),
(101089, 'argola abraÃ§adeira fita 9 13-19mm', 10, 5, 1.14, 3.99),
(101090, 'clips cabo de aÃ§o 6,4mm', 25, 5, 1.01, 2.99),
(101091, 'clips cabo de aÃ§o 8,0mm', 25, 5, 1.37, 3.50),
(101092, 'clips cabo de aÃ§o 10,0mm', 25, 5, 2.8, 6.01),
(101093, 'clips cabo de aÃ§o 12,7mm', 25, 5, 4.58, 9.01),
(101094, 'esticador cabo de aÃ§o 8,0mm', 10, 5, 5.17, 10.99),
(101095, 'esticador cabo de aÃ§o 10,0mm', 6, 5, 7.52, 14.99),
(101096, 'esticador cabo de aÃ§o 12,0mm', 5, 5, 13.68, 19.99),
(101097, 'abridor de garrafa comum ', 12, 9, 2.29, 5.01),
(101098, 'isca granulada grao forte sulfonamida ', 2, 5, 7.91, 14.99),
(101099, 'kombate isca granulada pacote40x25g p rato', 40, 5, 0.51, 1.50),
(101101, 'jimo mata barata aerosol 300ml', 2, 5, 14.08, 24.99),
(101102, 'jimo anti inset aerosol 300ml', 2, 5, 13.24, 24.99),
(101103, 'jimo cupim incolor aerosol 400ml ', 2, 5, 27.95, 45.99),
(101104, 'desengripante mp1 lub mundial prime 321ml', 10, 5, 8.24, 11.99),
(101105, 'espatula inox pvc 80mm', 2, 5, 6.38, 11.99),
(101106, 'espatula inox cabo abs 25mm', 3, 5, 11.17, 19.99),
(101107, 'espatula inox cabo abs 40mm', 3, 5, 11.89, 19.99),
(101108, 'caixa correspondÃªncia plastica amarela -80', 1, 5, 18.98, 29.99),
(101109, 'jogo de escova aÃ§o manual media com 3 peÃ§as', 2, 5, 10.66, 18.99),
(101110, 'escova aÃ§o tipo copo aÃ§o carbono', 1, 5, 14.66, 27.99),
(101111, 'pulverizador pneumatico pistola', 2, 5, 11.23, 16.99),
(101112, 'almotolia metÃ¡lica bico flex 300ml ', 1, 5, 17.37, 28.99),
(101113, 'pulverizador pneumatico plastico ', 1, 5, 13.39, 18.99),
(101114, 'alicate de pressao mordente curvo 10', 2, 5, 29.99, 45.99),
(101115, 'cintas nylon branca 2,5x150mm', 3, 5, 4.25, 8.99),
(101116, 'cinta nylon branca 2,5x200mm', 3, 5, 6.61, 12.99),
(101117, 'cinta nylon branca 3,5x150mm', 3, 5, 7.99, 14.99),
(101118, 'cinta nylon branca 3,5x300mm', 3, 5, 17.3, 28.99),
(101119, 'cinta nylon branca 4,8x300mm', 1, 5, 22.5, 42.99),
(101120, 'alicate universal 8 dts ', 3, 6, 18.82, 32.99),
(101121, 'arame farpado nelore 100m morlan', 1, 6, 104.61, 148.99),
(101122, 'bomba d agua perif 1HP BIVOLT', 1, 6, 388.88, 569.99),
(101123, 'bomba d agua perif 1/2HP 220V', 1, 6, 192.22, 350.01),
(101124, 'BOTINA C/CADARÃ‡O S/BICO n39 a n45', 14, 6, 41.97, 70.99),
(101125, 'BOTINA ELASTICO S/BICO AÃ‡O n39 a 42', 8, 6, 29.91, 58.99),
(101126, 'cabo p/cavadeira reta 150x3,8cm', 3, 5, 7.41, 14.99),
(101127, 'cabo p/foice 100cm ', 5, 5, 5.46, 10.99),
(101128, 'cabo p/picareta 95cm ', 3, 5, 13.91, 19.99),
(101129, 'cabo p/bateria reforcado 3,5m', 1, 6, 62.01, 99.99),
(101130, 'cadeado papaiz 35mm', 2, 9, 25.51, 40.99),
(101131, 'cadeado papaiz 40mm ', 2, 9, 27.51, 42.99),
(101132, 'dobradiÃ§a pino solto zincado 2', 24, 9, 1.27, 3.99),
(101133, 'dobradiÃ§a pino solto zincado 3', 24, 9, 1.81, 3.99),
(101134, 'durepoxi 50g branco', 6, 9, 4.01, 8.99),
(101135, 'escova de aÃ§o c/cabo plast 4 car ', 12, 6, 6.75, 12.99),
(101136, 'esquadro plastico 12', 3, 6, 10.63, 19.99),
(101137, 'extensor elastico gancho plastico 1,00m', 10, 6, 2.65, 5.99),
(101138, 'fita crepe 16mmx50m eurocel', 7, 6, 4.27, 8.99),
(101139, 'fita crepe 18mmx50', 6, 6, 3.67, 6.99),
(101140, 'fita lacre 45x45 ', 4, 6, 3.97, 8.99),
(101141, 'foicinha lisa tramontina', 2, 5, 22.81, 39.99),
(101142, 'jogo de chave comb. 6 a 22 12pcs', 1, 6, 98.91, 149.99),
(101143, 'jogo de chave fixa de 6 a 32 12 pcs', 1, 6, 120.21, 171.99),
(101144, 'oleo multiuso 100ml dtools', 4, 5, 4.04, 8.99),
(101145, 'pincel cerda branca atlas a 1/2', 12, 6, 1.86, 3.99),
(101146, 'pincel cerda branca atlas b 3/4', 12, 6, 2.12, 4.99),
(101147, 'pincel cerda branca atlas 1', 12, 6, 2.97, 6.99),
(101148, 'pincel cerda gris 1/2 ', 12, 6, 1.84, 3.99),
(101149, 'pincel cerda gris 3/4', 12, 6, 1.84, 3.99),
(101150, 'pincel cerda gris 1', 12, 6, 2.52, 5.99),
(101151, 'protetor auditivo ', 6, 9, 0.81, 2.01),
(101152, 'serra aÃ§o bimetal flex 24d ', 10, 6, 5.96, 11.99),
(101153, 'silicone branco 280g', 2, 6, 24.91, 39.99),
(101154, 'torn. herc p/jardim 1/2 c/adaptador 3/4', 12, 6, 2.03, 5.01),
(101155, 'torn. herc p/tanque longa 1/2', 12, 6, 4.35, 10.99),
(101156, 'creolina 50ml ', 12, 9, 9.69, 19.99),
(101157, 'jimo penetril aerosol 400ml', 2, 6, 17.97, 27.99),
(101158, 'bebedouro para frango 5l', 6, 7, 8.34, 19.99),
(101159, 'grampo para cabo d aÃ§o5/8x16,0mm', 10, 6, 5.21, 12.99),
(101160, 'grampo p/cabo de aÃ§o 1/2x12,5mm', 10, 5, 4.04, 9.99),
(101161, 'grampo p/cabo de aÃ§o 5/16x8mm', 10, 6, 1.27, 4.01),
(101162, 'capa de chuva pvc amarela ', 2, 6, 29.95, 56.99),
(101163, 'barbante para salame c70m', 10, 6, 2.93, 7.99),
(101164, 'vassoura faceira c/c', 6, 6, 10.71, 13.99),
(101165, 'bota pega forte c/c s/f n39 ao n42', 8, 6, 29.45, 49.99),
(101166, 'macacao compl. p/apicultura tam g', 1, 6, 85.31, 146.99),
(101167, 'suporte para mangueira ', 4, 6, 9.17, 18.99),
(101168, 'enxada s/c oval tipo italiana', 2, 6, 33.33, 45.99),
(101169, 'comed. 5kg', 4, 6, 23.43, 36.99),
(101170, 'pulverizador costal 20L CONEX PRO', 4, 6, 126.99, 182.99),
(101171, 'pulverizador costal 20l mundi pro', 1, 6, 135.4, 189.99),
(101172, 'mang supermaleavel  1/2 x2 50m', 1, 7, 1.68, 3.20),
(101173, 'garrafao termico vermelho 5l', 3, 7, 31.63, 49.99),
(101174, 'garrafao isotermico 9L', 1, 7, 98.01, 139.99),
(101175, 'pulverizador costal 2 em 1 20L ', 1, 6, 299.99, 422.99),
(101176, 'bomba pulverizadora 40Lx40 FERRO', 1, 6, 541.13, 912.99),
(101177, 'abraÃ§adeira arco 1/2 rosca ', 10, 9, 39.13, 78.99),
(101178, 'porta bicos REG.DUPLA 0.8/1.2', 10, 9, 108.21, 198.99),
(101179, 'mang preta de 1/2 2,5m tarja azul 100m', 1, 7, 1.87, 2.70),
(101180, 'mang preta tarja azul 1/2 2,00mm  50m', 1, 7, 1.53, 2.40),
(101181, 'mang preta tarja azul 3/4 2,50mm/ 2 rolos de 50m', 1, 7, 2.22, 3.50),
(101182, 'mang laranja tranÃ§ada 1/2 x 2,20 50m', 1, 7, 3.76, 6.50),
(101183, 'substrato germinal p/horta 20kg', 5, 6, 21.5, 41.99),
(101184, 'seringa veterinaria .03 ml ', 10, 9, 0.58, 2.01),
(101185, 'vitagold potencializador oral 50 ML', 2, 9, 13.7, 21.99),
(101186, 'proverme po 28g', 5, 9, 5.02, 10.01),
(101187, 'verme plus 20ml ', 2, 9, 10.86, 19.99),
(101188, 'spray p/cavalo100ml', 4, 9, 17.55, 27.99),
(101189, 'mata bicheira spray 500ml', 2, 9, 7.97, 14.99),
(101190, 'formicida made po 400 1kg ', 3, 5, 8.72, 16.99),
(101191, 'isca granulada grao verde 10x50gr', 3, 5, 13.14, 20.01),
(101192, 'raticida granulado 25gr p rato', 40, 5, 0.35, 1.51),
(101193, 'corrente p/cachorro n07 1,2mm', 12, 9, 3.92, 8.01),
(101194, 'corrente p/cachorro n04 2.0mm', 12, 9, 6.49, 12.99),
(101195, 'pluviometro s/laco ', 3, 9, 10.95, 20.99),
(101196, 'fitilho f10/ 350m', 2, 7, 14.2, 27.99),
(101197, 'regador plastico 10l', 2, 7, 12.64, 24.99),
(101198, 'regador plastico 5l', 4, 7, 10.29, 20.01),
(101199, 'torques carpinteiro 8 tramontina', 2, 7, 26.64, 46.99),
(101201, 'machado pesado s/cabo ', 2, 5, 55.31, 80.99),
(101202, 'foice sul s/cabo', 2, 5, 26.62, 44.99),
(101203, 'picareta pa estreita s/cabo', 1, 5, 43.43, 76.99),
(101204, 'picareta pa larga s/cabo', 1, 5, 54.31, 85.01),
(101205, 'enxada olho oval s/cabo', 2, 5, 18.16, 32.99),
(101206, 'cavadeira corte reto s/cabo', 2, 5, 23.4, 40.01),
(101207, 'pa de concha de bico ', 2, 5, 23.83, 37.99),
(101208, 'bebedouro beija flor comun ', 2, 9, 6.46, 11.99),
(101209, 'coleira n01', 3, 9, 5.48, 10.01),
(101210, 'coleira n03', 3, 9, 8.74, 14.99),
(101211, 'coleira n05', 3, 9, 14.21, 26.99),
(101212, 'coleira n07', 3, 9, 21.01, 37.99),
(101213, 'sabao matacura', 2, 9, 4.64, 8.99),
(101214, 'pomada saralogo 30gr', 2, 9, 12.63, 20.99),
(101215, 'capa para sulfatar tam m/g/gg/xg', 9, 7, 142.01, 193.99),
(101216, 'chave fenda 3/16x6p tramontina', 2, 7, 5.54, 10.99),
(101217, 'chave fenda 1/8x4p tramontina', 2, 7, 3.94, 8.01),
(101218, 'chave de fenda 1/4x6p tramontina', 2, 7, 7.28, 14.99),
(101219, 'chave de fenda 5/16x6p tramontina', 2, 7, 11.18, 19.99),
(101220, 'chave de fenda 1/4x10p tramontina', 2, 7, 9.17, 17.99),
(101221, 'chave de fenda 3/8x6p tramontina ', 2, 7, 16.21, 25.99),
(101222, 'chave de de fenda 1/4x4p tramontina', 2, 7, 6.39, 12.99),
(101223, 'chave de fenda 1/8x5p tramontina', 2, 7, 4.15, 7.99),
(101224, 'chave de fenda 3/16x4p tramontina ', 2, 7, 5.01, 9.99),
(101225, 'chave phillips 1/8x3p tramontina', 2, 7, 4.08, 0.00),
(101226, 'chave phillips 5/16x6p tramontina', 2, 7, 11.84, 20.01),
(101227, 'chave phillips 3/16x3p tramontina ', 2, 7, 5.35, 9.99),
(101228, 'gaiola p/passarinho tamanho grande', 1, 6, 80.01, 19.99),
(101229, 'gaiola p/passarinho medio ', 1, 6, 70.01, 112.99),
(101230, 'gaiola p/passarinho pequeno', 2, 6, 65.02, 107.02),
(101231, 'gaiola p/passarinho extra pequeno', 1, 6, 55.01, 99.99),
(101232, 'casa plastica n03 rosa ', 1, 8, 88.01, 132.99),
(101233, 'casa plastica n02 cinza ', 1, 8, 45.01, 86.99),
(101234, 'adaptador p/ponteira 1/2p tramontina', 12, 5, 3.08, 6.01),
(101235, 'coleira c/guia  poliester n05', 2, 8, 15.86, 27.99),
(101236, 'coleira c/guia  poliester n06', 2, 8, 19.95, 27.99),
(101237, 'coleira c/guia  poliester n07', 2, 8, 20.36, 40.01),
(101238, 'machado 3,5 c/c dtools', 3, 5, 63.5, 105.99),
(101239, 'mang jardin tranc 100m dtools ', 1, 7, 2.71, 5.20),
(101240, 'martelo fibra 27mm', 1, 7, 36.5, 62.99),
(101241, 'martelo fibra 29mm', 1, 7, 40.41, 72.99),
(101242, 'pa chipa de bico c/c dtools', 2, 5, 46.32, 84.99),
(101243, 'picareta larga c/c 10cm dtools ', 1, 5, 66.69, 107.99),
(101244, 'lima moto serra 8x 7/32', 3, 7, 14.64, 26.99),
(101245, 'martelo tramontina 20mm', 1, 7, 26.91, 42.99),
(101246, 'bomba d agua submersa 3/4 660 290w/ 220v', 1, 6, 268.8, 422.99),
(101247, 'balanÃ§a gancho eletronica 50kg', 1, 9, 28.8, 49.99),
(101248, 'tesoura poda conex tipo japonesa', 3, 9, 48.8, 69.99),
(101249, 'fita amarrar/ parreirinha', 10, 9, 2.91, 4.90),
(101250, 'super bonde 20gr henkel', 3, 9, 5.91, 10.01),
(101251, 'engate rapido jardin mundi 1/2', 12, 5, 2.9, 4.90),
(101252, 'engate rapido jardin tramontina 1/2', 3, 5, 2.9, 4.90),
(101253, 'tesoura poda tipo japonesa 8 mundi', 3, 9, 46.4, 69.99),
(101254, 'desengripante 300ml WD40 ', 3, 5, 28.8, 42.99),
(101255, 'broca aÃ§o rapido 6.00mm conex', 2, 9, 6.78, 12.99),
(101256, 'broca aÃ§o rapido 7.00mm conex ', 2, 9, 9.44, 17.99),
(101257, 'broca aÃ§o rapido 9.00mm conex', 2, 9, 15.46, 26.99),
(101258, 'broca aÃ§o rapido 10.00mm conex', 2, 9, 16.9, 27.99),
(101259, 'broca aÃ§o rapido 11.00mm conex', 2, 9, 25.98, 36.99),
(101260, 'G. chuva curvo/ reto preto GIG  duplo', 4, 6, 26.99, 34.99),
(101261, 'G. chuva reto/duplo GIG  xadrez duplo', 4, 6, 28.39, 35.99),
(101262, 'somb. estampada 16v ', 2, 6, 30.29, 39.99),
(101263, 'somb. mini ', 2, 6, 17.09, 27.99),
(101264, 'escova oval plastica', 12, 5, 1.58, 5.01),
(101265, 'vassoura piacava ', 4, 5, 5.1, 9.99),
(101266, 'vassoura p/jardim ', 3, 5, 7.65, 14.99),
(101267, 'garrafao termico 5l', 2, 7, 29.99, 42.99),
(101268, 'cuia c/ estampada ', 3, 9, 13.23, 22.01),
(101269, 'cuia c/ desenhada', 3, 9, 15.35, 26.99),
(101270, 'espeto simples inox 95cm ', 12, 4, 9.16, 16.99),
(101271, 'espeto duplo cromado ', 3, 4, 12.99, 19.99),
(101272, 'funil colorido ', 12, 9, 1.5, 4.01),
(101273, 'balde 13 L ', 3, 5, 14.21, 19.99),
(101274, 'balde 8L', 3, 5, 7.49, 14.99),
(101275, 'semente feltrin', 250, 9, 1.31, 3.01),
(101276, 'botina elastico c/bico aÃ§o n39 a n 43', 10, 6, 37.34, 69.99),
(101277, 'escada alum 5 degraus 154cm /mor', 2, 9, 145.52, 196.99),
(101278, 'escada alum 6 deugraus 175cm /mor', 2, 9, 168.52, 222.99),
(101279, 'jc 10 terminal', 1, 9, 75.4, 105.99),
(101280, 'jc 11 terminal', 1, 9, 48.01, 74.99),
(101281, 'jc 12 terminal ', 1, 9, 48.01, 74.99),
(101282, 'jc 13 terminal', 1, 9, 48.01, 74.99),
(101283, 'jc 20 terminal', 1, 9, 96.92, 142.99),
(101284, 'jc 21 terminal ', 1, 9, 70.5, 105.99),
(101285, 'jc 22 terminal ', 1, 9, 70.5, 105.99),
(101286, 'jc 04/ cz 101 cruzeta ', 1, 9, 36.8, 72.99),
(101287, 'jc 36/ cz 202 cruzeta ', 1, 9, 52.01, 98.99),
(101288, 'tubo jz 07', 2, 7, 94.27, 155.99),
(101289, 'tubo jc 28 ', 1, 7, 135.25, 216.99),
(101290, 'barra jc 08', 2, 7, 116.16, 185.99),
(101291, 'barra jc 29', 1, 7, 205.67, 307.99),
(101292, 'disco 43cm ferro lixado ', 1, 5, 108.37, 149.99),
(101293, 'fog 2x1 c/borda 34cm ', 1, 5, 110.1, 167.99),
(101294, 'fog 2x1 p/disco e panela 35cm ', 1, 5, 105.3, 162.99),
(101295, 'fog 6 caulins 30cm linha leve', 2, 5, 57.27, 87.99),
(101296, 'fog baby 22 cm ', 1, 5, 59.2, 79.99),
(101297, 'fog p/botijao 22cm ', 1, 5, 42.99, 74.99),
(101298, 'mangueira m/ para fog', 3, 9, 6.6, 12.99),
(101299, 'registro c/borboleta p/fog', 2, 9, 14.7, 28.99),
(101301, 'registro destorcedor p/fog ', 2, 9, 14.7, 28.99),
(101302, 'registro p/fog duplo ', 2, 9, 28.2, 49.99),
(101303, 'cano de emenda tripe 60cm ', 1, 5, 27.44, 49.99),
(101304, 'caulin ', 10, 9, 1.18, 5.01),
(101305, 'bota nautica azul n39 a n45/ innpro', 12, 6, 56.05, 89.99),
(101306, 'bota nautica pega forte azul c/l n39 a n 45', 12, 6, 49.05, 89.99),
(101307, 'respirador 1/4 facial mastt 2001-VO ', 3, 6, 22.49, 46.99),
(101308, 'sem. BL HORTA  almeiro folha larga', 10, 9, 3.01, 5.01),
(101309, 'racao bocao orginal 25kg', 4, 8, 102.99, 131.99),
(101310, 'racao bocao premium caes adultos 25kg', 4, 8, 123.01, 155.99),
(101311, 'racao bocao premium caes adultos 10kg', 3, 8, 62.99, 82.99),
(101312, 'racao bocao original 7kg', 5, 8, 30.99, 41.99),
(101313, 'racao premium racas pequenas 20kg', 3, 8, 140.99, 175.99),
(101314, 'racao bocao premium racas pequenas 10kg', 2, 8, 73.99, 94.99),
(101315, 'racao bocao gatos 25kg', 2, 8, 158.99, 185.99),
(101316, 'racao bocao filhotes 7kg', 4, 8, 45.99, 64.99),
(101317, 'racao pet palato gatos filhotes 10kg', 2, 8, 115.99, 140.99),
(101318, 'racao p/gatos castrados biocare frango 10kg', 2, 8, 103.01, 130.99),
(101319, 'racao pet palatto natural essence 15kg', 2, 8, 135.99, 162.99),
(101320, 'pet palatto full power 15kg', 2, 8, 120.99, 155.99),
(101321, 'pet palatto natural essence raÃ§as pequenas e mini 10kg', 2, 8, 110.01, 145.99),
(101322, 'casa de cachorro  n4 durahouse', 1, 8, 155.01, 198.99),
(101323, 'racao mik vegetais 20 kg', 2, 8, 159.99, 185.99),
(101324, 'racao mik filhote 20kg ', 2, 8, 225.99, 294.99),
(101325, 'racao mik gatos castrados 20kg', 1, 8, 221.4, 255.99),
(101326, 'sache mikdog 100g para cachorro', 72, 9, 1.8, 3.01),
(101327, 'sache mikcat 85g para gato', 162, 8, 1.6, 3.01),
(101328, 'racao LILI dog 5kg', 3, 8, 33.99, 45.99),
(101329, 'racao LILI dog 20kg', 3, 8, 109.99, 135.99),
(101330, 'racao zecat 20kg', 2, 8, 177.99, 205.99),
(101331, 'racao mikcat crooc 20kg', 1, 8, 262.99, 340.99),
(101332, 'sanol shampoo dog antipulgas 500ml', 4, 8, 15.01, 25.99),
(101333, 'sanol shampoo dog pelos claros 500ml', 2, 8, 15.01, 25.99),
(101334, 'sanol shampoo neutro 500ml', 4, 8, 15.01, 25.99),
(101335, 'sanol dog pelos escuros 500ml', 2, 8, 15.01, 25.99),
(101336, 'sanol tapete higienico c/30', 5, 8, 66.91, 99.99),
(101337, 'guia de nylon peiteira p/m/g', 9, 7, 11.1, 17.99),
(101338, 'cama p/cachorro 01 a 5', 5, 8, 141.99, 65.99),
(101339, 'zapbird calopsita 500g', 12, 7, 7.31, 15.99),
(101340, 'zapbird canario 500g', 12, 7, 7.31, 15.99),
(101341, 'zapbird periquito 500g', 12, 7, 7.31, 15.99),
(101342, 'com + beb medio azul plastpet', 3, 8, 24.99, 39.99),
(101343, 'comedouro p/ gato 160ml', 6, 8, 3.6, 8.01),
(101344, 'com medio p/ pet 900ml', 4, 8, 10.26, 19.99),
(101345, 'casa p/cachorro n02 vinho', 1, 8, 102.99, 160.99),
(101346, 'racao birbo racas pequenas 15kg', 2, 8, 150.99, 188.99),
(101347, 'racao birbo filhote 15 kg', 1, 8, 155.99, 192.99),
(101348, 'racao birbo carne 15kg', 4, 8, 108.01, 140.99),
(101349, 'racao birbo carne/frango 7kg', 3, 8, 52.99, 67.99),
(101350, 'bolt 15kg', 6, 8, 78.99, 108.99),
(101351, 'monello bifinhos picanha', 2, 8, 5.02, 8.99),
(101352, 'desengripante spray 300ml vila ', 12, 5, 5.29, 10.99),
(101353, 'pincel atlas n3 branco', 12, 6, 8.25, 15.99),
(101354, 'pincel atlas n4 branco', 12, 6, 9.75, 18.99),
(101355, 'barraca camping p/3 pessoas', 2, 4, 172.99, 220.99),
(101356, 'arrame galvanizado n18/ 1kg', 2, 4, 22.65, 39.99),
(101357, 'prego gerdau 17x27/ 18x30/ 1 cabeÃ§a', 7, 5, 13.61, 22.99),
(101358, 'colchao inflavel casal', 1, 4, 127.51, 150.99),
(101359, 'golden adulto 15kg', 2, 8, 129.16, 167.90),
(101360, 'golden special adulto 15kg', 2, 8, 118.01, 153.99),
(101361, 'golden special adulto 20kg', 2, 8, 154.01, 200.01),
(101362, 'golden power training filhote', 2, 8, 142.99, 184.99),
(101363, 'golden power training adulto', 2, 8, 134.99, 174.99),
(101364, 'golden raÃ§as pequenas adultos 15kg', 4, 8, 130.01, 170.99),
(101365, 'golden raÃ§as pequenas adulto 10kg', 1, 8, 103.01, 133.99),
(101366, 'golden carne filhote porte pequeno 10kg', 3, 8, 108.99, 140.99),
(101367, 'golden filhote 15kg ', 2, 8, 137.99, 178.99),
(101368, 'premier raÃ§as grandes carne 15kg', 1, 8, 199.99, 250.99),
(101369, 'premier adulto porte pequeno 12kg', 1, 8, 186.99, 236.99),
(101370, 'premier porte pequeno filhote 12kg', 1, 8, 199.99, 250.99),
(101371, 'golden gatos castrados frango 10kg', 2, 8, 134.01, 174.99),
(101372, 'golden gatos castrados salmao 10kg', 2, 8, 140.01, 182.99),
(101373, 'golden gatos filhotes 10kg', 1, 8, 132.99, 171.99),
(101374, 'golden gatos castrados carne 10 kg', 2, 8, 134.99, 174.99),
(101375, 'premier yorkshire filhotes 1kg', 2, 8, 34.99, 45.99),
(101376, 'premier shih tzu filhote 1kg', 2, 8, 34.99, 45.99),
(101377, 'premier shih tzu adulto 2,5kg', 2, 8, 72.01, 90.99),
(101378, 'premier yorkshire adulto 2,5kg', 2, 8, 72.01, 90.99),
(101379, 'cookie golden/premier ', 12, 8, 0.01, 13.99),
(101380, 'fita dupla face 1m', 20, 9, 2.11, 5.01),
(101381, 'profrango sc 25kg', 3, 7, 64.01, 86.99),
(101382, 'pragranja postura sc 25kg', 3, 7, 55.01, 77.99),
(101383, 'supra sui concentrado 32 sc 25kg', 2, 7, 72.99, 98.99),
(101384, 'profrango concentrado sc 25kg', 2, 7, 75.43, 101.99),
(101385, 'proporco sc 25kg', 2, 7, 46.01, 62.99),
(101386, 'procavalo pellet mel sc 40kg', 3, 8, 72.9, 97.99),
(101387, 'anzol de ouro 24 saco de 25kg', 1, 8, 66.01, 92.01),
(101388, 'anzol de ouro 24 8mm sc de 10kg', 2, 7, 28.99, 39.99),
(101389, 'profrango sc 5kg', 5, 7, 14.01, 19.99),
(101390, 'pra granja postura sc 5kg', 5, 7, 12.01, 17.99),
(101391, 'supra coelho agro sc 5kg', 5, 7, 12.01, 17.99),
(101392, 'suprasal 40 saco de 5kg', 5, 7, 15.01, 26.99),
(101393, 'chave teste ', 1, 9, 6.01, 10.01);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `codprod` int(11) NOT NULL,
  `notafisc` varchar(200) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valort` float NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codprod` (`codprod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`codprod`) REFERENCES `produtos` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
