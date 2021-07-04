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
 - `Model::whereNotBetween('id', 1, 3)->get()`: retorna uma **collection** com todos os registros
   cuja coluna id contenha valores que não estão no intervalo de 1 a 3;
 - `Model::whereNotIn('id', [1,3])->get()`: retorna uma **collection** com todos os registros
   cuja coluna id contenha valores que não são 1 ou 3;
 - `Model::whereIn('id', [1,3])->get()`: retorna uma **collection** com todos os registros
  cuja coluna id contenha valores que são 1 ou 3;
   
---
### Usando LIKE

 - `Model::where('name', 'like', '%e%')->get()`: retorna uma **collection** com
todos os registros cuja coluna name possua a letra "e" no meio da palavra;
 - `Model::where('name', 'like', "%$var%")`: retorna uma **collection** com todos os registros cuja coluna name possua
o valor da variável $var em algum momento na palavra.
---

### Encadeamento de Queries

 - `Model::where('id', '>', 1)->where('name', 'LG')->get()`: encadeia uma sequência
   de comparações que possam ser executadas ao final com o método get;
 - `Model::where('id', '>', 1)->orWhere('name', 'LG')->get()`: encadeia uma sequência
   de comparações que possam ser executadas ao final com o método get. Neste caso
   usa-se orWhere para não efetuar o operador E;

### Agrupamento de Queries
```php
Model::where(function($query) {
  $query->where('id', '>', 1)->where('id', '<', 4);
})->where(function($query) {
  $query->where('name', 'LG')->orWhere('name', 'Apple');
})->get(); 
```

A função acima demonstra como se fazer um agrupamento de queries. Dessa forma, no primeiro
where, passamos como parâmetro uma função que recebe uma query como parâmetro. Assim, podemos
usar este parâmetro para executar os where necessários, agrupando uma query específica.

### Ordenamento
 - `Model::orderBy('name')->get()`: busca todos os dados do model no banco, ordenados pela coluna
   'name';
 - `Model::orderBy('name', 'desc')->get()`: busca todos os dados do model no banco, ordenados
  pela coluna 'name' em ordem decrescente;
 - `Model::where('id', '>', 1)->orderBy('name', 'desc')->get()`: outra forma de usar o orderBy,
desta vez junto ao método where
   
### Collections
Toda consulta no banco de dados usando os models do laravel resultará numa collection.
As collections possuem, ainda, novos métodos para se trabalhar:

 - `Model::all()->first()`: retorna o primeiro objeto da collection.
 - `Model::all()->last()`: retorna o último objeto da collection.
 - `Model::all()->reverse()`: inverte todas as posições da collection.
 - `Model::all()->pluck('name')`: retorna apenas a coluna 'name' do banco de dados.
 - `Model::all()->chunck(2)`: agrupa a collection em sub-collections com o número de objetos
em cada uma igual ao número passado por parâmetro
---
 - `Model::all()->toArray()`: converte a collection para um array.
 - `Model::all()->toJson()`: converte a collection para um objeto json.
---   
 - `Model::all()->avg('id')`: Calcula a média baseado em algum valor proporcionado como parâmetro
de toda a collection;
 - `Model::all()->max('id')`: retorna o maior valor encontrado daquele campo na collection.  
 - `Model::all()->min('id')`: retorna o menor valor encontrado daquele campo na collection.
 - `Model::all()->sum('id')`: retorna a soma de todos os valores encontrados daquele campo
na collection.
   
> **Observação**: as funções acima não são todas as funções que as collections podem realizar.
> Para visualizar quais são todas as funções possíveis, basta acessar a documentação do Laravel,
> em "digging deeper -> collections".

### Atualizando um Dado no Banco

1. **Atualizar Cada Atributo**

O primeiro passo para atualizar é encontrar o objeto que queremos atualizar:

Em seguida, atualizar os atributos necessários;

Por fim, basta executar o método save no model encontrado e ele atualizará no banco de dados.

```php
$model = Model::find(2);

$model->atributo1 = 'valor';
$model->atributo2 = 'valor';

$model->save();
```

2. **Atualizar todos os atributos consecutivamente**

```php
$model = Model::find(2);
$model->fill([
  'atributo1' => 'valor1',
  'atributo2' => 'valor2'
]);
$model->save();
```

> **Observação**: quando se trabalha com APIs, e estamos recebendo dados de uma requisição HTTP,
> podemos executar a função `$request->all()` para recebermos um array associativo com todos os
> campos do formulário preenchido, que é exatamente o que precisamos para passar como parâmetro
> no método fill.

3. **Atualizar Simultaneamente Diversos Models**
```php
Model::where('id', '>', 3)->update(['atributo1' => 'valor1']);
```

Neste caso, é importante ressaltar que não é necessário executar o método save(). Apenas o update
já efetua todas as atualizações.

### Apagando Registros

```php
$model = Model::find(1);
$model->delete();
```
Outra forma é utilizar o método destroy
```php
Model::destroy(3);
```
Podemos também deletar vários elementos específicos.
```php
Model::where('id', '>', 4)->delete();
```

### Soft Delete
Quando se usa SoftDelete nos models, apagar um registro vai apenas atualizar a coluna deleted_at
do banco de dados. Assim, o histórico dos registros se mantém.

Caso queiramos listar todos os registros, inclusive os que foram deletados através do SoftDelete,
basta usar o comando abaixo:

```php
Model::withTrashed()->get();
```

Para verificarmos posição por posição da collection resultante do comando acima, podemos usar
o método trashed() para verificar se a posição do array foi deletada:

```php
$model = Model::withTrashed()->get();
$model[0]->trashed(); // retorna um booleano indicando se o objeto foi deletado ou não
```

Caso se queira verificar apenas os elementos que foram apagados, podemos fazer da seguinte forma:

```php
Model::onlyTrashed()->get();
```

Para restaurar o dado apagado com SoftDelete, podemos fazer da seguinte maneira:

```php
$models = Model::withTrashed()->get();
$models[0]->restore(); //Restaura o elemento no banco de dados. Seta deleted_at = null novamente.
```

Por fim, para remover efetivamente do banco de dados um elemento cuja tabela possui soft delete,
devemos fazer da seguinte forma:

```php
$models = Model::withTrashed()->get();
$models[0]->forceDelete(); // Remove efetivamente o dado do banco de dados.
```
