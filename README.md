# Project Setup Guide

## Prerequisites

- Docker Desktop installation

## Installation Steps

1. **Clone the repository**:

   ```bash
   git clone <repository_url>
   cd <project_directory>
   ```

2. **Build and up docker compose**:

   ```bash
   docker compose up --build -d
   ```

3. **Create a copy of the `.env` file for backend**:

   ```bash
   cd <project_directory>/backend
   cp .env.local.example .env
   ```

4. **Run backend composer install in docker**:

   ```docker app bash
   composer install
   ```

5. **Generate new backend application key**:

   ```docker app bash
   php artisan key:generate
   ```

6. **Run database migrations with seeding for backend**:

   ```docker app bash
   php artisan migrate:fresh --seed
   ```

7. **Create a copy of the `.env` file for frontend**:

   ```bash
   cd <project_directory>/frontend
   cp .env.local.example .env
   ```

## Access Information

You may access the project through frontend [http://localhost:3000](http://localhost:3000) with the following credentials:

- **Email**: test@example.com
- **Password**: Test1234

## Additional Information

- Refer to the [Laravel Documentation](https://laravel.com/docs/11.x) for more details on how to work with Laravel.
- Irregularity occurred when spam random cards request more than 20 times in one minute.