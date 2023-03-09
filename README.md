# DelayReport service

## Summary
This application is a standalone _feature based_ microservice providing REST HTTP endpoints.

## Installation guide
Follow these steps to simply run the project.

### Clone the project
Clone this repository into your local machine using the following command:
```bash
git clone https://github.com/milad-elyasi/DelayReport.git
```

### Environment variables
There is a `.env.example` file in the project's root directory containing OS level environment variables used for
deploying the whole application. Every single variable inside the file has a default value, so you
do not need to change them; But you can also override your own variables. First copy the example file to the `.env`
file:

```bash
cd /path-to-project
cp .env.example .env
```

Then open your favorite text editor like `vim` or `nano` and change the variables.

### Running containers
Open `Terminal` and type the following command:

```bash
docker-compose up -d 
```

> **_NOTE:_** This application needs a database to run. Please set up database container as a separate project and use docker native APIs to connect the app to your desired database.

```bash
docker network connect {database_network} snappfood_backend
```

### Making an SSH connection to the backend container
```bash
cd /path-to-project
docker-compose exec {--user root} snappfood_backend bash
```

### Running tests
Simply execute the following command in terminal:

```bash
docker-compose exec snappfood_backend vendor/bin/phpunit
```

Or if you want to see a verbose output, try this command:

```bash
docker-compose exec snappfood_backend php artisan test
```

### Running migrations
Executing the following command will migrate all the database changes. 

```bash
docker-compose exec snappfood_backend php artisan migrate
```

### Generating swagger openapi file

```bash
docker-compose exec snappfood_backend ./vendor/bin/openapi ./app -o wiki/openapi.yml
```
Then navigate [to this address](http://localhost:9010) to check the generated documents.

### Running code sniffer
To check the coding style against PSR12 standards, run the following command:

```bash
docker-compose exec snappfood_backend ./vendor/bin/phpcs --standard=PSR12 --ignore-annotations ./app ./tests
```
To fix the issues, try this one:

```bash
docker-compose exec snappfood_backend ./vendor/bin/phpcbf --standard=PSR12 --ignore-annotations ./app ./tests
```
> sometimes you have to fix the issues manually. Do not trust in phpcbf fixer.
## Technical discussions (Images/Containers)
This project includes three docker containers:

`snappfood_backend`: php-fpm:8.1.0  
`snappfood_webserver`: nginx:1.23.1  
`snappfood_mysql`: mysql:8

## Technical requirements and contracts

> **_NOTE:_** All the integration configurations with our internal services are located in `config/integrations.php`.  <u>Avoid</u> using env variables directly with `env()` in code base, please. After creating its env value, you may put it in the integration configuration file mentioned before.  

> **_NOTE:_** All the procedures must follow a couple of rules. they have to contain these files or follow instructions:

- Request validation file for inputs. These files are located in: `app/requests`.
- Resource for outputs. these Tiles are located in: `app/resources`.
- DTO files are located in: `app/Dto`.
- Method and variable names must be camel case.
- All the routes bound with methods must have a swagger doc block.
- Codes must follow SOLID principles.
- Use rich models instead of anemic models.
- Use controllers only for validation and returning final response, other methods should go to the related service that is located in: `app/Services`.
- Constructors and their arguments in each Dto should be private.
- All database changes must be done in a migration.
- All changes in all level, must have its related tests located in `./tests`.
- It's better to have factories for each model.
- Please don't forget to use null safe operators to avoid null pointer exceptions.
- Choose readable and descriptive names for classes, methods, etc.
- If you change your docker files for local purposes please avoid pushing it.

## Author
Milad Elyasi [website](https://emilad.ir)

## Licence
[MIT](https://choosealicense.com/licenses/mit/)
