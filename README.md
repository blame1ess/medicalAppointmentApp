
<h1 align="center">Medical Appointments Manager (MAM)</h1>
<p align="center">
    <img src="/public/images/main-logo.png" width="100" height="100">
</p>
<br />

>MAM is Laravel Web Application using [Laravel](https://laravel.com/docs/9.x/releases) and [Tailwind](https://tailwindcss.com) stack, which:

* Allowing patient to make an appointment with doctor
* Allowing doctors to manage their appointments
* Allowing admins to monitor and manage the web-site, appointments, doctors, and users

<br />
<br />
<br />

<img src="/public/screenshoots/01.png">
<br />
<img src="/public/screenshoots/02.png">
<br />
<img src="/public/screenshoots/02-01.png">
<br />
<img src="/public/screenshoots/02-02.png">
<br />
<img src="/public/screenshoots/02-03.png">
<br />
<img src="/public/screenshoots/03.png">
<br />

<h2>Requirements: </h2>

<br />

| Package:      | Version: |
| ----------- | ----------- |
| [Node](https://nodejs.org/en/)      | V19.0.0+ |
| [Npm](https://www.npmjs.com)      | V9.0.0+ |
| [PHP](https://www.php.net)      | V8.2.0+ |
| [Composer](https://getcomposer.org)      | V2.5.1+ |
| [MySQL](https://www.mysql.com)      | V8.0.31+ |

## Installation

> **Warning**
> Make sure to follow the requirements first.
Here is how you can run the project locally:
1. Clone this repo
    ```sh
    git clone https://github.com/blame1ess/medicalAppointmentApp.git
    ```

1. Go into the project root directory
    ```sh
    cd doctorAppointment
    ```

1. Create database `apppointmentsmanager` (you can change database name)

1. Go to `.env` file
    - set database credentials (`DB_DATABASE=apppointmentsmanager`, `DB_USERNAME=root`, `DB_PASSWORD=`)
   > Make sure to follow your database username and password
1. Install PHP dependencies
    ```sh
    composer install
    ```

1. install front-end dependencies
    ```sh
    npm install && npx mix
    ```

1. Run migration
    ```
    php artisan migrate
    ```

1. Run server
    ```sh
    php artisan serve
    ```
1. OR Run server (using valet)
    ```sh
    valet park
    ``` 
    ```sh
    valet link
    ``` 

1. Run Tailwind
    ```sh
    npm run dev
    ```  

1. Visit `localhost:8000` in your favorite browser.

   > Make sure to follow your Laravel local Development Environment.
