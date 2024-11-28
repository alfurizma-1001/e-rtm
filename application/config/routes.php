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
$route['default_controller'] = 'login/login';

$route['login'] = 'login/auth';
$route['home'] = 'home';

$route['departemen'] = 'departemen';
$route['departemen/tambah'] = 'departemen/tambah';
$route['departemen/edit/(:any)'] = 'departemen/edit/$1';

$route['pegawai'] = 'pegawai';
$route['pegawai/tambah'] = 'pegawai/tambah';
$route['pegawai/edit/(:any)'] = 'pegawai/edit/$1';
$route['pegawai/edituser/(:any)'] = 'pegawai/edituser/$1';
$route['pegawai/editpass/(:any)'] = 'pegawai/editpass/$1';

$route['termo'] = 'termo';
$route['termo/tambah'] = 'termo/tambah';
$route['termo/edit/(:any)'] = 'termo/edit/$1';

$route['timbangan'] = 'timbangan';
$route['timbangan/tambah'] = 'timbangan/tambah';
$route['timbangan/edit/(:any)'] = 'timbangan/edit/$1';

$route['verif_premix'] = 'verif_premix';
$route['verif_premix/tambah'] = 'verif_premix/tambah';
$route['verif_premix/edit/(:any)'] = 'verif_premix/edit/$1';

$route['verif_intitusi'] = 'verif_intitusi';
$route['verif_intitusi/tambah'] = 'verif_intitusi/tambah';
$route['verif_intitusi/edit/(:any)'] = 'verif_intitusi/edit/$1';

$route['pem_masak_steamer'] = 'pem_masak_steamer';
$route['pem_masak_steamer/tambah'] = 'pem_masak_steamer/tambah';
$route['pem_masak_steamer/edit/(:any)'] = 'pem_masak_steamer/edit/$1';

$route['pem_tumbling'] = 'pem_tumbling';
$route['pem_tumbling/tambah'] = 'pem_tumbling/tambah';
$route['pem_tumbling/edit/(:any)'] = 'pem_tumbling/edit/$1';

$route['pem_kettle'] = 'pem_kettle';
$route['pem_kettle/tambah'] = 'pem_kettle/tambah';
$route['pem_kettle/edit/(:any)'] = 'pem_kettle/edit/$1';

$route['pem_thawing'] = 'pem_thawing';
$route['pem_thawing/tambah'] = 'pem_thawing/tambah';
$route['pem_thawing/edit/(:any)'] = 'pem_thawing/edit/$1';

$route['par_yoshinoya'] = 'par_yoshinoya';
$route['par_yoshinoya/tambah'] = 'par_yoshinoya/tambah';
$route['par_yoshinoya/edit/(:any)'] = 'par_yoshinoya/edit/$1';

$route['suhu_ruangan'] = 'suhu_ruangan';
$route['suhu_ruangan/tambah'] = 'suhu_ruangan/tambah';
$route['suhu_ruangan/edit/(:any)'] = 'suhu_ruangan/edit/$1';

$route['pem_sanitasi'] = 'pem_sanitasi';
$route['pem_sanitasi/tambah'] = 'pem_sanitasi/tambah';
$route['pem_sanitasi/edit/(:any)'] = 'pem_sanitasi/edit/$1';

$route['sanitasi'] = 'sanitasi';
$route['sanitasi/tambah'] = 'sanitasi/tambah';
$route['sanitasi/edit/(:any)'] = 'sanitasi/edit/$1';

$route['my_profile'] = 'profile/my_profile';
$route['setting'] = 'profile/setting';
$route['setting/submit'] = 'profile/submit_edit';

$route['kontaminasi_benda_asing'] = 'kontaminasi_benda_asing';
$route['kontaminasi_benda_asing/tambah'] = 'kontaminasi_benda_asing/tambah';
$route['kontaminasi_benda_asing/edit/(:any)'] = 'kontaminasi_benda_asing/edit/$1';

$route['pspsiqf'] = 'pspsiqf';
$route['pspsiqf/tambah'] = 'pspsiqf/tambah';
$route['pspsiqf/edit/(:any)'] = 'pspsiqf/edit/$1';

$route['verif_pengemasan'] = 'verif_pengemasan';
$route['verif_pengemasan/tambah'] = 'verif_pengemasan/tambah';
$route['verif_pengemasan/edit/(:any)'] = 'verif_pengemasan/edit/$1';

$route['pem_metal_detector'] = 'pem_metal_detector';
$route['pem_metal_detector/tambah'] = 'pem_metal_detector/tambah';
$route['pem_metal_detector/edit/(:any)'] = 'pem_metal_detector/edit/$1';

$route['pem_xray'] = 'pem_xray';
$route['pem_xray/tambah'] = 'pem_xray/tambah';
$route['pem_xray/edit/(:any)'] = 'pem_xray/edit/$1';

$route['suhu_tahapan'] = 'suhu_tahapan';
$route['suhu_tahapan/tambah'] = 'suhu_tahapan/tambah';
$route['suhu_tahapan/edit/(:any)'] = 'suhu_tahapan/edit/$1';

$route['monitoring_false'] = 'monitoring_false';
$route['monitoring_false/tambah'] = 'monitoring_false/tambah';
$route['monitoring_false/edit/(:any)'] = 'monitoring_false/edit/$1';

$route['monitoring_repack'] = 'monitoring_repack';
$route['monitoring_repack/tambah'] = 'monitoring_repack/tambah';
$route['monitoring_repack/edit/(:any)'] = 'monitoring_repack/edit/$1';

$route['verif_topping'] = 'verif_topping';
$route['verif_topping/tambah'] = 'verif_topping/tambah';
$route['verif_topping/edit/(:any)'] = 'verif_topping/edit/$1';

$route['verif_mesin'] = 'verif_mesin';
$route['verif_mesin/tambah'] = 'verif_mesin/tambah';
$route['verif_mesin/edit/(:any)'] = 'verif_mesin/edit/$1';

$route['loading_lokal'] = 'loading_lokal';
$route['loading_lokal/tambah'] = 'loading_lokal/tambah';
$route['loading_lokal/edit/(:any)'] = 'loading_lokal/edit/$1';

$route['pemeriksaan_retur'] = 'pemeriksaan_retur';
$route['pemeriksaan_retur/tambah'] = 'pemeriksaan_retur/tambah';
$route['pemeriksaan_retur/edit/(:any)'] = 'pemeriksaan_retur/edit/$1';

$route['pemeriksaan_premix'] = 'pemeriksaan_premix';
$route['pemeriksaan_premix/tambah'] = 'pemeriksaan_premix/tambah';
$route['pemeriksaan_premix/edit/(:any)'] = 'pemeriksaan_premix/edit/$1';

$route['pemeriksaan_dry_store'] = 'pemeriksaan_dry_store';
$route['pemeriksaan_dry_store/tambah'] = 'pemeriksaan_dry_store/tambah';
$route['pemeriksaan_dry_store/edit/(:any)'] = 'pemeriksaan_dry_store/edit/$1';

$route['pemeriksaan_incoming'] = 'pemeriksaan_incoming';
$route['pemeriksaan_incoming/tambah'] = 'pemeriksaan_incoming/tambah';
$route['pemeriksaan_incoming/edit/(:any)'] = 'pemeriksaan_incoming/edit/$1';

$route['pemeriksaan_kedatangan_raw_material'] = 'pemeriksaan_kedatangan_raw_material';
$route['pemeriksaan_kedatangan_raw_material/tambah'] = 'pemeriksaan_kedatangan_raw_material/tambah';
$route['pemeriksaan_kedatangan_raw_material/edit/(:any)'] = 'pemeriksaan_kedatangan_raw_material/edit/$1';

$route['Pemeriksaan_Kemasan_Dari_Pemasok'] = 'Pemeriksaan_Kemasan_Dari_Pemasok';
$route['Pemeriksaan_Kemasan_Dari_Pemasok/tambah'] = 'Pemeriksaan_Kemasan_Dari_Pemasok/tambah';
$route['Pemeriksaan_Kemasan_Dari_Pemasok/edit/(:any)'] = 'Pemeriksaan_Kemasan_Dari_Pemasok/edit/$1';

$route['pem_masak_rice_cooker'] = 'pem_masak_rice_cooker';
$route['pem_masak_rice_cooker/tambah'] = 'pem_masak_rice_cooker/tambah';
$route['pem_masak_rice_cooker/edit/(:any)'] = 'pem_masak_rice_cooker/edit/$1';

$route['suhu_cold_storage'] = 'suhu_cold_storage';
$route['suhu_cold_storage/tambah'] = 'suhu_cold_storage/tambah';
$route['suhu_cold_storage/edit/(:any)'] = 'suhu_cold_storage/edit/$1';

$route['verifikasi_sanitasi'] = 'verifikasi_sanitasi';
$route['verifikasi_sanitasi/tambah'] = 'verifikasi_sanitasi/tambah';
$route['verifikasi_sanitasi/edit/(:any)'] = 'verifikasi_sanitasi/edit/$1';

$route['sample_bulanan_rnd'] = 'sample_bulanan_rnd';
$route['sample_bulanan_rnd/tambah'] = 'sample_bulanan_rnd/tambah';
$route['sample_bulanan_rnd/edit/(:any)'] = 'sample_bulanan_rnd/edit/$1';

$route['retained_sample_report'] = 'retained_sample_report';
$route['retained_sample_report/tambah'] = 'retained_sample_report/tambah';
$route['retained_sample_report/edit/(:any)'] = 'retained_sample_report/edit/$1';

$route['laboratory_sample'] = 'laboratory_sample';
$route['laboratory_sample/tambah'] = 'laboratory_sample/tambah';
$route['laboratory_sample/edit/(:any)'] = 'laboratory_sample/edit/$1';

$route['pem_masak_noodle'] = 'pem_masak_noodle';
$route['pem_masak_noodle/tambah'] = 'pem_masak_noodle/tambah';
$route['pem_masak_noodle/edit/(:any)'] = 'pem_masak_noodle/edit/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['logout'] = 'login/logout';
