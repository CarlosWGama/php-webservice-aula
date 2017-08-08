# Exemplo de um WebService baseado em REST

Para usarem o exemplo abaixo, tenham instalado no computador de você so composer e o laravel.

Após terem esses recursos instalados baixem o projeto no seu computador.

Entre na pasta do projeto e execute o terminal/cmd o comando abaixo para ele instalar todas as dependências:

```
    composer install
```

Em seguida, faça uma copia do arquivo .env.example e o renomei para .env

Dentro do arquivo, troque os dados abaixo para o seu banco de dados (E crie um banco de dados):

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Por fim, peça para executar os comandos abaixo no terminal:
```
    php artisan migrate
    php artisan db:seed
    php artisan serve
```

Seu exemplo do WebService já deverá estar pronto e rodando.

Dentro da pasta routes, tem um arquivo api.php onde está configurado as rotas para os controllers, que se encontram na pasta app\http\Controllers:
- TarefaController.php
- UsuarioController.php


Nossas rotas são:

| Method   | URI        | Classe            |
|----------|------------|-------------------|
| POST     | api/login  | App\Http\Controllers\UsuarioController@login |
| POST     | api/tarefas| App\Http\Controllers\TarefaController@cadastrar |
| GET|HEAD | api/tarefas|App\Http\Controllers\TarefaController@todas |
| DELETE   | api/tarefas/{id} | App\Http\Controllers\TarefaController@excluir |

A autenticação está sendo realizada através do Headers no campo: Authorization passando um token baseado em JWT.



