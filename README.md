# Sistema de Transporte Escolar

Este é o repositório do projeto **Sistema de Transporte Escolar**, desenvolvido com Laravel e configurado para rodar em containers Docker.

## Requisitos

Antes de começar, você precisará dos seguintes requisitos instalados na sua máquina:

- **Git**: para clonar o repositório.
- **Docker**: para rodar o projeto em containers.
- **Docker Compose**: para orquestrar os containers.

## Como Baixar o Projeto

Siga as instruções abaixo para clonar o repositório e configurar o ambiente de desenvolvimento com Docker.

### Passo 1: Clonar o Repositório

Abra o terminal e execute o comando abaixo para clonar o repositório do GitHub para sua máquina local:

```bash
https://github.com/GabrielCapoia-Dev/transporte-escolar.git
```
### Passo 2: Navegar para o Diretório do Projeto

Entre no diretório do projeto com o seguinte comando:

```bash
cd Transporte-Escolar
```

### Passo 3: Construir e Rodar os Containers Docker

Dentro do diretório do projeto, execute o seguinte comando para construir e rodar os containers Docker com o Docker Compose:

```bash
docker-compose up -d
```
### Passo 4: Configurar o Projeto

Após os containers estarem em execução, você precisará configurar o ambiente de Laravel. Execute os seguintes comandos para gerar a chave do aplicativo e configurar o banco de dados:

1 - Gerar a chave do aplicativo:

```bash
docker exec -it laravel_app php artisan key:generate
```

2 - Copiar o arquivo .env.example para .env:

```bash
docker exec -it laravel_app cp .env.example .env
```
3 - Rodar as migrações do banco de dados:

```bash
docker exec -it laravel_app php artisan migrate
```

Isso configurará o banco de dados MySQL e preparará o Laravel para rodar corretamente.

### Passo 5: Acessar a Aplicação
Após completar as etapas acima, você poderá acessar a aplicação no seu navegador. Acesse http://localhost:8000 para visualizar o projeto em funcionamento.

Observações
Docker: O Docker garante que o ambiente de desenvolvimento seja consistente, independentemente do sistema operacional.

Banco de Dados: O banco de dados MySQL é configurado automaticamente dentro do container laravel_db e já estará acessível para a aplicação Laravel.


