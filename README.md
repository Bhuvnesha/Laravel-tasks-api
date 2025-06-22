# Task Manager API - Laravel Backend

![Laravel](https://img.shields.io/badge/Laravel-v9.x-orange) ![PHP](https://img.shields.io/badge/PHP-v8.0+-blue) ![License](https://img.shields.io/badge/License-MIT-green)

## Table of Contents
- [Features](#features)
- [Installation](#installation)
- [API Endpoints](#api-endpoints)
- [Example Requests](#example-requests)
- [Testing](#testing)
- [Deployment](#deployment)
- [Contributing](#contributing)
- [License](#license)

## Features
- JWT Authentication (Register/Login/Logout)
- Full CRUD Operations for Tasks
- User-specific Task Management
- Validation & Error Handling
- API Documentation

## Installation

### Prerequisites
- PHP 8.0+
- Composer
- MySQL 5.7+


# Clone repository
git clone https://github.com/yourusername/task-manager-api.git
cd task-manager-api

# Install dependencies
composer install

# Configure environment
cp .env.example .env
php artisan key:generate

# Update .env with your database credentials
# Run migrations
php artisan migrate

# Generate JWT secret
php artisan jwt:secret

# Start server
php artisan serve

API Endpoints
Authentication
Method	Endpoint	Description
POST	/api/register	Register new user
POST	/api/login	Login user
POST	/api/logout	Logout user

Tasks
Method	Endpoint	Description
GET	/api/tasks	Get all user's tasks
POST	/api/tasks	Create new task
GET	/api/tasks/{id}	Get specific task
PUT	/api/tasks/{id}	Update task
DELETE	/api/tasks/{id}	Delete task

Example Requests
# Register
curl -X POST http://localhost:8000/api/register \
  -H "Content-Type: application/json" \
  -d '{"name":"John Doe","email":"john@example.com","password":"password","password_confirmation":"password"}'

# Create Task
curl -X POST http://localhost:8000/api/tasks \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{"title":"Complete project","description":"Finish API docs","status":"pending"}'


php artisan test

Deployment
Set APP_ENV=production in .env

Run:

php artisan config:cache
php artisan route:cache
php artisan view:cache


Contributing
Fork the project
Create your feature branch
Commit your changes
Push to the branch
Open a Pull Request

License
MIT License


### Download Options:

1. **Copy-Paste Method**:
   - Highlight all text above
   - Create a new file named `README.md`
   - Paste the content
   - Save the file

2. **Direct Download**:
   - [Download README.md file](#) (right-click and "Save link as")

3. **Alternative Formats**:
   - [PDF Version](#)
   - [Word Document](#)

### For GitHub:
Simply create a new file named `README.md` in your project root and paste this content.
