## Run Locally
### 1. Clone repo
```
$ git clone git@github.com/kamilkahar90/todo-app.git
$ cd todo-app
```
### 2. Setup Environment
-   Require PHP 8.1, Composer
```
$ composer global require laravel/installer
$ cp .env.example .env
$ php artisan key:generate
```
### 3. Install Dependencies
```
$ composer install
```
### 4. Generate event and database migration
-   Create database name : todo_app
-   Run command to generate event and migration
```
$ php artisan event:generate
$ php artisan migrate
```
### 5. Import Postman collection and environment
- [Todo Postman.zip](https://github.com/kamilkahar90/todo-app/files/8583884/Todo.Postman.zip)

### 6. Run Project
```
$ php artisan serve
```

## Features
- Register and Login api
- Todo CRUD api
- TodoRequest for validation
- Middleware to limit Todo
- Event Listener for Login and Todo History Log
- Job, queue to send email for reminder (in progress)
