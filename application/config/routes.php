<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;

/*Dashboard*/
$route['forgot-password'] = 'login/forgot_password';
$route['reset-password'] = '/login/reset_password';
$route['manage-profile'] = 'dashboard/manage_profile';
$route['membership-plan'] = 'dashboard/membership_plan';
$route['children'] = 'dashboard/children';
$route['add-child'] = 'dashboard/add_child';
$route['edit-child'] = 'dashboard/edit_child';
$route['delete-child'] = 'dashboard/delete_child';
$route['certificates'] = 'dashboard/certificates';
$route['awards'] = 'dashboard/awards';
$route['childcertificate'] = 'dashboard/childcertificate';
$route['childaward'] = 'dashboard/childaward';
$route['share'] = 'dashboard/share';
$route['math'] = 'frontend/math';
$route['english'] = 'frontend/english';
$route['worksheets'] = 'frontend/worksheets';
$route['worksheets/(:any)'] = 'frontend/worksheets/$1';
$route['worksheets/(:any)/(:any)'] = 'frontend/worksheets/$1/$2';
$route['worksheets/(:any)/(:any)/(:any)'] = 'frontend/worksheets/$1/$2/$3';
$route['awards/(:any)/(:any)'] = 'dashboard/awards/$1/$2';
$route['exercise/(:any)/(:any)/(:any)'] = 'frontend/questions/$1/$2/$3';
$route['exercise/(:any)/(:any)/(:any)'] = 'frontend/questions/$1/$2/$3';
$route['worksheet/(:any)/(:any)/(:any)/(:any)'] = 'frontend/worksheet/$1/$2/$3/$4';
$route['grades'] = 'frontend/grades';
$route['topic/(:any)/(:any)'] = 'frontend/topic/$1/$2';
/*$route['usage'] = 'dashboard/usage';*/

/*admin*/

/*Pages*/
$route['pages/(:any)'] = 'pages/view/$1';
$route['pages'] = 'pages';
//$route['(:any)'] = 'pages/view/$1';
//$route['default_controller'] = 'pages/view';
