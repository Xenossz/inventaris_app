<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Authentication routes
$route['register'] = 'auth/register';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['dashboard'] = 'dashboard';

// Item routes (CRUD)
$route['items'] = 'items/index';
$route['items/create'] = 'items/create';
$route['items/edit/(:num)'] = 'items/edit/$1';
$route['items/delete/(:num)'] = 'items/delete/$1';
$route['items/view/(:num)'] = 'items/view/$1';