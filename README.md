# Database Kostan
By Yosef Satrio Aji
Using codeigniter4 framework

## How to run?

- Make sure php 8.1.2 or newer and composer already installed
- Copy `env` to `.env`
- Make `database_kostan` on your local MySQL database
- Open CMD on root of this project 
- Run this command
First run `composer install` then `composer update` just to make sure :P
Then run `php spark migrate`
Optionally you can seed the database with dummy data
`php spark db:seed Kostan`
and last `php spark serve`