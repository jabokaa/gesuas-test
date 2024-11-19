
# Teste Desenvolvedor Gesuas

## Sobre o projeto
Este projeto tem como objetivo a criação de um sistema de cadastro de cidadãos e geração de NIS. O NIS é um número de 11 caracteres aleatórios.

## Execução do projeto

### Requisitos:
- PHP 8.2 ou maior
- Composer
- MySQL

### Passos para executar o projeto:
1. Após baixar o repositório, execute o comando `composer install` na raiz do projeto.
2. Copie o arquivo `.env.example` e renomeie para `.env`.
3. Configure as variáveis de ambiente no arquivo .env conforme indicado abaixo. Certifique-se de que a variável DB_NAME_TEST seja diferente de DB_NAME para garantir a execução correta dos testes:
```
DB_HOST=localhost
DB_NAME=gesuas_test
DB_USER=root
DB_PASS=
DB_PORT=3306

DB_HOST_TEST=localhost
DB_NAME_TEST=test_gesuas
DB_USER_TEST=root
DB_PASS_TEST=
DB_PORT_TEST=3306
```

4. Execute a migração responsável pela criação das tabelas e registros de teste:
```
php command.php migrate
```

5. Execute o comando para iniciar o servidor em ambiente de teste:
```
php -S localhost:8000
```
   Você pode mudar a porta caso necessário.

6. Para acessar a aplicação, utilize o endereço http://localhost:8000/ ou substitua 8000 pela porta especificada no comando utilizado.

## Sobre os Testes Automatizados

### Execução dos testes:
Execute o comando abaixo para rodar os testes automatizados:
```
vendor/bin/phpunit --debug tests/
```

No arquivo `.env`, você verá as variáveis de ambiente para o banco de teste. Ao executar os testes automatizados, ele criará o banco específico para teste e será deletado e recriado novamente para cada teste.

## Rotas existentes:
- `/` - Rota inicial do aplicativo com apresentação.
- `/citizen` - Rota para lista de cidadãos.
- `/citizen/create` - Cadastro de cidadão.
- `/citizen/show?nis={nis}` - Dados do cidadão.
