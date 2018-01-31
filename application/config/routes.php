<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
$route['default_controller'] = 'welcome';
$route['translate_uri_dashes'] = FALSE;
*/

//$route['404_override'] = 'pages/view';

$route['about'] = 'pages/about';
$route['deals'] = 'pages/deals';
$route['account'] = 'account';
$route['admin'] = 'login';
$route['article/(:any)'] = 'pages/article/$1';
$route['books'] = 'pages/books';
$route['books/(:any)'] = 'pages/books/$1';
$route['contact'] = 'pages/contact';
$route['editpost'] = 'admin/editpost';
$route['editpost/(:any)'] = 'admin/editpost/$1';
$route['founder'] = 'pages/founder';
$route['index'] = 'pages/view';
$route['logout'] = 'admin/logout';
$route['login'] = 'login';
$route['notification'] = 'account/notification';
$route['thank_you'] = 'account/thank_you';
$route['failed'] = 'account/failed';
$route['projects'] = 'pages/page/Our_Projects';
$route['myprofile'] = 'admin/viewprofile';
$route['profile/(:any)'] = 'pages/profile/$1';
$route['page/(:any)'] = 'pages/page/$1';
$route['pages/about'] = 'pages/about';
$route['post'] = 'admin/post';
$route['products'] = 'pages/products';
$route['setfeaturedpost'] = 'admin/setfeaturedpost';
$route['signin'] = 'login/signin';
$route['signup'] = 'login/signup';
$route['viewadvert'] = 'admin/viewadvert';
$route['viewadvert/(:any)'] = 'admin/viewadvert/$1';
$route['viewcategory'] = 'admin/viewcategory';
$route['viewcategory/(:any)'] = 'admin/viewcategory/$1';
$route['viewdeals'] = 'admin/viewdeals';
$route['viewdeals/(:any)'] = 'admin/viewdeals/$1';
$route['viewenquiries'] = 'admin/viewenquiries';
$route['viewpost'] = 'admin/viewpost';
$route['viewpost/(:any)'] = 'admin/viewpost/$1';
$route['users'] = 'admin/users';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';