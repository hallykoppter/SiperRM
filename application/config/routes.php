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
// $route['default_controller'] = 'welcome';
$route['default_controller'] = 'authlogin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard'] = 'welcome';
$route['getchart'] = 'welcome/peminjaman_chart';
$route['data-rm'] = 'admin/Data_rm';
$route['data-rm/input'] = 'admin/Data_rm/input';
$route['data-rm/insert'] = 'admin/Data_rm/insert';
$route['data-rm/delete/(:any)'] = 'admin/Data_rm/delete/$1';
$route['data-rm/edit/(:any)'] = 'admin/Data_rm/edit/$1';
$route['data-rm/qrcode/(:any)'] = 'admin/Data_rm/qrcode/$1';
$route['data-rm/update'] = 'admin/Data_rm/update';
$route['alih-media'] = 'admin/si-retensi/Alihmedia';
$route['pelestarian'] = 'admin/si-retensi/Pelestarian';
$route['pelestarian/tambah'] = 'admin/si-retensi/Pelestarian/tambah';
$route['pelestarian/store'] = 'admin/si-retensi/Pelestarian/store';
$route['pelestarian/edit/(:any)'] = 'admin/si-retensi/Pelestarian/edit/$1';
$route['pelestarian/update'] = 'admin/si-retensi/Pelestarian/update';
$route['pelestarian/delete/(:any)'] = 'admin/si-retensi/Pelestarian/delete/$1';
$route['pemusnahan'] = 'admin/si-retensi/Pemusnahan';
$route['pemusnahan/tambah'] = 'admin/si-retensi/Pemusnahan/tambah';
$route['pemusnahan/store'] = 'admin/si-retensi/Pemusnahan/store';
$route['pemusnahan/edit/(:any)'] = 'admin/si-retensi/Pemusnahan/edit/$1';
$route['pemusnahan/update'] = 'admin/si-retensi/Pemusnahan/update';
$route['pemusnahan/delete/(:any)'] = 'admin/si-retensi/Pemusnahan/delete/$1';
$route['retensi'] = 'admin/si-retensi/Retensi';
$route['retensi-post'] = 'admin/si-retensi/Retensi/post';
$route['retensi-add'] = 'admin/si-retensi/Retensi/tambah';
$route['retensi-store'] = 'admin/si-retensi/Retensi/store';
$route['retensi-delete/(:any)'] = 'admin/si-retensi/Retensi/delete/$1';
$route['retensi-update/(:any)'] = 'admin/si-retensi/Retensi/update/$1';
$route['retensi-edit'] = 'admin/si-retensi/Retensi/edit';
$route['laporan-retensi'] = 'admin/laporan/Lretensi';
$route['laporan-pelestarian'] = 'admin/laporan/Lpelestarian';
$route['laporan-pemusnahan'] = 'admin/laporan/Lpemusnahan';
$route['laporan-peminjaman'] = 'admin/laporan/Lpeminjaman';
$route['laporan-pemusnahan'] = 'admin/laporan/Lpemusnahan';
$route['klpcm'] = 'admin/si-peminjaman/Klpcm';
$route['klpcm/input'] = 'admin/si-peminjaman/Klpcm/input';
$route['klpcm/store'] = 'admin/si-peminjaman/Klpcm/store';
$route['klpcm/delete/(:any)'] = 'admin/si-peminjaman/Klpcm/delete/$1';
$route['klpcm/update/(:any)'] = 'admin/si-peminjaman/Klpcm/update/$1';
$route['klpcm/edit'] = 'admin/si-peminjaman/Klpcm/edit';
$route['peminjaman'] = 'admin/si-peminjaman/Peminjaman';
$route['json_pars'] = 'admin/si-peminjaman/Peminjaman/json_pars';
$route['peminjaman/input'] = 'admin/si-peminjaman/Peminjaman/input';
$route['peminjaman/cetak_tracer'] = 'admin/si-peminjaman/Peminjaman/cetak_tracer';
$route['peminjaman/store'] = 'admin/si-peminjaman/Peminjaman/store';
$route['peminjaman-update/(:any)'] = 'admin/si-peminjaman/Peminjaman/update/$1';
$route['peminjaman/edit'] = 'admin/si-peminjaman/Peminjaman/edit';
$route['peminjaman-delete/(:any)'] = 'admin/si-peminjaman/Peminjaman/delete/$1';
$route['pasien'] = 'admin/si-peminjaman/Peminjaman/pasien';
$route['permintaan'] = 'admin/si-retensi/Pelestarian/permintaan';
$route['pengembalian'] = 'admin/si-peminjaman/Pengembalian';
$route['pengguna'] = 'admin/data-master/Pengguna';
$route['pengguna/input'] = 'admin/data-master/Pengguna/input';
$route['pengguna/insert'] = 'admin/data-master/Pengguna/insert';
$route['pengguna/delete'] = 'admin/data-master/Pengguna/delete';
$route['pengguna/getname'] = 'admin/data-master/Pengguna/getname';
$route['data-sosial-pasien'] = 'admin/data-master/Datasosialpasien';
$route['data-sosial-pasien/input'] = 'admin/data-master/Datasosialpasien/input';
$route['data-sosial-pasien/insert'] = 'admin/data-master/Datasosialpasien/insert';
$route['data-sosial-pasien/delete'] = 'admin/data-master/Datasosialpasien/delete';
$route['jadwal-retensi'] = 'admin/data-master/Jadwalretensi';
$route['jadwal-retensi/ubah/(:any)'] = 'admin/data-master/Jadwalretensi/ubah/$1';
$route['jadwal-retensi/input'] = 'admin/data-master/Jadwalretensi/input';
$route['jadwal-retensi/update'] = 'admin/data-master/Jadwalretensi/update';
$route['jadwal-retensi/delete'] = 'admin/data-master/Jadwalretensi/delete';
$route['penanggungjawab-poli'] = 'admin/data-master/Penanggungjawabpoli';
$route['penanggungjawab-poli/input'] = 'admin/data-master/Penanggungjawabpoli/input';
$route['penanggungjawab-poli/insert'] = 'admin/data-master/Penanggungjawabpoli/insert';
$route['penanggungjawab-poli/delete'] = 'admin/data-master/Penanggungjawabpoli/delete';
$route['penanggungjawab-poli/edit'] = 'admin/data-master/Penanggungjawabpoli/edit';
$route['penanggungjawab-poli/update'] = 'admin/data-master/Penanggungjawabpoli/update';
$route['poli'] = 'admin/data-master/Poli';
$route['poli/edit/(:any)'] = 'admin/data-master/Poli/edit/$1';
$route['poli/update'] = 'admin/data-master/Poli/update';
$route['poli/input'] = 'admin/data-master/Poli/input';
$route['poli/insert'] = 'admin/data-master/Poli/insert';
$route['poli/delete'] = 'admin/data-master/Poli/delete';
$route['poli/hapus'] = 'admin/data-master/Poli/hapus';

//login
$route['authlogin'] = 'Authlogin';
$route['authlogin/aksi_login'] = 'Authlogin/aksi_login';
$route['authlogin/logout'] = 'Authlogin/logout';
