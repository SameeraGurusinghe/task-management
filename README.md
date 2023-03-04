<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Task Management Application
This is a simple task management application built with Laravel.

## Dependencies
To run this application, you will need to have the following installed on your computer:

1. PHP 7.3 or higher
2. Composer
3. MySQL or MariaDB

## Installation
To run this application, follow these steps:

1. Clone this repository onto your local machine: git clone https://github.com/SameeraGurusinghe/task-management.git
2. Navigate into the project directory: cd task-management
3. Install the project dependencies: composer install
4. Create a new MySQL database for the application
5. Copy the .env.example file and rename it to .env: cp .env.example .env
6. Update the .env file with your database credentials and other settings as needed
7. Generate a new application key: php artisan key:generate
8. Run the database migrations to create the necessary tables: php artisan migrate

    Important: I have use email service as mailtrap free service for testing. Please use your own e-mail configuration or create an account in Mailtrap.

    To set up Mailtrap in your Laravel application, you can follow these steps:

    Sign up for a free account on Mailtrap.io.
    Once you're logged in, create a new Inbox.
    In your Laravel application, open the .env file and set the MAIL_MAILER value to smtp.
    Set the MAIL_HOST value to smtp.mailtrap.io.
    Set the MAIL_PORT value to 2525.
    Set the MAIL_USERNAME and MAIL_PASSWORD values to the SMTP credentials provided by Mailtrap (these can be found in the Mailtrap Inbox settings).
    Set the MAIL_ENCRYPTION value to tls.

    Here is an example .env file with the Mailtrap configuration:
    'MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=your-username
    MAIL_PASSWORD=your-password
    MAIL_ENCRYPTION=tls'

9. Start the development server: php artisan serve
10. Open your web browser and navigate to http://localhost:8000

## Configuration
You can configure various settings in the .env file, such as the database settings, e-mail settings and more.

## Usage
After successfully run this application you are redirect to the Login page. Create your account and sign in.

    To create a new task, click on the "New Task" button on the homepage.
    To edit or delete an existing task, click on the "Edit" or "Delete" button next to the task on the homepage.
    To mark a task as completed, click on the "Complete" button next to the task on the homepage.
    To view completed tasks, click on the "Completed Tasks" button on the homepage.

That's all.