
# Desafio-Tecnico-PHP-Codificar

Repositório destinado a elaboração do Desafio Técnico PHP - Básico - Oficina CRUD da Codificar.
O App desenvolvido foi um CRUD de orçamentos desenvolvido com Laravel e MySQL.


## Autores

- [@martarelli](https://github.com/Martarelli)


## 🔗 Links
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/rmartarelli/)



## Stack utilizada

**Front-end:** HTML, CSS, Blade, Bootstrap

**Back-end:** PHP/Laravel, Eloquent


## Variáveis de Ambiente

Para rodar esse projeto, você vai precisar adicionar as seguintes variáveis de ambiente no seu .env

`DB_DATABASE=orcamento`


## Rodando localmente

Clone o projeto

```bash
  git clone https://github.com/Martarelli/Desafio-Tecnico-PHP-Codificar.git
```

Entre no diretório do projeto

```bash
  cd Desafio-Tecnico-PHP-Codificar
```

Instale as dependências

```bash
  composer install
```

Crie o database do mySQL

```bash
  mysql -u seu_usuario -p -e "CREATE DATABASE orcamento;"
```
Não esquecer de configurar o .env

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=orcamento
DB_USERNAME=root
DB_PASSWORD=
```
Rode a migration

```bash
  php artisan migrate
```

Inicie o servidor

```bash
  php artisan serve
```





## Referência

 - [Laravel](https://laravel.com/)
 - [MySQL](https://www.mysql.com/)
 - [Bootstrap](https://getbootstrap.com/docs/5.3/getting-started/introduction/)


## Screenshots

![App Screenshot](https://images2.imgbox.com/d5/6d/y4WBCUx1_o.png)

