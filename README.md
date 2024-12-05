# API de Gerenciamento de Tarefas

Esta é uma API de Gerenciamento de Tarefas simples e funcional construída com Laravel. O aplicativo permite que você gerencie tarefas, suportando operações CRUD básicas e fornece validação, tratamento de erros e testes automatizados. O projeto demonstra habilidades em desenvolvimento de backend, segurança e testes.

## Índice
1. [Visão geral](#visão-geral)
2. [Tecnologias usadas](#tecnologias-usadas)
3. [Instruções de configuração](#instruções-de-configuração)
4. [Pontos de extremidade](#pontos-de-extremidade)
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
- **PostgreSQL** (ou qualquer outro banco de dados suportado pelo Laravel)
- **UUIDs** para IDs de tarefas (para evitar previsibilidade)
- **Postman** (para testar a API)

## Instruções de configuração

### 1. Clone o repositório

Clone o repositório para sua máquina local usando o seguinte comando:

```bash
git clone https://github.com/EricksonLOOP/projetoBackend.git
cd task-management-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
## Documentação 
    Documentação da API de gerenciameto de Tasks Simples
### 1. Listar todas as Tasks
#### Endpoint: GET ```/api/tasks```
#### Querys: STATUS: ```pending | in_progress | completed```
#### Response: 
```bash
[
    {
        "id": "uuid",
        "title": "Task 1",
        "description": "Description of task 1",
        "status": "pending",
        "created_at": "timestamp",
        "updated_at": "timestamp"
    }
]

```
### 2. Encontrar Task por ID
#### Endpoint: GET ``` /api/tasks/{id}```
#### Response: 
```bash
{
    "id": "uuid",
    "title": "Task 1",
    "description": "Description of task 1",
    "status": "pending",
    "created_at": "timestamp",
    "updated_at": "timestamp"
}
```
#### Error Response: 
```bash
{
    "message": "Task not found"
}

```

### 3. Criar nova Task
#### Endpoint: POST ``` /api/tasks```
#### Request Body: 
```bash
{
    "title": "New Task",
    "description": "This is a new task",
    "status": "pending"
}
```
#### Response: 
```bash
{
    "id": "uuid",
    "title": "New Task",
    "description": "This is a new task",
    "status": "pending",
    "created_at": "timestamp",
    "updated_at": "timestamp"
}
```

### 4. Atualizando Task
#### Endpoint: PUT ```/api/tasks/{id}```
#### Request Body: 
```bash
{
    "title": "New Task",
    "description": "This is a new task",
    "status": "pending"
}
```
#### Response: 
```bash
{
    "id": "uuid",
    "title": "New Task",
    "description": "This is a new task",
    "status": "pending",
    "created_at": "timestamp",
    "updated_at": "timestamp"
}
```

### 5. Deletando Task
#### Endpoint: PUT ```/api/tasks/{id}```
#### Response: 
```bash
{
    "message": "Task deleted successfully"
}

```

## Regras de validação
The API enforces the following validation rules for the inputs:

- title: Required, string, max length of 255 characters.
- description: Optional, string.
- status: Required, must be one of pending, in_progress, or completed.