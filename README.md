# Mini-CRM

This project aims to provide you with capabilities like managing many companies' info with their employees.

> **Note:** It is just an assessment for me for a backend developer (intern) role that I have applied for.
> 

## Demo Link

- Try it now:
    - [http://204.48.18.153/demos/mini_crm](http://204.48.18.153/demos/mini_crm)
- *Soon:*
    - [https://109-marzouk.tech/demos/mini_crm](https://109-marzouk.tech/demos/mini_crm)

## APIs Documentation

- Visit:
    - [https://documenter.getpostman.com/view/18932365/UVXqDsPJ](https://documenter.getpostman.com/view/18932365/UVXqDsPJ)

## Installation for DEVs locally

> **Note:** Recommended Requirements (to work properly):
> 
- PHP v8.1.1
- Composer v2.2.5
- node v16.13.2
- npm v8.3.2

1. Clone the project:

```markdown
git clone (linktogithubrepo.com/) Mini-CRM
```

1. Enter project folder:

```markdown
cd Mini-CRM
```

1. Install Composer Dependencies

```markdown
composer install
```

1. Install NPM Dependencies

```markdown
npm install
```

1. Rename `.env.example` file to `.env`.

```markdown
mv .env.example .env       # for linux/macOS
ren .env.example .env      # for windows
```

1. Generate an app encryption key

```markdown
php artisan key:generate
```

1. Create an empty database for our application

1. In the .env file, add database information to allow Laravel to connect to the database

```markdown
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mini_crm
DB_USERNAME=root
DB_PASSWORD=
```

1. Migrate the database

```markdown
php artisan migrate
```

1. Seed the database

```markdown
php artisan db:seed
```
