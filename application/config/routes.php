<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'users';
$route['404_override'] = 'users';
$route['translate_uri_dashes'] = FALSE;
$route['register']='users/register';
$route['login']='users/login';
$route['userprofile/(:any)']='users/userprofile/$1';
$route['main']='users/main';
$route['main/userprofile/(:any)']='users/userprofile/$1';
$route['removefriend/(:any)']='users/removefriend/$1';
$route['addfriend/(:any)']='users/addfriend/$1';
