# Smart Hotel - Dashboard

Autores:  

- Alexandre Jerónimo, nº 2201799
- Rafael Amaral, nº 2201797

## Índice

<!-- @import "[TOC]" {cmd="toc" depthFrom=2 depthTo=6 orderedList=false} -->

<!-- code_chunk_output -->

- [Índice](#índice)
- [Propósito](#propósito)
- [Instalação e Utilização](#instalação-e-utilização)

<!-- /code_chunk_output -->

## Propósito

Este projeto tem como objetivo simular um Smart Hotel (Hotel Inteligente)
através de tecnologias IoT.  
Através de um Dashboard feito com Laravel e Tailwind e de scripts python
disponibilizados na pasta `/scripts`, é possível interagir com o ambiente
virtual do Smart Hotel.

## Instalação e Utilização

A pasta `/docs` contém o relatório do projeto e o ambiente virtual realizado
no Cisco Packet Tracer (.pkt).

**Requisitos**:

- PHP 7.4+ (PHP 8 não recomendado)
- Composer
- MySQL 8 ou MySQL 5
- Node.js e npm
- Extensões PHP necessárias:
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
    npm install && npm run prod
    # e depois:
    composer install
    ```

8. Renomear o ficheiro `.env.example` para `.env` e, se necessário, alterar as variáveis `DB_USERNAME` e `DB_PASSWORD`.

9. Para popular a base de dados com tabelas e dados execute:  
   (Nota: responder "yes" à pergunta "Do you really wish to run this command?")

    ```sh
    php artisan migrate:fresh --seed
    ```

10. Para gerar a 'key' da aplicação corra:

    ```sh
    php artisan key:generate
    ```

11. Finalmente, aceda ao endereço `localhost` e inicie sessão com o nome de utilizador `admin@admin` e a palavra-passe `admin321`.
