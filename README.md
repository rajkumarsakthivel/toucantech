<p align="center"><a href="https://toucantech.com" target="_blank"><img src="https://images.saasworthy.com/tr:w-178,h-0/toucantech_12586_logo_1646478869_lspna.svg" width="400"></a></p>

<p align="center">
</p>

#### Requirements
- Minimum PHP 8
- Minimum MySQL 5.7
- node
- npm
- or (LAMP SERVER SETUP)
#### Steps
for PHP Packages
```
composer install
```
for node modules
```
npm install
```
Generate env file
```
cp .env.example .env
php artisan key:generate
```
Add database details
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=toucantech
DB_USERNAME=yourusername
DB_PASSWORD=yourpassword
```
run migrate and seed fake schools data
```
php artisan migrate
php artisan db:seed
```
run the application
```
php artisan serve
```
Running php units
```
php artisan test
```
Output for phpunit tests
```
php artisan test

   PASS  Tests\Unit\ExampleTest
  ✓ that true is true

   PASS  Tests\Feature\ExampleTest
  ✓ the application returns a successful response                                                                   0.09s

   PASS  Tests\Unit\MemberTest
  ✓ create member                                                                                                   0.50s

   PASS  Tests\Unit\SchoolTest
  ✓ create school                                                                                                   0.01s

  Tests:    4 passed (6 assertions)
  Duration: 0.64s
```
