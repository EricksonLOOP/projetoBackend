# API de Gerenciamento de Tarefas

Esta é uma API de Gerenciamento de Tarefas simples e funcional construída com Laravel. O aplicativo permite que você gerencie tarefas, suportando operações CRUD básicas e fornece validação, tratamento de erros e testes automatizados. O projeto demonstra habilidades em desenvolvimento de backend, segurança e testes.

## Índice
1. [Visão geral](#visão geral)
2. [Tecnologias usadas](#tecnologias-usadas)
3. [Instruções de configuração](#instruções-de-configuração)
4. [Pontos de extremidade](#pontos de extremidade)
5. [Regras de validação](#regras-de-validação)
6. [Teste](#teste)
7. [Tratamento de erros](#tratamento-de-erros)
8. [Segurança](#segurança)
9. [Contribuindo](#contribuindo)

## Visão geral

Esta API permite que você gerencie tarefas com as seguintes operações:

- **Criar uma nova tarefa**
- **Listar todas as tarefas**
- **Visualizar uma tarefa específica por ID**
- **Atualizar uma tarefa existente**
- **Excluir uma tarefa**

As tarefas têm os seguintes campos:
- `id` (UUID)
- `title` (string, obrigatório)
- `description` (opcional, string)
- `status` (enum: `pending`, `in_progress`, `completed`)

A API segue os princípios RESTful e fornece respostas claras e consistentes com códigos de status HTTP apropriados.

## Tecnologias usadas

- **PHP** (Laravel Framework)
- **MySQL** (ou qualquer outro banco de dados suportado pelo Laravel)
- **UUIDs** para IDs de tarefas (para evitar previsibilidade)
- **Postman** (para testar a API)

## Instruções de configuração

### 1. Clone o repositório

Clone o repositório para sua máquina local usando o seguinte comando:

```bash
git clone https://github.com/your-username/task-management-api.git
cd task-management-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
´´´