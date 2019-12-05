# Avançado com Formulários e Validações
CRUD simples com:
> - Form Request
> - Mutators
> - Collective Forms
> - Paginação
> - Components & Slots
> - Flash messages

# Laravel IDE Helper Generator
Instanlado (phpDocs) ajuda com autocomplete (https://github.com/barryvdh/laravel-ide-helper)

`composer require --dev barryvdh/laravel-ide-helper`

1. **Após instalação executar:**

>*qualquer IDE*

`php artisan ide-helper:generate`

>*phpStorm - IDE*

`php artisan ide-helper:meta`

2. **Models**

`php artisan ide-helper:models`

# Laravel Lang
Traduzir mensagens de validações entre outras (https://github.com/caouecs/Laravel-lang)

`composer require caouecs/laravel-lang:~4.0 --dev`

Configurando biblioteca:

1. Assim que importar, ir em vendor/caouecs/src
2. Copiar diretório vendor/caouecs/src/pt-BR/
3. Colar em resources/lang/
4. Ir em config/app.php na chave 'locale', mudar en para pt-BR