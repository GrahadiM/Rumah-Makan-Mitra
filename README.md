## INSTALASI LARAVEL FROM GITHUB

- <code>git clone https://github.com/GrahadiM/Rumah-Makan-Mitra.git</code>(from url github)
- <code>cd Rumah-Makan-Mitra</code>(your name project)
- <code>composer install</code> or <code>composer update</code>
- <code>cp .env.example .env</code> configuration your file .env in your project Laravel
- <code>php artisan key:generate</code>
- <code>php artisan migrate</code> or <code>php artisan migrate --seed</code> or <code>php artisan migrate:refresh --seed</code>
- <code>php artisan db:seed --class=(Name Seeder)</code>
