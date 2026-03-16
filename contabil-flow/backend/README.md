# Contábil Portal API

Backend do sistema **Contábil Portal**, uma plataforma SaaS para escritórios contábeis gerenciarem a comunicação e o envio de documentos de seus clientes.

O objetivo do sistema é centralizar:

* empresas (clientes do contador)
* pendências de documentos
* envio de arquivos
* comunicação contador ↔ cliente

## Stack utilizada

* PHP 8.2
* Laravel 12
* PostgreSQL
* Laravel Sanctum (autenticação por token)

## Estrutura do sistema

O sistema possui três entidades principais:

Accountant
Representa o escritório contábil.

User
Usuários do sistema (contador ou cliente).

Company
Empresas atendidas pelo contador.

Relacionamento:

Accountant
└── Companies
└── Users

Companies
└── Documents
└── Tasks

## Instalação

Clone o repositório:

git clone https://github.com/seuusuario/contabil-portal-api.git

Entre na pasta:

cd contabil-portal-api

Instale as dependências:

composer install

Copie o arquivo de ambiente:

cp .env.example .env

Gere a chave da aplicação:

php artisan key:generate

Configure o banco no `.env`:

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=contabil_portal
DB_USERNAME=postgres
DB_PASSWORD=senha

Execute as migrations:

php artisan migrate

Inicie o servidor:

php artisan serve

## Autenticação

O sistema usa **Laravel Sanctum** com autenticação por token.

### Login

POST /api/login

Body:

{
"email": "[admin@email.com](mailto:admin@email.com)",
"password": "123456"
}

Resposta:

{
"user": {...},
"token": "TOKEN"
}

Para acessar rotas protegidas, enviar no header:

Authorization: Bearer TOKEN

## Endpoints disponíveis

### Auth

POST /api/login
POST /api/logout
GET /api/me

### Companies

GET /api/companies
Lista todas as empresas do contador autenticado.

POST /api/companies
Cria uma nova empresa.

GET /api/companies/{id}
Retorna uma empresa específica.

PUT /api/companies/{id}
Atualiza uma empresa.

DELETE /api/companies/{id}
Remove uma empresa.

## Exemplo de criação de empresa

POST /api/companies

Body:

{
"name": "Empresa Teste",
"cnpj": "12345678000199",
"email": "[empresa@email.com](mailto:empresa@email.com)",
"phone": "11999999999"
}

## Roadmap

Próximos módulos do sistema:

* Sistema de pendências (tasks)
* Upload de documentos
* Notificações automáticas
* Dashboard do contador
* Portal do cliente

## Estrutura do projeto

app/
├ Controllers
├ Models
├ Services

database/
├ migrations

routes/
├ api.php