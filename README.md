# Digital House interview challenge

Digital House interview challenge developed in Laravel. This project uses Laravel version 5.7 and Node.js version 11.2.0.

## Installation and Configuration

**1.** Clone the repository:
```
$ git clone git@github.com:gicanas94/dh-challenge.git
$ cd dh-challenge
```

**2.** Duplicate the `.env.example` file and rename it to `.env`:
```
$ cp .env.example .env
```

**3.** Install dependencies:
```
$ composer install
$ npm install
```

**4.** Generate the `Application Key`:
```
$ php artisan key:generate
```

**5.** Update the `.env` file with the database details.
Use the database provided in the repository (movies_db.sql).

**6.** Run `migrations` and `seeds`.
```
$ php artisan migrate:refresh --seed
```

**7.** Run the server.
```
$ php artisan serve
```
---
### Credentials

| User    | Password   |
| :-----: |:----------:|
| admin   | admin      |
| noadmin | noadmin    |
