<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['beranda'] = 'home';
$route['coba'] = 'home/coba';
//halaman
$route['berita/(:num)/(:any)'] = 'halaman/tampil_berita/$1';
$route['printberita/(:num)/(:any)'] = 'halaman/print_berita/$1';
$route['daftar_berita'] = 'halaman/daftar_berita';
$route['daftar_berita/(:any)'] = 'halaman/daftar_berita/$1';

$route['pengumuman/(:num)/(:any)'] = 'halaman/tampil_pengumuman/$1';
$route['printpengumuman/(:num)/(:any)'] = 'halaman/print_pengumuman/$1';
$route['daftar_pengumuman'] = 'halaman/daftar_pengumuman';
$route['daftar_penguman/(:any)'] = 'halaman/daftar_pengumuman/$1';

$route['agenda/(:num)/(:any)'] = 'halaman/tampil_agenda/$1';
$route['printagenda/(:num)/(:any)'] = 'halaman/print_agenda/$1';
$route['daftar_agenda'] = 'halaman/daftar_agenda';
$route['daftar_agenda/(:any)'] = 'halaman/daftar_agenda/$1';

$route['search'] = 'home/search';

$route['daftar_galeri'] = 'halaman/daftar_galeri';
//menu
$route['profile/(:any)'] = 'menu/tampil_profile/$1';
$route['akademik/(:any)'] = 'menu/tampil_akademik/$1';
$route['prestasi'] = 'menu/tampil_prestasi';
$route['prestasi/filter'] = 'menu/filter_prestasi';
$route['prestasi/print'] = 'menu/print_prestasi';
$route['view/(:num)'] = 'menu/tampil_view/$1';

//admin
$route['sij-wpa'] = 'auth/index';
$route['auth'] = 'auth';
$route['logout'] = 'auth/logout';
$route['main'] = 'admin/main';
$route['captcha'] = 'auth/captcha';

$route['informasi/(:any)'] = 'admin/tampil_info/$1';
$route['informasi/form_add/(:any)'] = 'admin/Fadd_info/$1';
$route['informasi/add/(:any)'] = 'admin/add_info/$1';
$route['informasi/form_edit/(:any)/(:num)'] = 'admin/Fedit_info/$1/$2';
$route['informasi/edit/(:any)'] = 'admin/add_info/$1';
$route['informasi/delete/(:any)/(:num)'] = 'admin/delete/$1/$2';

$route['galeri/(:any)'] = 'admin/tampil_galeri/$1';
$route['galeri/form_add/(:any)'] = 'admin/Fadd_galeri/$1';
$route['galeri/add/(:any)'] = 'admin/add_galeri/$1';
$route['galeri/form_edit/(:any)/(:num)'] = 'admin/Fedit_galeri/$1/$2';
$route['galeri/edit/(:any)'] = 'admin/add_galeri/$1';
$route['galeri/delete/(:any)/(:num)'] = 'admin/delete/$1/$2';

$route['page'] = 'admin/tampil_page';
$route['page/search'] = 'admin/tampil_page';
$route['page/form_edit/(:num)'] = 'admin/Fedit_page/$1';
$route['page/edit'] = 'admin/add_page';

$route['admin/prestasi'] = 'admin/tampil_akademik/prestasi';
$route['admin/prestasi/form_add'] = 'admin/Fadd_prestasi';
$route['admin/prestasi/add'] = 'admin/add_akademik/prestasi';
$route['admin/prestasi/form_edit/(:num)'] = 'admin/Fedit_prestasi/$1';
$route['admin/prestasi/edit'] = 'admin/add_akademik/prestasi';
$route['admin/prestasi/delete/(:num)'] = 'admin/delete/prestasi/$1';

$route['trafik/(:any)'] = 'admin/trafik/$1';

$route['menu'] = 'admin/tampil_menu/menu';
$route['menu/search'] = 'admin/tampil_menu/menu';
$route['menu/form_add'] = 'admin/fadd_menu/menu';
$route['menu/add'] = 'admin/add_menu/menu';
$route['menu/form_edit/(:num)'] = 'admin/fedit_menu/$1/menu';
$route['menu/edit'] = 'admin/add_menu/menu';
$route['delete/menu/(:num)'] = 'admin/delete/menu/$1';

$route['sub_menu'] = 'admin/tampil_menu/sub_menu';
$route['sub_menu/search'] = 'admin/tampil_menu/sub_menu';
$route['sub_menu/form_add'] = 'admin/fadd_menu/sub_menu';
$route['sub_menu/add'] = 'admin/add_menu/sub_menu';
$route['sub_menu/form_edit/(:num)'] = 'admin/fedit_menu/$1/sub_menu';
$route['sub_menu/edit'] = 'admin/add_menu/sub_menu';
$route['delete/sub_menu/(:num)'] = 'admin/delete/sub_menu/$1';

$route['pages'] = 'admin/tampil_menu/pages';
$route['pages/search'] = 'admin/tampil_menu/pages';
$route['pages/form_add'] = 'admin/fadd_menu/pages';
$route['pages/add'] = 'admin/add_menu/pages';
$route['pages/form_edit/(:num)'] = 'admin/fedit_menu/$1/pages';
$route['pages/edit'] = 'admin/add_menu/pages';
$route['delete/pages/(:num)'] = 'admin/delete/pages/$1';
//pengaturan
$route['pengaturan/(:any)'] = 'admin/tampil_pengaturan/$1';
$route['pengaturan/edit/(:any)'] = 'admin/add_pengaturan/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
