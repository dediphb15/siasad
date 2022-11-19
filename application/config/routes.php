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
$route['default_controller'] = 'welcome';

$route['login-admin'] = 'admin/login';
$route['prosess-login'] = 'admin/login/aksi_login';
$route['logout-admin'] = 'admin/login/logout';
$route['dashboard'] = 'dashboard';

//karyawan
$route['data-karyawan'] = 'admin/karyawan';
$route['tampil-karyawan'] = 'admin/karyawan/tampil_karyawan';
$route['tambah-pegawai'] = 'admin/karyawan/tambah_karyawan';
$route['hapus-pegawai'] = 'admin/karyawan/hapus_karyawan';
$route['get-pegawai'] = 'admin/karyawan/get_karyawan';
$route['update-pegawai'] = 'admin/karyawan/ubah_karyawan';

//siswa
$route['data-siswa'] = 'admin/siswa';
$route['tampil-siswa'] = 'admin/siswa/tampil_siswa';
$route['get-siswa'] = 'admin/siswa/get_siswa';
$route['tambah-siswa'] = 'admin/siswa/tambah_siswa';
$route['update-siswa'] = 'admin/siswa/ubah_siswa';
$route['hapus-siswa'] = 'admin/siswa/hapus_siswa';

//jabatan
$route['data-jabatan'] = 'admin/karyawan/index_jabatan';
$route['tampil-jabatan'] = 'admin/karyawan/tampil_jabatan';
$route['tambah-jabatan'] = 'admin/karyawan/tambah_jabatan';
$route['hapus-jabatan'] = 'admin/karyawan/hapus_jabatan';
$route['get-jabatan'] = 'admin/karyawan/get_jabatan';
$route['update-jabatan'] = 'admin/karyawan/ubah_jabatan';

//jadwal
$route['data-jadwal'] = 'admin/jadwal';
$route['tampil-jadwal'] = 'admin/jadwal/tampil_jadwal';
$route['buat-jadwal'] = 'admin/jadwal/buat_jadwal';
$route['tambah-jadwal'] = 'admin/jadwal/tambah_jadwal';
$route['get-jadwal'] = 'admin/jadwal/get_jadwal';
$route['ubah-jadwal'] = 'admin/jadwal/ubah_jadwal';
$route['edit-jadwal/(:any)/(:any)/(:any)'] = 'admin/jadwal/edit_jadwal/$1/$2/$3';
$route['hapus-jadwal'] = 'admin/jadwal/hapus';
$route['hapus-data-jadwal'] = 'admin/jadwal/hapus_data_jadwal';

//mapel
$route['data-mapel'] = 'admin/mapel';
$route['tampil-mapel'] = 'admin/mapel/tampil_mapel';
$route['tambah-mapel'] = 'admin/mapel/tambah_mapel';
$route['hapus-mapel'] = 'admin/mapel/hapus_mapel';
$route['get-mapel'] = 'admin/mapel/get_mapel';
$route['update-mapel'] = 'admin/mapel/ubah_mapel';

//kelas
$route['data-kelas'] = 'admin/kelas';
$route['tampil-kelas'] = 'admin/kelas/tampil_kelas';
$route['tambah-kelas'] = 'admin/kelas/tambah_kelas';
$route['hapus-kelas'] = 'admin/kelas/hapus_kelas';
$route['get-kelas'] = 'admin/kelas/get_kelas';
$route['update-kelas'] = 'admin/kelas/ubah_kelas';

//char admin
$route['show-chat'] = 'admin/chat';

//chat user
$route['send-message'] = 'welcome/sendMessage';
$route['get-message'] = 'welcome/getChat';
$route['add-user'] = 'welcome/masuk';
$route['offline-user'] = 'welcome/offline';


$route['gallery'] = 'admin/testimoni';
$route['tambah-gallery'] = 'admin/testimoni/tambah_testimoni';
$route['update-gallery'] = 'admin/testimoni/update_testimoni';
$route['hapus-gallery'] = 'admin/testimoni/hapus_testimoni';

$route['berita'] = 'admin/berita';
$route['tambah-berita'] = 'admin/berita/tambah_berita';
$route['update-berita'] = 'admin/berita/update_berita';
$route['hapus-berita'] = 'admin/berita/hapus_berita';

$route['report'] = 'dashboard/report';


//alumni

$route['dashboard-alumni'] = 'alumni/dashboard';

$route['login-alumni'] = 'alumni/login';
$route['logout-alumni'] = 'alumni/login/logout';

$route['testimoni-alumni'] = 'alumni/testimoni';
$route['event'] = 'alumni/berita';
$route['profil'] = 'alumni/siswa';
$route['alumni'] = 'alumni/siswa/data_alumni';
$route['show-chat-alumni'] = 'alumni/chat';

$route['informasi'] = 'welcome/informasi';
$route['kontak'] = 'welcome/kontak';
$route['testimoni'] = 'welcome/testimoni';
$route['(:any)'] = 'welcome/single_berita/$1';


$route['lupa-password-alumni'] = 'alumni/login/lupa_password';
$route['reset-password'] = 'alumni/login/reset_password';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
