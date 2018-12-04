# Ejercicio DH

Ejercicio de DH desarrollado en Laravel. Este proyecto utiliza la versión 5.7 de Laravel y la versión 11.2.0 de Node.js.

## Instalación y configuración

**1.** Clonar el repositorio:
```
$ git clone git@github.com:gicanas94/ejercicio-dh.git
$ cd ejercicio-dh
```

**2.** Duplicar el archivo `.env.example` y renombrarlo a `.env`:
```
$ cp .env.example .env
```

**3.** Instalar dependencias:
```
$ composer install
$ npm install
```

**4.** Generar la `Application Key`:
```
$ php artisan key:generate
```

**5.** Actualizar el archivo `.env` con los datos de la base de datos.
Utilizar la base de datos que se encuentra en el repositorio (movies_db.sql).

**6.** Ejecutar `migrations` y `seeds`.
```
$ php artisan migrate:refresh --seed
```

**7.** Ejecutar servidor.
```
$ php artisan serve
```
---
### Credenciales

| Usuario | Contraseña |
| :-----: |:----------:|
| admin   | admin      |
| noadmin | noadmin    |
