# Projetos do Curso Laravel 5.8 Completo - O mais poderoso Framework PHP (Udemy)

## Sobre o Repositório

<p> Este repositório lidará com o(s) projeto(s) executado(s) pelo curso do título.</p>

> **Observação 1**: importante ressaltar que o comando `php artisan make:controller --resource`
> cria um controller na aplicação com todos os métodos padrão de serem utilizados.

## Configurando o Bootstrap no laravel

Para configurar o bootstrap no laravel, é necessário executar o comando abaixo:

````shell
php artisan preset bootstrap
````

Após a execução do comando, instale as dependências do javascript no código usando os comandos abaixo:

```shell
npm install
npm run dev
```

> **Observação**: A função _asset_ usada para referenciar os arquivos no blade tem como
> caminho inicial a pasta public. Caso desejemos utilizar imagens baixadas ou css externo, 
> referenciar a partir da pasta public.

Para o Laravel Versão 6.0, é necessário instalar um pacote chamando laravel-ui:

```shell
composer require laravel/ui
php artisan ui bootstrap
npm install 
npm run dev
```

Quando executamos o comando `php artisan migrate:rollback`, o comando irá executar o método 
down das migrations executadas no último comando. Por exemplo, se da última vez que foi executado
o comando `php artisan migrate`, foram executadas duas migrations, o comando rollback executará
o down das duas.

Caso só se queira voltar uma destas duas execuções, é necessário passar a flag `--step=1` no
rollback para que ele só execute a primeira migration que tiver de executar.

---

## Comandos Importantes para Migrations
 - **`php artisan migrate:reset`**: executa o down de todas as migrations.
 - `php artisan migrate:refresh`: faz rollback das migrations que já foram executadas,
   para em seguida executar todas as migrations de uma só vez.
 - **`php artisan migrate:fresh`**: executa o comando DROP TABLE em todas as tabelas
   daquele banco de dados, para em seguida criar todas novamente.
   
---

## Utilizando Laravel Tinker

Para acessar ao cli do Tinker, basta executar o comando `php artisan tinker`.

O tinker é utilizado, dentro outras coisas, para usar a linha de comando para programar em php.
Dessa forma, é possível inserir dados no banco de dados sem precisar de seeders, por exemplo.

Como utilizar os models para consultas e queries no banco:

---

### Criação

 - **Model::create(['parametro'=>'valor'])**: cria no banco de dados um novo registro com os
dados passados dentro do array. Para isso, o parâmetro deve estar dentro da variável $fillable,
   do model;
---   
   
### Consultas
 - `Model::all()`: retorna uma **collection** com todos os registros no banco de dados daquele model;
 - `Model::find(1)`: retorna um **objeto** cujo id (ou chave primária) no banco é igual a 1;
 - `Model::find([1,2,3])`: retorna uma **collection** com os registros cujo id (ou chave primária) sejam iguais aos
passados no array;
 - `Model::where('id', 1)->get()`: retorna uma **collection** com todos os registros cuja coluna
especificada no primeiro parâmetro seja igual o valor passado no segundo; 
 - `Model::where('id', '>', 1)->get()`: retorna uma **collection** com todos os registros cuja coluna
   especificada no primeiro parâmetro seja a operação passada no segundo
   com relação ao valor passado no terceiro;
 - `Model::where('name', 'LG')->get()`: retorna uma **collection** com todos os registros cuja
coluna name possua valor igual a LG;
 - `Model::whereBetween('id', 1, 3)->get()`: retorna uma **collection** com todos os registros
   cuja coluna id contenha valores no intervalo de 1 a 3;
 - `Model::whereNotBetween('id', 1, 3)->get()`:retorna uma **collection** com todos os registros
   cuja coluna id contenha valores que não estão no intervalo de 1 a 3;
 - `Model::whereNotIn('id', [1,3])->get()`:retorna uma **collection** com todos os registros
   cuja coluna id contenha valores que não são 1 ou 3;
 - `Model::whereIn('id', [1,3])->get()`:retorna uma **collection** com todos os registros
  cuja coluna id contenha valores que são 1 ou 3;  
---
