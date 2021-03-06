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

/**
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
**/

$route['default_controller'] = "welcome";
$route['agenda'] = "agenda_ct/agenda";
$route['agenda/info/(:any)'] = "agenda_ct/agenda/info/$1";
$route['agenda/hola'] = "agenda_ct/agenda/hola";
$route['agenda/integrantes'] = "agenda_ct/agenda/integrantes";
$route['agenda/contactar'] = "agenda_ct/agenda/contactar";
$route['agenda/(:any)'] = "agenda_ct/agenda/$1";
$route['test'] = "welcometest/indextest";


$route['hotel'] = "hotel/hotel";

$route['hotel/true'] = "hotel/hotel/index/true";
$route['hotel/(:any)'] = "hotel/hotel/$1";
$route['hotel/(:any)/(:any)'] = "hotel/hotel/$1/$2";

$route['droche'] = "droche_prueba_cll";
$route['droche/(:any)'] = "droche_prueba_cll/$1";

$route['registro_usuario'] = "hotel/registro_usuario";
$route['registro_usuario/(:any)'] = "hotel/registro_usuario/$1";

$route['disponibilidad'] = "hotel/disponibilidad";
$route['disponibilidad/(:any)'] = "hotel/disponibilidad/$1";


$route['ver_reservas'] = "hotel/ver_reservas";
$route['ver_reservas/(:any)'] = "hotel/ver_reservas/$1";

$route['contactar'] = "hotel/contactar";
$route['contactar/(:any)'] = "hotel/contactar/$1";




$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
