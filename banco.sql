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
(2, 'Água com Gengibre e Laranja', 'Água com infusão de gengibre e laranja', 3.20),
(2, 'Água de Coco Sabor Abacaxi', 'Água de coco com um toque de abacaxi', 4.00),
(2, 'Água com Melancia e Menta', 'Água com infusão de melancia e menta', 3.30),
(2, 'Água com Chá Verde e Limão', 'Água levemente saborizada com chá verde e limão', 3.40);


INSERT INTO tb_itens (idCategoria, nome, descricao, preco)
VALUES 
(3, 'Água Destilada', 'Água purificada para uso técnico e laboratorial', 1.50),
(3, 'Água Desmineralizada', 'Ideal para uso em aparelhos e baterias', 1.80),
(3, 'Água Deionizada', 'Água altamente purificada, sem íons', 2.00),
(3, 'Água Sanitária', 'Produto de limpeza e desinfecção', 2.00),
(3, 'Água de Processo', 'Água tratada para uso industrial', 1.70),
(3, 'Água Purificada para Aquários', 'Água tratada para aquários e peixes', 3.00),
(3, 'Água Ozonizada', 'Água enriquecida com ozônio para desinfecção', 2.50);





UPDATE tb_itens SET foto_path = '/imagens/agua_mineral_natural.jpg' WHERE nome = 'Água Mineral Natural';
UPDATE tb_itens SET foto_path = '/imagens/agua_com_gas.jpg' WHERE nome = 'Água com Gás';
UPDATE tb_itens SET foto_path = '/imagens/agua_alcalina.jpg' WHERE nome = 'Água Alcalina';
UPDATE tb_itens SET foto_path = '/imagens/agua_de_coco.jpg' WHERE nome = 'Água de Coco';
UPDATE tb_itens SET foto_path = '/imagens/agua_de_torneira.jpg' WHERE nome = 'Água de Torneira';
UPDATE tb_itens SET foto_path = '/imagens/agua_sabor_morango.jpg' WHERE nome = 'Água Sabor Morango';
UPDATE tb_itens SET foto_path = '/imagens/agua_sabor_limao.jpg' WHERE nome = 'Água Sabor Limão';
UPDATE tb_itens SET foto_path = '/imagens/agua_sabor_pessego.jpg' WHERE nome = 'Água Sabor Pêssego';
UPDATE tb_itens SET foto_path = '/imagens/agua_sabor_menta.jpg' WHERE nome = 'Água Sabor Menta';
UPDATE tb_itens SET foto_path = '/imagens/agua_tonica.jpg' WHERE nome = 'Água Tônica';
UPDATE tb_itens SET foto_path = '/imagens/agua_destilada.jpg' WHERE nome = 'Água Destilada';
UPDATE tb_itens SET foto_path = '/imagens/agua_desmineralizada.jpg' WHERE nome = 'Água Desmineralizada';
UPDATE tb_itens SET foto_path = '/imagens/agua_sanitaria.jpg' WHERE nome = 'Água Sanitária';
UPDATE tb_itens SET foto_path = '/imagens/agua_para_bateria.jpg' WHERE nome = 'Água para Bateria';
UPDATE tb_itens SET foto_path = '/imagens/agua_pura_para_laboratorio.jpg' WHERE nome = 'Água Pura para Laboratório';
