# Team project

Laravel Framework 9.0
VERSION PROJECT 2022

#### Repositorio
```shell
composer install
```

Copy .env
```shell
cp .env.example .env
```

# NOTA: Este codigo hace todo de una
```shell

php artisan migrate:fresh --seed

```
## Usuarios

| TIPO  | username  | password  |
|---|---|---|
| Admin  | admin  | 123456  |
| Usuario  | usuario1  | 123456 |



### Inicial con forma de seed
```shell
php artisan storage:link
composer dump-autoload

# php artisan  edugestion:import

# php artisan migrate:fresh --seed
# php artisan make:migration create_nombre_tabla_table --create=nombre_tabla
```

### Inicial laravel-mix mode dev
```shell
npm install
npm run dev
```

## Test
```shell
vendor\bin\phpunit
```

## Code
```shell
vendor\bin\phpstan analyse

composer require --dev phpstan/phpstan
vendor/bin/phpstan analyse


vendor\bin\phpstan analyse app
vendor\bin\phpstan analyse resource
```


## cambios importantenes
Se agregara en las migraciones

En la version 0.4.0 se actualiza la base de datos *sql_tipo_usuario.sql*


# clear cache
php artisan cache:clear
php artisan config:clear
php artisan config:cache


## install
MAC

```shell
aaaassss
```
