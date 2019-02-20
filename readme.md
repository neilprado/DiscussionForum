## Fórum de Discussão ##

Projeto da disciplina Programação para Web I pelo professor Edemberg Rocha da Silva 

### Mapeamento de Dados ###
![Mapeamento de Dados](https://github.com/neilprado/DiscussionForum/blob/master/mapeamento.jpg)

*Pré requisitos*
**Xampp, Wamp ou Lamp**
**Composer**
**Banco de dados criado no PhpMyAdmin, lembrar de configurar o .env com a database com o mesmo nome**

*Como utilizar o projeto?*

1. Clone o repositório
```sh
git clone https://github.com/neilprado/DiscussionForum.git
```

2. Entre na pasta do projeto
```sh
cd DiscussionForum
```

3. Instale as dependências
```sh
composer install
```

4. Copie o arquivo .env.example para .env
```sh
copy .env.example .env (Windows) ou cp .env.example .env (Linux)
```

5. Configure o banco de dados, usuário e senha do mesmo

6. Gere a chave para utilização da aplicação
```sh
php artisan key:generate
```

7. Faça a migração dos dados
```sh
php artisan migrate
```