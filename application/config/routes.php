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

$route['login'] = 'kemiskinan/LoginController/login';
$route['cek-login'] = 'kemiskinan/LoginController/cekLogin';
$route['logout'] = 'kemiskinan/LoginController/logout';

$route['beranda'] = 'kemiskinan/HomeController/beranda';
$route['entry'] = 'kemiskinan/EntryController/form';

$route['data/cek/no-kk'] = 'kemiskinan/dataController/cekNoKK';
$route['data/no-kk/tambah'] = 'kemiskinan/KKController/action/create';
$route['data/keluarga/indikator'] = 'kemiskinan/KKController/filter/indikator';

$route['data/keluarga/program/terima/create'] = 'kemiskinan/ProgramController/action/program/create';
$route['data/keluarga/program/terima/update'] = 'kemiskinan/ProgramController/action/program/update';
$route['data/keluarga/program/hapus'] = 'kemiskinan/ProgramController/action/program/delete';
$route['data/keluarga/program/ambil'] = 'kemiskinan/ProgramController/action/programSelect';

$route['data/penduduk/tambah'] = 'kemiskinan/PendudukController/action/create';
$route['data/penduduk/edit'] = 'kemiskinan/PendudukController/action/update';
$route['data/penduduk/hapus'] = 'kemiskinan/PendudukController/action/delete';

$route['pengaturan/pengguna'] = 'kemiskinan/UserController/view';
$route['data/pengaturan/pengguna/page-(:num)'] = 'kemiskinan/UserController/getData/$1';
$route['data/pengaturan/pengguna/create'] = 'kemiskinan/UserController/action/create';
$route['data/pengaturan/pengguna/update'] = 'kemiskinan/UserController/action/update';
$route['data/pengaturan/pengguna/delete'] = 'kemiskinan/UserController/action/delete';

$route['pengaturan/keluarga'] = 'kemiskinan/KeluargaController/view';
$route['data/pengaturan/keluarga/page-(:num)'] = 'kemiskinan/KeluargaController/getData/$1';
$route['data/pengaturan/keluarga/create'] = 'kemiskinan/KeluargaController/action/create';
$route['data/pengaturan/keluarga/update'] = 'kemiskinan/KeluargaController/action/update';
$route['data/pengaturan/keluarga/delete'] = 'kemiskinan/KeluargaController/action/delete';

$route['laporan/indikator'] = 'kemiskinan/LaporanController/indikator';
$route['laporan/indikator/data'] = 'kemiskinan/LaporanController/selectIndikator';
$route['laporan/indikator/save/(:any)'] = 'kemiskinan/LaporanController/selectIndikator/$1';

$route['laporan/program'] = 'kemiskinan/LaporanController/program';
$route['laporan/program/data'] = 'kemiskinan/LaporanController/selectProgram';
$route['laporan/program/save/(:any)'] = 'kemiskinan/LaporanController/selectProgram/$1';

$route['laporan/kesejahteraan'] = 'kemiskinan/LaporanController/kesejahteraan';
$route['laporan/kesejahteraan/data'] = 'kemiskinan/LaporanController/selectKesejahteraan';
$route['laporan/kesejahteraan/save/(:any)'] = 'kemiskinan/LaporanController/selectKesejahteraan/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
