# Devs do RN

Bem-vindo ao **Devs do RN**, uma aplicação PHP pura para gerenciamento de associados e anuidades, utilizando PostgreSQL e Docker. O projeto segue o padrão MVC e está totalmente containerizado para facilitar a execução no WSL2.

## 🛠️ Tecnologias Utilizadas

- **PHP 8.1**
- **PostgreSQL 15**
- **Docker e Docker Compose**
- **HTML/CSS** para frontend
- **Padrão MVC** para organização do código

## 📂 Estrutura do Projeto

```plaintext
devs-do-rn/
├── Dockerfile
├── docker-compose.yml
├── meu_database.sql
├── README.md
└── src/
    ├── assets/
    │   └── style.css
    ├── config/
    │   └── db_connect.php
    ├── controllers/
    │   ├── AnuidadeController.php
    │   └── AssociadoController.php
    ├── index.php
    ├── models/
    │   ├── Anuidade.php
    │   └── Associado.php
    ├── routes/
    │   └── routes.php
    ├── tests/
    │   ├── test_anuidade.php
    │   └── test_associado.php
    └── views/
        ├── anuidades.php
        ├── associado_create.php
        └── associados.php
```

## 🚀 Como Executar o Projeto

### 1. Pré-requisitos

- Docker Desktop configurado para usar o WSL2 (Ubuntu 22.04)
- Docker e Docker Compose instalados

### 2. Clone o Repositório

```bash
git clone https://github.com/seu-usuario/devs-do-rn.git
cd devs-do-rn
```

### 3. Configure o Banco de Dados

Verifique se o arquivo `meu_database.sql` possui o script correto para criação das tabelas e dados de exemplo:

```sql
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
);

-- Dados de exemplo para associados
INSERT INTO associados (nome, email, cpf, data_filiacao)
VALUES
    ('João Silva', 'joao@teste.com', '12345678901', '2024-01-01'),
    ('Maria Souza', 'maria@teste.com', '98765432100', '2024-02-01');

-- Dados de exemplo para anuidades
INSERT INTO anuidades (ano, valor)
VALUES
    (2024, 150.00),
    (2025, 200.00);
```

Para carregar os dados no banco:

```bash
docker exec -i devs-do-rn-db psql -U postgres -d devs_do_rn < meu_database.sql
```

### 4. Suba os Containers com Docker

```bash
docker-compose up -d
```

### 5. Acesse a Aplicação

Abra o navegador e acesse:

```
http://localhost:8080
```

## 🌐 API Endpoints para Testes com Postman

### Listar Associados
- **Método:** GET
- **URL:** `http://localhost:8080/index.php?rota=associados`

### Cadastrar Associado
- **Método:** POST
- **URL:** `http://localhost:8080/index.php?rota=associado/cadastrar`
- **Body (form-data):**
  - `nome`: `Carlos Almeida`
  - `email`: `carlos@teste.com`
  - `cpf`: `11122233344`
  - `data_filiacao`: `2024-03-01`

### Listar Anuidades
- **Método:** GET
- **URL:** `http://localhost:8080/index.php?rota=anuidades`

### Cadastrar Anuidade
- **Método:** POST
- **URL:** `http://localhost:8080/index.php?rota=anuidade/cadastrar`
- **Body (form-data):**
  - `ano`: `2026`
  - `valor`: `250.00`

### Confirmar Pagamento de Anuidade
- **Método:** POST
- **URL:** `http://localhost:8080/index.php?rota=anuidade/pagar`
- **Body (form-data):**
  - `id`: `1` (ID da anuidade)
  - `assoc_id`: `1` (ID do associado)

## 🧪 Roteiro de Testes Automatizados

Os testes estão localizados na pasta `src/tests/`. Para executar os testes:

```bash
cd src/tests
php test_associado.php
php test_anuidade.php
```

### Erro 404 - Rota Não Encontrada
- Verifique se a URL está correta e se o parâmetro `rota` está definido.
- Verifique o arquivo `routes/routes.php` para garantir que a rota existe.

## 📖 Licença

Este projeto é open-source e está sob a licença MIT.
