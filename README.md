<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Getting Started

## About Project


This project was carried out as a Technical Task for Webly Uz.

This project uses a 3rd party API to store weather data in all cities of Uzbekistan. Install the project to see more. Good Luck!

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/installation)

Clone the repository

`https://github.com/Orifjon-github/weather-task.git`


Install all the dependencies using composer

`composer install`

Copy the example env file and make the required configuration changes in the .env file

`cp .env.example .env`

Generate a new application key

`php artisan key:generate`

Run the database migrations **(Set the database connection in .env before migrating)**

`php artisan migrate`

Run the database seeder and you're done. (You can manually create Cities through my APIs. You can get information about 132 cities through the seeder command. All for your convenience)

**Note** : Note: It is recommended to have a clean database before planting. Clean up the database and seed the data at the same time by running the following command

`php artisan migrate:fresh --seed`

Run Schedule, Hourly weather data will be saved to the database

`php artisan schedule:work`

## Environment

`.env` - Environment variables can be set in this file

**Note** : You can quickly set the database information and other variables in this file and have the application fully working.


## Final

`php artisan serve`

## [API DOCUMENTATION](https://github.com/Orifjon-github/weather-api-doc/blob/main/README.md)

**More details about my APIs (Urls, Methods, Responses, Errors) are [here](https://github.com/Orifjon-github/weather-api-doc/blob/main/README.md)**


## License

The Project software licensed under the [MIT license](https://opensource.org/licenses/MIT).
