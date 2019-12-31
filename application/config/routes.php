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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Login & Logout 
$route['login'] = 'Login/cek_login';
$route['logout'] = 'Login/logout';

// Forgot Password
$route['forgot_pwd'] = 'Login/forgot_pass';
$route['proses_forgot'] = 'Login/sent_data_user';

// Index Admin
$route['dashboard'] = 'Admin';

// Setting Akun Siswa
$route['settings_siswa'] = 'Settings';
$route['username_siswa'] = 'Settings/change_username_siswa';
$route['change_username_siswa'] = 'Settings/proses_change_username_siswa';
$route['password_siswa'] = 'Settings/change_password_siswa';
$route['change_password_siswa'] = 'Settings/proses_change_password_siswa';
$route['email_siswa'] = 'Settings/change_email_siswa';
$route['add_email_siswa'] = 'Settings/proses_insert_email_siswa';

// Setting Akun Guru
$route['settings_guru'] = 'Settings/pengaturan_guru';
$route['username_guru'] = 'Settings/change_username_guru';
$route['change_username_guru'] = 'Settings/proses_change_username_guru';
$route['password_guru'] = 'Settings/change_password_guru';
$route['change_password_guru'] = 'Settings/proses_change_password_guru';
$route['email_guru'] = 'Settings/change_email_guru';
$route['add_email_guru'] = 'Settings/proses_insert_email_guru';

// Dashboard Admin dari add -> proses -> view
// ADD
$route['dashboard/add_berita'] = 'Admin/add_berita';
$route['dashboard/add_pengumuman'] = 'Admin/add_pengumuman';
$route['dashboard/add_gallery'] = 'Admin/add_gallery';
$route['dashboard/add_siswa'] = 'Admin/add_siswa';
$route['dashboard/add_siswa_excel'] = 'Admin/add_siswa_excel';
$route['dashboard/add_guru'] = 'Admin/add_guru';
$route['dashboard/add_guru_excel'] = 'Admin/add_guru_excel';

// Proses ADD
$route['dashboard_add_berita'] = 'Admin/proses_add_berita';
$route['dashboard_add_pengumuman'] = 'Admin/proses_add_pengumuman';
$route['dashboard_add_gallery'] = 'Admin/proses_add_gallery';
$route['dashboard_add_siswa'] = 'Admin/proses_add_siswa';
$route['dashboard_add_guru'] = 'Admin/proses_add_guru';

// Proses EDIT
$route['dashboard_edit_berita'] = 'Admin/proses_edit_berita';
$route['dashboard_edit_pengumuman'] = 'Admin/proses_edit_pengumuman';
$route['dashboard_edit_gambar'] = 'Admin/proses_edit_gambar';
$route['dashboard_edit_siswa'] = 'Admin/proses_edit_siswa';
$route['dashboard_edit_guru'] = 'Admin/proses_edit_guru';

// View
$route['dashboard/view_berita'] = 'Admin/view_berita';
$route['dashboard/view_pengumuman'] = 'Admin/view_pengumuman';
$route['dashboard/view_siswa'] = 'Admin/view_siswa';
$route['dashboard/view_guru'] = 'Admin/view_guru';
$route['dashboard/view_pesan'] = 'Admin/view_pesan';
$route['dashboard/view_sejarah'] = 'Admin/view_sejarah';
$route['dashboard/view_visimisi'] = 'Admin/view_visimisi';
$route['dashboard/view_programbelajar'] = 'Admin/view_programbelajar';
$route['dashboard/view_kurikulum'] = 'Admin/view_kurikulum';

// Alamat fungsi Search
$route['search'] = 'Home/cari/?';
$route['cari'] = 'Home/proses_cari';

// Kirim Pesan dari pengunjung
$route['add_pesan'] = 'Contact/proses_add_pesan';