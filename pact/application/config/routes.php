<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] 	= "home";
$route['404_override'] 		= 'page/nopagefound';
$route['([a-zA-Z_-]+)/admin'] = 'page/nopagefound';
$route['([a-zA-Z_-]+)/admin/(:any)'] = 'page/nopagefound';


//controller/module folder name/function of controller = modules/controller/function
$route['admin/([a-zA-Z_-]+)/(:any)'] = '$1/admin/$2';
$route['admin/([a-zA-Z_-]+)'] = '$1/admin/index';
$route['admin'] = "home/admin/index";  // if url have only "/admin" then redirect to home/admin/index
$route['(:any)'] = 'home/pages/$1/$a';
$route['send_feedback'] = 'home/send_feedback';
$route['home'] = 'home/index';
$route['email'] = 'home/email_msg';
$route['gallery'] = 'photogallery';
$route['login'] = 'home/login';
$route['mail'] = 'home/mail';
$route['sort_by'] = 'home/sort_by';
//$route['catagory_items'] = 'home/catagory_items';
$route['signup'] = 'home/signup';
$route['reset_password'] = 'home/reset_password';
$route['image/(:any)'] = 'photogallery/list_images';
$route['sendMsg'] = 'home/sendMsg';
 

/* End of file routes.php */
/* Location: ./application/config/routes.php */