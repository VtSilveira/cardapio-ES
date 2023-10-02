CREATE DATABASE restaurante;

CREATE TABLE `clientes` (
  `cli_id` int PRIMARY KEY AUTO_INCREMENT,
  `cli_nome` varchar(50) NOT NULL,
  `cli_cpf` int NOT NULL
) ENGINE = InnoDB;

CREATE TABLE `tipos` (
  `tip_id` int PRIMARY KEY AUTO_INCREMENT,
  `tip_nome` varchar(50) NOT NULL,
  `tip_descricao` longtext
) ENGINE = InnoDB;

CREATE TABLE `pratos` (
  `pra_id` int PRIMARY KEY AUTO_INCREMENT,
  `pra_nome` varchar(255) NOT NULL,
  `pra_preco` decimal(10,2) NOT NULL,
  `pra_descricao` longtext,
  `pra_ingredientes` longtext NOT NULL,
  `pra_imagem` varchar(255) DEFAULT NULL,
  `tip_id` int NOT NULL,
  
  FOREIGN KEY (`tip_id`) REFERENCES tipos(`tip_id`)
) ENGINE = InnoDB;
	
CREATE TABLE `registrodecomprastipos` (
  `rdc_id` int PRIMARY KEY AUTO_INCREMENT,
  `rdc_numeroCompras` int DEFAULT '0',
  `tip_id` int DEFAULT NULL,
  `cli_id` int DEFAULT NULL,
  
  FOREIGN KEY (`cli_id`) REFERENCES clientes(`cli_id`),
  FOREIGN KEY (`tip_id`) REFERENCES tipos(`tip_id`)
) ENGINE = InnoDB;

CREATE TABLE `registrodecompraspratos` (
  `rdc_id` int PRIMARY KEY AUTO_INCREMENT,
  `rdc_numeroCompras` int DEFAULT '0',
  `pra_id` int DEFAULT NULL,
  `cli_id` int DEFAULT NULL,

  FOREIGN KEY (`cli_id`) REFERENCES clientes(`cli_id`),
  FOREIGN KEY (`pra_id`) REFERENCES pratos(`pra_id`)
) ENGINE = InnoDB;

CREATE TABLE `avaliacoes` (
  `ava_id` int PRIMARY KEY AUTO_INCREMENT,
  `ava_nota` int NOT NULL,
  `ava_mensagem` longtext,
  `pra_id` int NOT NULL,
  `cli_id` int DEFAULT NULL,
  
  FOREIGN KEY (`pra_id`) REFERENCES pratos(`pra_id`),
  FOREIGN KEY (`cli_id`) REFERENCES clientes(`cli_id`)
) ENGINE = InnoDB;


INSERT INTO `clientes` VALUES (null,'Vitor Silveira',1234567890),(null,'Rafael Campos',2147483647);
INSERT INTO `tipos` VALUES (null,'Italiana','A cozinha italiana é muito variada e explora diversos ingredientes como vegetais, carnes e massas de diversos tipos.'),(null,'Destilados','Drogas psicotrópicas lícitas com propriedades depressoras do sistema nervoso central, que podem causar dependência física e psíquica.'),(null,'Oriental','Comidas originárias da Ásia.'),(null,'Hamburguer','Deliciosas carnes aconchegadas no meio de dois pães com recheios diversos.'),(null,'Pastel','Alimento composto por uma massa à base de farinha a que se dá a forma de um envelope, se recheia e depois se frita por imersão em óleo fervente.'),(null,'Brasileira','Comidas típicas do Brasil: umas das melhores culinárias do mundo.');
INSERT INTO `pratos` VALUES (null,'Macarrão',20.00,'Uma refeição italiana que consiste em macarrão cozido com um molho à base de tomate, carne moída (opcional), cebola, alho, pimentão e outros temperos. Macarrão do tipo espaguete, cozido até ficar al dente, ou seja, macio porém ainda firme ao morder.','Macarrão, parmesão, molho de tomate, cebola, alho e pimentão','https://receitatodahora.com.br/wp-content/uploads/2021/09/como-fazer-macarrao-scaled.jpg',1),(null,'Whisky Singleton',169.90,'Envelhecido por 5 anos, com um sabor clássico e agradável, o Singleton of Dufftown é o whisky perfeito para introduzir o mundo do single malte ao paladar iniciante. Deguste e sinta o turbilhão de sabores.','Água com trigo, centeio, cevada maltada ou milho','https://i.ibb.co/d6BP29z/singleton.jpg',2),(null,'Pastel de carne',5.00,'Pastel feito com massa de trigo e carne bovina, um salgado de origem brasileira, que consiste em uma massa fina e crocante frita, recheada com carne moída. Geralmente servido como um lanche ou aperitivo.','Massa de Pastel e Carne Bovina','https://cdn.minhareceita.com.br/2020/09/pastel-de-salsicha-de-frango_mobile.jpg',5),(null,'Cheese-burger',15.00,'É um tipo de sanduíche que consiste em um hambúrguer de carne bovina coberto com queijo, a fatia de queijo é colocada sobre o hambúrguer cozido pouco antes de servir, para que o queijo derreta.','Pão, Carne e Queijo Cheddar','https://lilianpacce.s3.amazonaws.com/wp-content/uploads/2016/11/101116-burger-fest0010.jpg',4),(null,'Frango Frito',30.00,'Delicioso prato que consiste em pedaços de frango temperados e fritos em óleo quente. É servido com arroz e salada. Opte por empanado ou à passarinho.','Frango, arroz, alface, cebola e óleo','https://espetinhodesucesso.com.br/wp-content/uploads/2022/04/frango-frito-na-panela-de-pressao.jpg',6),(null,'Pizza',70.00,'Pizza de calabresa e queijo, leva como ingrediente principal a linguiça calabresa, que é uma linguiça defumada feita com carne suína e temperada com pimenta. A massa é coberta com molho de tomate e queijo mussarela e depois recebe as fatias de calabresa por cima.','Massa de Pizza, Molho de Tomate, Queijo e Calabresa','https://assets.tmecosys.com/image/upload/t_web767x639/img/recipe/ras/Assets/5802fab5-fdce-468a-a830-43e8001f5a72/Derivates/c00dc34a-e73d-42f0-a86e-e2fd967d33fe.jpg',1),(null,'Temaki',40.00,'Prato da culinária japonesa que consiste em um cone de alga marinha recheado com arroz temperado e peixes. Escolha diferentes tipos de recheios, como salmão, atum, camarão, kani, pepino, cenoura ou cream cheese.','Arroz, Peixe e Alga Marinha','https://img.cybercook.com.br/receitas/389/asushi-temaki-1.jpeg',3),(null,'Sashimi',18.00,'Seu nome significa “corpo perfurado”, é um prato que consiste em fatias finas de carne crua de peixe. Acompanhado por shoyu, wasabi, gengibre e limão.','Peixe','https://www.sabornamesa.com.br/media/k2/items/cache/46cc34a94d80d6eac4fa785db84fa1e2_XL.jpg',3);
INSERT INTO `registrodecomprastipos` VALUES (1,2,1,1),(2,5,1,2),(3,1,2,2);
INSERT INTO `registrodecompraspratos` VALUES (1,2,1,1),(2,5,1,2),(3,1,2,2);
INSERT INTO `avaliacoes` VALUES (null,1,'Adorei, muito bom!',1,1),(null,10,'Não gostei muito, péssimo',1,2);
