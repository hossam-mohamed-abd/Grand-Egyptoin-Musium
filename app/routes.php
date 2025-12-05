<?php
require_once APP_PATH . '/core/Router.php';
require_once APP_PATH . '/core/Controller.php';

<<<<<<< HEAD
// المسار الجديد للـ Router
$router = new Router('/GEM_mvc/public');
=======
$router = new Router(BASE_URL);
>>>>>>> 69d50687bdaa8b564b0b892cf1e4d3aa79f9bf58

$router->get('/', function () {
    require VIEW_PATH . 'home.php';
});

$router->get('/kids-zone', function () {
    require VIEW_PATH . 'Kids-Zone/KidsZone.php';
});

$router->get('/booking', function () {
    require VIEW_PATH . 'booking/booking.php';
});

$router->get('/collections', function () {
    require VIEW_PATH . 'Collections/Collections.php';
});

$router->get('/plans', function () {
    require VIEW_PATH . 'plans/plans.php';
});

$router->get('/donate', function () {
    require VIEW_PATH . 'Donate/Donate.php';
});

$router->get('/event-details', function () {
    require VIEW_PATH . 'event-details/event-details.php';
});

$router->get('/login', function () {
    require VIEW_PATH . 'regestration/login/login.php';
});

<<<<<<< HEAD
return $router;
=======
return $router;
>>>>>>> 69d50687bdaa8b564b0b892cf1e4d3aa79f9bf58
