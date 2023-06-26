CREATE TABLE IF NOT EXISTS Clientes (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(30) NOT NULL,
cpf VARCHAR(11) NOT NULL UNIQUE,
estado VARCHAR(2) NOT NULL DEFAULT 'SP',
cidade VARCHAR(20) NOT NULL DEFAULT 'Araraquara',
bairro VARCHAR(20) NOT NULL,
rua VARCHAR(40) NOT NULL,
numeroCasa VARCHAR(7) NOT NULL,
telefone VARCHAR(14) NOT NULL,
email VARCHAR(50) NOT NULL);

CREATE TABLE IF NOT EXISTS Produtos (
codigo INT(6) PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(30) NOT NULL,
preco DECIMAL(14,2) NOT NULL,
quantEstoque INT (5) NOT NULL);

CREATE TABLE IF NOT EXISTS Vendas (
codigo INT(6) AUTO_INCREMENT PRIMARY KEY,
dataVenda date,
idCliente INT (6) NOT NULL,
valorTotal DECIMAL (14,2 ) NOT NULL,
FOREIGN KEY (idCliente)
REFERENCES Clientes (id));

CREATE TABLE IF NOT EXISTS ItensVendas (
codItem int(6) AUTO_INCREMENT PRIMARY KEY,
codVendas INT (6),
codProduto INT (6),
quantProduto DECIMAL (4,2),
valorTotal DECIMAL (14,2) NOT NULL,
FOREIGN KEY (codVendas)
REFERENCES Vendas (codigo),
FOREIGN KEY (codProduto)
REFERENCES Produtos (codigo));

CREATE TRIGGER inserir_data
BEFORE INSERT ON Vendas
FOR EACH ROW
SET NEW.dataVenda = NOW();


insert into Vendas (codigo, idCliente, valorTotal)
VALUES (12, 1, 12.5);

select * from Vendas;