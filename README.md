## Installation

1. Copy .env.example to .env.
2. Edit .env and set your INSTAGRAM_USER and INSTAGRAM_PASSWORD
3. Edit .env and set your database connection
4. Run command: php artisan storage:link
5. Run command: php artisan migrate --seed
6. Set-up cron to run this command every minute:

cd YOUR_PROJECT_PATH && php artisan schedule:run

Or add this line to cron config:

* * * * * cd YOUR_PROJECT_PATH && php artisan schedule:run >> /dev/null 2>&1
