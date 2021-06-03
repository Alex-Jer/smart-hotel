# Smart Hotel - Dashboard

Autores:  

- Alexandre Jerónimo, nº 2201799
- Rafael Amaral, nº 2201797

## Índice

## Propósito

## Instalação

**Requisitos**:

- PHP 7.4+ (PHP 8 não recomendado)
- MYSQL 8.0+
- Node.js e npm

1. Para instalar a versão mais recente execute:

    ```sh
    git clone https://github.com/imdrk5/projeto-ti.git
    cd projeto-ti
    ```

2. Para o dashboard funcionar, é obrigatório ter uma base de dados nova.  
   Num terminal MySQL execute:

    ```sql
    CREATE database smart_hotel;
    exit;
    ```

3. De seguida, para instalar as dependências necessárias, execute:

    ```sh
    npm install && npm run dev
    # e depois:
    composer install
    ```

4. Renomear o ficheiro `.env.example` para `.env`

5. Para popular a base de dados com tabelas e dados execute:

    ```sh
    php artisan migrate --seed
    ```

6. Para correr a aplicação no porto 8000 execute:

    ```sh
    php artisan key:generate && php artisan serve
    ```
