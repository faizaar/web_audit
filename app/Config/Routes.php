<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ====================
// ROUTES UTAMA
// ====================
$routes->get('/', 'Home::auditee');

// ====================
// SUPERADMIN (Putri)
// ====================
$routes->get('superadmin', 'Home::superadmin');
// Auditor - Superadmin Role
$routes->get('superadmin/auditor', 'admin_controller::index_auditor');                         // Menampilkan semua auditor
$routes->post('superadmin/auditor/save', 'admin_controller::save_auditor');                  // Simpan auditor baru
$routes->post('superadmin/auditor/update/(:num)', 'admin_controller::update_auditor/$1');    // Update auditor
$routes->get('superadmin/auditor/delete/(:num)', 'admin_controller::delete_auditor/$1');     // Hapus auditor
// Auditee - Superadmin Role
$routes->get('superadmin/auditee', 'admin_controller::index_auditee');                        // Menampilkan semua auditee
$routes->post('superadmin/auditee/save', 'admin_controller::save_auditee');                 // Simpan auditee baru
$routes->post('superadmin/auditee/update/(:num)', 'admin_controller::update_auditee/$1');   // Update auditee
$routes->get('superadmin/auditee/delete/(:num)', 'admin_controller::delete_auditee/$1');    // Hapus auditee


// ====================
// AUDITEE (Fito)
// ====================
// Auth
$routes->get('login', 'Login::form_login');
$routes->post('login/process', 'Login::process');
$routes->get('auditee/logout', 'Login::logout');
$routes->get('auditor/logout', 'auditor::logout');


// Dashboard dan View
$routes->get('auditee/dashboard', 'auditee::view_auditee');
$routes->get('view/adminauditee', 'auditee::view_auditee');
$routes->get('auditee/jadwal', 'auditee::view_jadwal');
$routes->get('auditee/profile', 'auditee::view_akun');

// Dokumen
$routes->get('auditee/dokumen', 'auditee::form_dokumen');
$routes->post('auditee/save_dokumen', 'auditee::save_dokumen');
$routes->get('auditee/edit_dokumen/(:num)', 'auditee::edit_dokumen/$1');
$routes->post('auditee/update_dokumen', 'auditee::update_dokumen');
$routes->get('auditee/delete_dokumen/(:num)', 'auditee::delete_dokumen/$1');

// Aset
$routes->get('auditee/aset', 'auditee::form_aset');
$routes->post('auditee/save_aset', 'auditee::save_aset');
$routes->get('auditee/edit_aset/(:num)', 'auditee::edit_aset/$1');
$routes->post('auditee/update_aset', 'auditee::update_aset');
$routes->get('auditee/delete_aset/(:num)', 'auditee::delete_aset/$1');

//Alat
$routes->get('auditee/alat', 'auditee::form_alat');
$routes->post('auditee/save_alat', 'auditee::save_alat');
$routes->get('auditee/edit_alat/(:num)', 'auditee::edit_alat/$1');
$routes->post('auditee/update_alat', 'auditee::update_alat');
$routes->get('auditee/delete_alat/(:num)', 'auditee::delete_alat/$1');

// ====================
// AUDITOR (Faiza Fina)
// ====================
$routes->get('auditor', 'auditor::view_auditor');
$routes->get('auditor/alat', 'auditor::view_alat');
$routes->get('auditor/audit', 'auditor::view_audit');

//RESIKO
$routes->get('auditor/risiko', 'auditor::view_risiko');
$routes->post('auditor/simpan_risiko', 'Auditor::simpan_risiko');
$routes->get('auditor/edit_risiko/(:any)', 'Auditor::edit_risiko/$1');
$routes->post('auditor/update_risiko', 'Auditor::update_risiko');
$routes->get('auditor/hapus_risiko/(:any)', 'Auditor::hapus_risiko/$1');

//Laporan Hasil 
$routes->get('auditor/laporan_hasil', 'auditor::view_tampilan_hasil');
$routes->get('auditor/laporan_hasil', 'Auditor::view_tampilan_hasil');
$routes->post('auditor/simpan_laporan', 'Auditor::simpan_laporan');
$routes->post('auditor/update_laporan', 'Auditor::update_laporan');
$routes->get('auditor/hapus_laporan/(:num)', 'Auditor::hapus_laporan/$1');

$routes->get('auditor/aset', 'auditor::view_aset');

// Komponen
$routes->get('auditor/komponen', 'auditor::view_komponen');
$routes->post('auditor/simpan_komponen', 'Auditor::simpan_komponen');
$routes->post('auditor/update_komponen', 'Auditor::update_komponen');
$routes->get('auditor/hapus_komponen/(:segment)', 'Auditor::hapus_komponen/$1');

$routes->get('auditor/dokumen', 'auditor::view_dokumen');


$routes->get('auditor/alokasi', 'auditor::view_alokasi');              // untuk tampilan
$routes->post('auditor/alokasi/simpan', 'auditor::simpan_alokasi');    // untuk tambah (dari modal)
$routes->post('Auditor/alokasi/update', 'auditor::update_alokasi');    // untuk update (dari modal edit)
$routes->get('auuditor/alokasi/hapus/(:segment)', 'auditor::hapus_alokasi/$1'); // untuk hapus
