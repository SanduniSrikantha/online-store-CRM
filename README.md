<h1>E-Commerce and CRM Integration for Online Clothing Retail</h1>

<img src="public/admin/assets/images/ReadMe.png">





## Table of Contents
- [Introduction](#introduction)
- [Project Document](#document)
- [Features](#features)
- [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
    - [Installation](#installation)
- [Technologies Used](#usage)
- [License](#license)

## Introduction <a name="introduction"></a>

This project presents an innovative e-commerce solution merged with an advanced Customer Relationship Management (CRM) system, tailored specifically for an online clothing retail store. Its core purpose is to optimize the online shopping journey for customers, while simultaneously providing businesses with a robust tool to efficiently manage customer relationships and sales operations.

This initiative aims to establish a highly intuitive and user-friendly platform that offers a diverse array of clothing products, ensuring a secure and seamless transaction process. Through the implementation of an integrated CRM system, businesses can readily track customer preferences, manage orders, and provide personalized customer interactions, fostering customer satisfaction and loyalty.

By seamlessly integrating e-commerce functionalities with a sophisticated CRM infrastructure, this project strives to elevate the online shopping experience, enabling businesses to cultivate lasting customer relationships and enhance their overall operational efficacy within the competitive realm of online clothing retail.

## Project Document <a name="document"><a/>

You can access the project document [here](Documents/SSP2-FinalReport-CB010303.pdf).

## Features <a name="features"></a>

- Intuitive online platform for effortless browsing and purchasing of clothing items.
- Robust user authentication and secure login mechanisms to ensure the safety and privacy of user accounts and information.
- Comprehensive product details and up-to-date availability status for all clothing items.
- Secure and dependable payment methods, utilizing Stripe for a seamless transaction process.
- Discount support for promotional activities and special offers on clothing items.
- Efficient cart management for a smooth shopping experience, including adding, removing, and saving items for future purchases.
- Integrated CRM functionality to facilitate effective management of customer relationships.
- Streamlined order processing with real-time monitoring of order status.
- Data analytics and comprehensive reporting tools to support informed and data-driven business decisions.

## Getting Started <a name="getting-started"></a>

### Prerequisites <a name="prerequisites"></a>

- PHP 8 or higher
- Node.Js
- Composer 

### Installation <a name="installation"></a>

1. Clone the repository:

```bash
npm start
```

2. Install dependencies:
   
```bash
composer install && npm install && npm run dev
```
   
3. Configure your environment variables:

```bash
ncp .env.example .env
```

4. Run migrations:

```bash
php artisan migrate
```

5. Serve the application:

```bash
php artisan serve
```

6. Run the build:

```bash
npm run dev
```


## Technologies Used <a name="usage"></a>

- Frameworks: Laravel, Alpine.js (JavaScript Framework), Bootstrap (CSS 
Framework), Tailwind CSS (CSS Framework) 
- Application Scaffolding: Laravel Jetstream 
- Libraries: Livewire, Chart.js
- Languages: PHP, JavaScript
- Database: MySQL
- Payment Processing: Stripe

## License <a name="license"></a>

Specify the license under which your project is released.


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
