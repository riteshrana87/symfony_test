Symfony 6.4 E-Commerce Project Setup Guide

This document provides step-by-step instructions to set up the Symfony 6.4 e-commerce project on another system.

1. System Requirements

Ensure the following dependencies are installed on your system:

PHP 8.2+
Composer (Dependency Manager for PHP)
Symfony CLI (Optional but recommended)
MySQL 8.0+ or MariaDB
XAMPP/WAMP (for local development)
Node.js & NPM/Yarn (for frontend assets if applicable)

2. Clone the Repository
Run the following command in your terminal:
git clone https://github.com/riteshrana87/symfony_test.git
cd symfony-test

3. Install PHP Dependencies
Run Composer to install the necessary packages:
composer install

4. Configure Environment Variables
Copy the .env file and create a new .env.local file:
cp .env .env.local

Update the database connection settings in .env.local:

DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"

-> Replace db_user with your MySQL username.
-> Replace db_password with your MySQL password.
-> Replace db_name with your desired database name.

5. Set Up the Database

Run the following commands to create the database and apply migrations:

-> php bin/console doctrine:database:create
-> php bin/console doctrine:migrations:migrate

(Optional) Load dummy data:

-> php bin/console doctrine:fixtures:load

6. Run the Symfony Server

=> Start the Symfony development server:

    -> symfony serve

Or use PHP’s built-in server:

    -> php -S 127.0.0.1:8000 -t public

Visit http://127.0.0.1:8000/home in your browser.

7. Running the API Endpoints

Get all products (paginated): GET /api/products

Get a single product: GET /api/products/{id}

Use Postman or cURL to test these endpoints.

8. Clearing Cache (If Needed)

If you face any issues, try clearing the cache:

php bin/console cache:clear

9. Deploying to Production

For a production environment, follow these steps:

composer install --no-dev --optimize-autoloader
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

Make sure to set up a web server like Apache or Nginx with proper configurations.

10. Additional Notes

Use symfony console instead of php bin/console if Symfony CLI is installed.

Enable and configure CORS if accessing APIs from a frontend framework.

Ensure proper permissions on the var/ and public/uploads/ directories.