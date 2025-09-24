# Laravel JWT Integration

This repository demonstrates a simple integration of **Laravel** with **JSON Web Tokens (JWT)** for authentication.  
It includes a minimal example with **one controller** that generates a token based on an application key and secret.

---

## Features
- Laravel 12 framework.
- JWT-based authentication using [`firebase/php-jwt`](https://github.com/firebase/php-jwt).
- Example controller for issuing JWT tokens.
- Clean and minimal setup for learning or starting point.

---

## Requirements
- PHP >= 8.2
- Composer
- Laravel 12
- PostgreSQL or MySQL (optional for testing, not required for token generation)

---

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/laravel-jwt-integration.git
   cd laravel-jwt-integration

2. Install dependencies:
   ```bash
   composer install

3. Copy the environment file:
   ```bash
   cp .env.example .env
   
4. Add the following variables to your .env file:
   ```bash
   TOKEN_APP_KEY=your_app_key
   TOKEN_APP_SECRET=your_app_secret
   
5. Generate Laravel application key:
   ```bash
   php artisan key:generate

6. Start the local development server:
   ```bash
   php artisan serve

---

## Usage
Endpoint: POST /api/token

Request a JWT token by sending the app_key in the request body.

#### Example Request
```bash
curl -X POST http://127.0.0.1:8000/api/token \
  -H "Content-Type: application/json" \
  -d '{"app_key": "your_app_key"}'
```

#### Example Response
```bash
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1..."
}
```

---

## Author

Robby Bambang Nurdiansyah

Web Developer | QA Engineer | n8n Automation

