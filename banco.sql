CREATE DATABASE IF NOT EXISTS salao_beleza;
USE salao_beleza;

CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    telefone VARCHAR(20),
    preferencias TEXT
);

CREATE TABLE IF NOT EXISTS servicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    preco DECIMAL(10,2),
    duracao INT
);

CREATE TABLE IF NOT EXISTS profissionais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    especialidade VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,
    servico_id INT,
    profissional_id INT,
    data_hora DATETIME,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (servico_id) REFERENCES servicos(id),
    FOREIGN KEY (profissional_id) REFERENCES profissionais(id)
);

INSERT INTO servicos (nome, preco, duracao) VALUES ('Corte de Cabelo', 50.00, 30);
INSERT INTO servicos (nome, preco, duracao) VALUES ('Manicure', 30.00, 45);
INSERT INTO profissionais (nome, especialidade) VALUES ('João', 'Cabeleireiro');
INSERT INTO profissionais (nome, especialidade) VALUES ('Maria', 'Manicure');
