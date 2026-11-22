# Food: the GhostChef API

Food is the back-end API of [GhostChef](https://github.com/mkhinini-motaz/ghostchef), a food-ordering platform I started in 2019. I wrote it by hand, between April 2019 and October 2023 (514 commits, before I used coding agents). A restaurant I co-founded took its orders through GhostChef from December 2021 to October 2023.

The other parts of the system:

- [food-client](https://github.com/mkhinini-motaz/food-client): customer web app
- [food-shop](https://github.com/mkhinini-motaz/food-shop): shop back office
- [food-ws](https://github.com/mkhinini-motaz/food-ws): realtime server
- [deliveryapp](https://github.com/mkhinini-motaz/deliveryapp): delivery (rider) app
- [ghostclient](https://github.com/mkhinini-motaz/ghostclient): customer phone app

## What it does

The API has four route files, one per kind of user (`routes/client.php`, `shop.php`, `transporter.php`, `admin.php`), each with its own login and auth middleware.

- **Customers**
  - Register, log in, check a phone number, reset a password, update the profile and register a device id for push notifications.
  - Request a one-time code by SMS (`POST /otp/request`, throttled).
  - Browse services, shops, categories, menus and products, and search products.
  - Get a delivery cost for a shop, then place an order.
  - List their orders, see loyalty actions, look up and create promo codes.
- **Shops**
  - Log in, update the service area and the menu language.
  - List, edit, show and hide categories and products.
  - Create orders (online, on site or by phone), list current orders, update the status, mark an order as paid and attach a transporter.
  - Get an order report and list the shop's transporters and current orders.
- **Transporters (riders)**: log in and list current orders.
- **Admins**: log in, list orders and services, search products.

Other things in the code:

- Order statuses: new, accepted, processing and ready (by the shop), refused, accepted and picked (by the transporter), delivered, canceled, client not found (`app/Models/Order.php`).
- An order event is published on Redis for the realtime server and sent as a push notification through Firebase (`app/Listeners/Shop/NotifyForOrderAction.php`).
- Menu options are modelled as option groups, options and choices, with ingredients and stock columns.
- Loyalty points and promo codes, with listeners that credit points when a client registers.
- Per-shop statistics: order counts and shop share, compared with yesterday, last week and last month (`app/Repositories/ShopStatisticsRepository.php`).
- SMS sending through AWS SNS or Orange, behind one interface (`app/Support`).
- Artisan commands: `loyalty:generate`, `price:change`, `profit:calc`, `client:init`, `sms:send`.

## Stack

- PHP 8.1, Laravel 10, MySQL
- `tymon/jwt-auth` 2, `predis/predis` 1, `kreait/firebase-php` 6
- `spatie/laravel-activitylog` 4, `spatie/laravel-translatable` 6
- `intervention/image` 2, `guzzlehttp/guzzle` 7
- `darkaonline/l5-swagger` 8 for API docs, PHPUnit 9

## Layout

```
app/Http/Controllers/   Client, Shop, Transporter, Admin controllers
app/Models/             Eloquent models (Order, Shop, Product, Client, ...)
app/Repositories/       query logic for orders, shops, products, statistics
app/Events, Listeners/  order and menu events, loyalty listeners
app/Console/Commands/   artisan commands
app/Support/            SMS and Firebase clients, helpers
database/migrations/    42 migrations
routes/                 one file per kind of user
```

## Running it

```
composer install
cp .env.example .env
php artisan key:generate
php artisan jwt:secret
php artisan migrate
php artisan serve
```

It needs MySQL and Redis. The `package.json` scripts (`npm run dev`, `npm run prod`) build the default Laravel Mix assets. The code is archived and not maintained, and it may need an older PHP or Node to build.

## Status

Archived. The restaurant closed in October 2023. Since September 2026 I am rebuilding GhostChef as a delivery platform with Claude Code; that code is private. The [case study](https://github.com/mkhinini-motaz/ghostchef) tells the full story.
