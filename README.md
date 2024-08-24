## Bem vindo ao Desafio do Amigo Secreto
Primeiramente muito obrigado se você esta chegou até aqui

Esse projeto foi desenvolvido para o desafio do amigo secreto da empresa Log Smart

### Observações
  - Acabei optando por utilizar um banco sqlite pois assim ficaria mais simples ao clonar o projeto, e como estamos utilizando docker, uni o útil ao agradável então mesmo que você não tenha o banco na sua máquina ele ira funcionar por conta do docker

### Requisitos:
- PHP >= 8.0
- Composer >= 2.7
- Laravel >= 10
- Dokcer

## Configurando Ambiente

### Variaveis de ambiente
- Renomeie o arquivo .env.example para .env
- Ou crie um novo arquivo .env e copie o conteúdo do .env.example

### Executando composer para instalar as dependências do Laravel:
```bash
composer install
```

### Suba o ambiente docker
```bash
docker-compose up -d
```
### Rode as migratoins para criar as tabelas do banco de dados SQLite
```bash
php artisan migrate
```

## Rodando projeto

### Para rodar o projeto execute o comando:
```bash
php artisan serve
```
### Caso já tenha testado tudo basta parar a aplicação e rodar o comando abaixo para parar o ambiente docker
```bash
docker-compose down
```
### O que fiz de a mais:
- Coloquei alguns regex para validaçao de e-mail dos usuários
- Coloquei icones com cores para quando usuário passar com o mouse mudar de cor
- Consegui deixar duas operações em uma pagina só (DELETE e GET) na home do projeto
- Quase todos os componentes visuais estão com bootstrap, foram poucos os lugares que ultilizei css puro 
