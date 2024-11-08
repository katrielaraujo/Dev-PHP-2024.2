CREATE TABLE IF NOT EXISTS associados (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    data_filiacao DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS anuidades (
    id SERIAL PRIMARY KEY,
    ano INT NOT NULL,
    valor NUMERIC(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS pagamentos (
    id SERIAL PRIMARY KEY,
    associado_id INT REFERENCES associados(id),
    anuidade_id INT REFERENCES anuidades(id),
    data_pagamento DATE,
    pago BOOLEAN DEFAULT FALSE
)