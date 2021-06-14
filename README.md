# Smart Hotel - Dashboard

Autores:  

- Alexandre Jerónimo, nº 2201799
- Rafael Amaral, nº 2201797

## Índice

## Propósito

## Instalação

**Requisitos**:

- PHP 7.4+ (PHP 8 não recomendado)
- Composer
- MySQL 8 ou MySQL 5
- Node.js e npm
- Extensões PHP recomendadas:
  - curl
  - fileinfo
  - gd2
  - intl
  - mbstring
  - openssl
  - pdo_mysql

1. Para instalar a versão mais recente execute:

    ```sh
    git clone https://github.com/imdrk5/projeto-ti.git
    ```

2. Assumindo que o Uniform Server está instalado, mova os conteúdos da pasta `projeto-ti` para dentro da pasta `/UniServerZ/www`.

3. Com o Apache desligado, vá ao menu `Apache->Edit Configuration Files->Edit Config File httpd.conf` do Uniform Server.

4. Com o ficheiro `httpd.conf` aberto, cole o seguinte código no **final** do ficheiro:

    ```conf
    alias /projeto-ti "${US_ROOTF}/projeto-ti/public/"

    <Directory "${US_ROOTF}/*/public/">
    Options Indexes Includes FollowSymLinks
    AllowOverride All
    Require all granted
    </Directory>
    ```

5. Execute o Apache e o MySQL.

6. Para o dashboard funcionar, é obrigatório ter uma base de dados com o nome `smart_hotel`.  
   Num terminal MySQL execute:

    ```sql
    CREATE database smart_hotel;
    exit;
    ```

7. De seguida, para instalar as dependências necessárias, execute:

    ```sh
    npm install && npm run dev
    # e depois:
    composer install
    ```

8. Renomear o ficheiro `.env.example` para `.env`

9. Para popular a base de dados com tabelas e dados execute:

    ```sh
    php artisan migrate --seed
    ```

10. Para correr a aplicação no porto 8000 execute:

    ```sh
    php artisan key:generate
    ```
