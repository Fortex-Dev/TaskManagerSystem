
# Task Manager System

A simple and practical Task Management System built with Laravel.

Developed by **FortexDev**.

## Features

- User Registration & Login
- User Logout
- Authentication & Route Protection
- Create Tasks
- View Tasks
- View Task Details
- Edit Tasks
- Delete Tasks
- Complete Tasks
- Search Tasks
- Task Status Management
- Task Priority Management
- Due Dates
- Dashboard with Task Statistics
- Responsive Admin Interface

## Technologies

- Laravel
- PHP
- MySQL
- Blade
- Alpine.js
- Bootstrap
- HTML
- CSS
- JavaScript
- Laravel Breeze
- XAMPP

## Task Management

Each task contains:

- Title
- Description
- Status
- Priority
- Due Date
- Completion Date

### Task Statuses

- Pending
- In Progress
- Completed

### Task Priorities

- Low
- Medium
- High

## Authentication

Authentication is implemented using **Laravel Breeze** with:

- Login
- Registration
- Logout
- Password Reset
- Protected Routes

## Dashboard

The dashboard provides an overview of the tasks, including:

- Total Tasks
- Completed Tasks
- Recent Tasks

## Installation

### 1. Clone the repository

```bash
git clone YOUR_REPOSITORY_URL

2. Enter the project directory

cd TaskMangerSystem

3. Install PHP dependencies

composer install

4. Create the environment file

Copy .env.example to .env.

cp .env.example .env

On Windows, you can simply copy .env.example and rename it to .env.

5. Generate the application key

php artisan key:generate

6. Configure the database

Create a MySQL database named:

task_manager_system

Then configure your .env file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager_system
DB_USERNAME=root
DB_PASSWORD=

7. Run migrations

php artisan migrate

8. Install frontend dependencies

npm install

9. Build frontend assets

npm run build

10. Start the development server

php artisan serve

The application will be available at:

http://127.0.0.1:8000

Project Structure

app/
├── Http/
│   └── Controllers/
│       ├── TaskController.php
│       └── ProfileController.php
│
├── Models/
│   └── Task.php
│
resources/
└── views/
    └── admin/
        ├── dashboard.blade.php
        └── tasks/
            ├── index.blade.php
            ├── create.blade.php
            ├── edit.blade.php
            └── show.blade.php

routes/
├── web.php
└── auth.php

database/
└── migrations/

Purpose

This project was built as a practical Laravel project to demonstrate backend development, database interaction, CRUD operations, authentication, validation, routing, Blade templating, and basic dashboard development.

Author

FortexDev