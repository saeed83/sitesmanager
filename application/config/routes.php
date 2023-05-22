<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Main route
$route['default_controller'] = 'Main';

//Login
$route['Login'] = 'CLogin';
$route['Logout'] = 'CLogin/logout';
$route['AccountLogin'] = 'CLogin/userLogin';

//Dashboard
$route['Dashboard'] = 'CDashboard/userDashboard';

//News
$route['News'] = 'CNews/index';
$route['news_view/(:num)'] = 'CNews/view_news/$1';
$route['add_news'] = 'CNews/add_new';
$route['news_edit/(:num)'] = 'CNews/edit_news/$1';
$route['news_delete/(:num)'] = 'CNews/delete_news/$1';
$route['update_news'] = 'CNews/update_news';
$route['new_news'] = 'CNews/save_news';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
