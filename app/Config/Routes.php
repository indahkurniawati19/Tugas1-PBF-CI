<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Home::index');//ketika ada request atau akses yang menggunakan metode request get di arahkan ke root baseURL nya 
$routes->get('/coba','Coba::index');

use App\Controllers\News; //tambahkan baris ini
use App\Controllers\Pages;

$routes->get('news', [News::class, 'index']); // Tambahkan Baris ini
$routes->get('news/new', [News::class, 'new']); // tambahkan baris in
$routes->post('news', [News::class, 'create']); //tambahkan baris ini
$routes->get('news/(:segment)', [News::class, 'show']); // Tambahkan Baris ini

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);

