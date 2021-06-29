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
