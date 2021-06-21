# SQL-Injection-Demo
a simple demo of what an SQL Injection could look like when running queries without sanitizing your input first

## Requirements
- git
- A local installation of a MySQL/MariaDB Server
- At least PHP 8.0
- composer

(some commands in this readme might not work on windows as I wrote it with linux based systems in mind)


## Getting Set Up
### Clone repository
```
git clone https://github.com/LinusTebbe/SQL-Injection-Demo.git
```

### Install required composer packages
You can do this by running the following command inside the project directory
```
composer install
```

### Customize .env
First copy the dist
```
cp .env.dist .env
```

Afterwards add your own DSN and credentials, this might look like the following
```
DB_DSN=mysql:host=localhost;dbname=YOUR_DATABASE_NAME;
DB_USERNAME=YOUR_DB_USERNAME
DB_PASSWORD=YOUR_DB_PASSWORD
```

### Getting demo Data
Either run
```
curl -s "https://api.mockaroo.com/api/fd037ec0?count=1000&key=69355de0" | mysql -u YOUR_DB_USERNAME YOUR_DATABASE_NAME -p
```
and enter your Database password when prompted to import it directly into your database, 
or you could just download an SQL File [here](https://api.mockaroo.com/api/fd037ec0?count=1000&key=69355de0) and import it however you'd like

### Starting the local PHP Server

```
cd public && php -S localhost:8080
```
afterwards the demo site will be available at [http://localhost:8080/](http://localhost:8080/)

##Have fun playing around with it