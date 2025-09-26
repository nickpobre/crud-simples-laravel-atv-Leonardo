# crud-simples-laravel-atv-Leonardo

Este documento fornece as instruções detalhadas para configurar o ambiente de desenvolvimento e executar localmente a aplicação de gerenciamento de tarefas.

## Pré-requisitos

Antes de iniciar, certifique-se de que seu ambiente de desenvolvimento atende aos seguintes requisitos:

  - **Git:** Para clonar o repositório do projeto.
  - **PHP:** Versão 8.2 ou superior.
  - **Composer:** Gerenciador de dependências para PHP.
  - **SGBD (Sistema de Gerenciamento de Banco de Dados):** Um servidor de banco de dados como MySQL, MariaDB ou PostgreSQL instalado e em execução.

## Procedimento de Instalação e Execução

Siga os passos abaixo para configurar e iniciar a aplicação.

### Passo 1: Obter o Código-Fonte

Primeiramente, clone o repositório do projeto para sua máquina local utilizando o Git.

```bash
# Clone o repositório (substitua a URL pelo link do seu repositório)
git clone https://github.com/nickpobre/crud-simples-laravel-atv-Leonardo
# Acesse o diretório do projeto que foi criado
cd crud-simples-laravel-atv-leonardo
```

### Passo 2: Instalar as Dependências do Projeto

O Laravel utiliza o Composer para gerenciar suas dependências. Execute o comando a seguir para instalar todos os pacotes PHP necessários.

```bash
# Este comando lê o arquivo composer.json e instala as bibliotecas necessárias
composer install
```

### Passo 3: Configuração do Ambiente

A configuração específica do ambiente local é armazenada no arquivo `.env`.

1.  **Copie o Arquivo de Exemplo:**
    Crie uma cópia do arquivo de exemplo `.env.example` para criar seu próprio arquivo de configuração local.

      * No Linux ou macOS:
        ```bash
        cp .env.example .env
        ```
      * No Windows:
        ```bash
        copy .env.example .env
        ```

2.  **Gere a Chave da Aplicação:**
    O Laravel requer uma chave de encriptação única para cada aplicação. Gere-a com o seguinte comando Artisan:

    ```bash
    php artisan key:generate
    ```

3.  **Configure a Conexão com o Banco de Dados:**
    Abra o arquivo `.env` que você acabou de criar em um editor de texto. Você precisará atualizar as seguintes variáveis para que correspondam às credenciais do seu banco de dados local:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=crud_simples      # <- Certifique-se de ter criado este banco de dados
    DB_USERNAME=root              # <- Seu usuário do banco de dados
    DB_PASSWORD=                  # <- Sua senha do banco de dados (pode ser vazia)
    ```

    **Atenção:** Antes de prosseguir, certifique-se de que o banco de dados especificado em `DB_DATABASE` já foi criado no seu SGBD.

### Passo 4: Executar as Migrations do Banco de Dados

Com a conexão do banco de dados configurada, o próximo passo é criar as tabelas da aplicação. As migrations do Laravel automatizam esse processo.

```bash
# Este comando executa todos os arquivos de migration pendentes
php artisan migrate
```

Ao final da execução, a tabela `tasks` (e outras tabelas padrão do Laravel) será criada em seu banco de dados.

### Passo 5: Iniciar o Servidor de Desenvolvimento

Agora que a aplicação está instalada e configurada, inicie o servidor de desenvolvimento local do Laravel.

```bash
php artisan serve
```

O terminal exibirá uma mensagem indicando que o servidor foi iniciado, geralmente no endereço `http://127.0.0.1:8000`.

### Passo 6: Acessar a Aplicação

Abra seu navegador de preferência e navegue para o endereço fornecido pelo comando anterior. Para acessar a funcionalidade de CRUD de tarefas, utilize a seguinte URL:

**[http://127.0.0.1:8000/tasks](http://127.0.0.1:8000/tasks)**

A aplicação de gerenciamento de tarefas agora deve estar totalmente funcional em seu ambiente local.
