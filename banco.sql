CREATE DATABASE aguaDB;

USE aguaDB;

CREATE TABLE tb_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    data_nascimento DATE,
    telefone VARCHAR(20),
    senha VARCHAR(255) NOT NULL,
    cep VARCHAR(10),
    rua VARCHAR(255),
    numero VARCHAR(10),
    bairro VARCHAR(100),
    complemento VARCHAR(100),
    cidade VARCHAR(100),
    estado CHAR(2)
);


CREATE TABLE tb_categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);


CREATE TABLE tb_itens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idCategoria INT,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    foto BLOB,
    preco DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (idCategoria) REFERENCES tb_categoria(id)
);


CREATE TABLE tb_itens_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idUsuario INT,
    idItem INT,
    quantidade INT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    finalizado BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (idUsuario) REFERENCES tb_usuario(id),
    FOREIGN KEY (idItem) REFERENCES tb_itens(id)
);




INSERT INTO tb_categoria (nome)
VALUES 
('Naturais'),
('Saborizada'),
('Tecnicas');


INSERT INTO tb_itens (idCategoria, nome, descricao, preco)
VALUES 
(1, 'Água Mineral Natural', 'Água mineral pura de nascente', 2.50),
(1, 'Água Alcalina', 'Água com pH elevado para um melhor equilíbrio corporal', 3.00),
(1, 'Água com Gás Natural', 'Água gaseificada naturalmente', 3.20),
(1, 'Água de Glaciar', 'Água extraída de fontes glaciares', 4.00),
(1, 'Água de Poço Artesiano', 'Água proveniente de poço profundo', 2.70),
(1, 'Água Termal', 'Água mineral para cuidados com a pele', 5.50);


INSERT INTO tb_itens (idCategoria, nome, descricao, preco)
VALUES 
(2, 'Água Sabor Limão', 'Água com infusão de limão natural', 2.80),
(2, 'Água com Frutas Vermelhas', 'Água com sabores de morango, framboesa e amora', 3.50),
(2, 'Água com Hortelã e Pepino', 'Água refrescante com hortelã e pepino', 3.00),
(2, 'Água de Coco Sabor Abacaxi', 'Água de coco com um toque de abacaxi', 4.00),
(2, 'Água com Melancia e Menta', 'Água com infusão de melancia e menta', 3.30),
(2, 'Água com Chá Verde e Limão', 'Água levemente saborizada com chá verde e limão', 3.40);


INSERT INTO tb_itens (idCategoria, nome, descricao, preco)
VALUES 
(3, 'Água Destilada', 'Água purificada para uso técnico e laboratorial', 1.50),
(3, 'Água Desmineralizada', 'Ideal para uso em aparelhos e baterias', 1.80),
(3, 'Água Deionizada', 'Água altamente purificada, sem íons', 2.00),
(3, 'Água Sanitária', 'Produto de limpeza e desinfecção', 2.00),
(3, 'Água Purificada para Aquários', 'Água tratada para aquários e peixes', 3.00),
(3, 'Água Ozonizada', 'Água enriquecida com ozônio para desinfecção', 2.50);






UPDATE tb_itens SET 
    foto = 'imgItens/aguaMineral.png',
    descricao = 'Água mineral pura de nascente, rica em minerais naturais. Uso: Beber para hidratação geral.',
    preco = 2.50
WHERE nome = 'Água Mineral Natural';

UPDATE tb_itens SET 
    foto = 'imgItens/aguaAlcalina.png',
    descricao = 'Água com pH elevado para um melhor equilíbrio corporal. Uso: Beber diariamente para manter o pH corporal ótimo.',
    preco = 3.00
WHERE nome = 'Água Alcalina';

UPDATE tb_itens SET 
    foto = 'imgItens/aguaGas.png',
    descricao = 'Água gaseificada naturalmente, sem aditivos artificiais. Uso: Refrescar e hidratar em ocasiões especiais.',
    preco = 3.20
WHERE nome = 'Água com Gás Natural';

UPDATE tb_itens SET 
    foto = 'imgItens/aguaGlaciar.png',
    descricao = 'Água extraída de fontes glaciares, rica em minerais úteis. Uso: Beber para rejuvenescimento celular e hidratação profunda.',
    preco = 4.00
WHERE nome = 'Água de Glaciar';

UPDATE tb_itens SET 
    foto = 'imgItens/aguaArtesiano.png',
    descricao = 'Água proveniente de poços profundos, rica em minerais naturais. Uso: Beber para aliviar dores musculares e melhorar a digestão.',
    preco = 2.70
WHERE nome = 'Água de Poço Artesiano';

UPDATE tb_itens SET 
    foto = 'imgItens/aguaTermal.png',
    descricao = 'Água mineral para cuidados com a pele, rica em sais minerais. Uso: Aplicar como máscara facial para hidratar e suavizar a pele.',
    preco = 5.50
WHERE nome = 'Água Termal';

-- Águas Saborizadas
UPDATE tb_itens SET 
    foto = 'imgItens/aguaLimao.png',
    descricao = 'Água com infusão de limão natural. Uso: Beber para estimular o apetite e melhorar a digestão.',
    preco = 2.80
WHERE nome = 'Água Sabor Limão';

UPDATE tb_itens SET 
    foto = 'imgItens/aguaFrutasVermelhas.png',
    descricao = 'Água com sabores de morango, framboesa e amora. Uso: Beber para uma hidratação refrescante e antioxidante.',
    preco = 3.50
WHERE nome = 'Água com Frutas Vermelhas';

UPDATE tb_itens SET 
    foto = 'imgItens/aguaHortelaPepino.png',
    descricao = 'Água refrescante com hortelã e pepino. Uso: Beber para aliviar dores de cabeça e estimular o apetite.',
    preco = 3.00
WHERE nome = 'Água com Hortelã e Pepino';

UPDATE tb_itens SET 
    foto = 'imgItens/aguaCocoAbacaxi.png',
    descricao = 'Água de coco com um toque de abacaxi. Uso: Beber para reidratamento após exercícios intensos ou em dias quentes.',
    preco = 4.00
WHERE nome = 'Água de Coco Sabor Abacaxi';

UPDATE tb_itens SET 
    foto = 'imgItens/aguaMelanciaMenta.png',
    descricao = 'Água com infusão de melancia e menta. Uso: Beber para aliviar a fadiga e estimular a mente.',
    preco = 3.30
WHERE nome = 'Água com Melancia e Menta';

UPDATE tb_itens SET 
    foto = 'imgItens/aguaChaVerdeLimao.png',
    descricao = 'Água levemente saborizada com chá verde e limão. Uso: Beber para promover a saúde do fígado e estimular o metabolismo.',
    preco = 3.40
WHERE nome = 'Água com Chá Verde e Limão';

-- Águas Técnicas
UPDATE tb_itens SET 
    foto = 'imgItens/aguaDestilada.png',
    descricao = 'Água purificada para uso técnico e laboratorial. Uso: Aplicar em laboratório ou indústria química.',
    preco = 1.50
WHERE nome = 'Água Destilada';

UPDATE tb_itens SET 
    foto = 'imgItens/aguaDesmineralizada.png',
    descricao = 'Ideal para uso em aparelhos e baterias. Uso: Manter equipamentos eletrônicos limpos e funcionando corretamente.',
    preco = 1.80
WHERE nome = 'Água Desmineralizada';

UPDATE tb_itens SET 
    foto = 'imgItens/aguaDeionizada.png',
    descricao = 'Água altamente purificada, sem íons. Uso: Aplicar em processos industriais que requerem água ultrapurificada.',
    preco = 2.00
WHERE nome = 'Água Deionizada';

UPDATE tb_itens SET 
    foto = 'imgItens/aguaSanitaria.png',
    descricao = 'Produto de limpeza e desinfecção. Uso: Aplicar em superfícies duras para uma higienização eficaz.',
    preco = 2.00
WHERE nome = 'Água Sanitária';

UPDATE tb_itens SET 
    foto = 'imgItens/aguaAquarios.png',
    descricao = 'Água tratada para aquários e peixes. Uso: Manter o ambiente aquático saudável e adequado para vida marinha.',
    preco = 3.00
WHERE nome = 'Água Purificada para Aquários';

UPDATE tb_itens SET 
    foto = 'imgItens/aguaOzonizada.png',
    descricao = 'Água enriquecida com ozônio para desinfecção. Uso: Aplicar como sanitizante em ambientes fechados.',
    preco = 2.50
WHERE nome = 'Água Ozonizada';