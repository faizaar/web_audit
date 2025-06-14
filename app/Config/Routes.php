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
// Users - Superadmin Role
$routes->get('superadmin/users', 'admin_controller::index_users');                          // Tampilkan halaman user (tabel + modal)
$routes->post('superadmin/users/save', 'admin_controller::save_users');                     // Simpan user baru
$routes->post('superadmin/users/update/(:num)', 'admin_controller::update_users/$1');       // Update user via modal
$routes->get('superadmin/users/delete/(:num)', 'admin_controller::delete_users/$1');        // Hapus user



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


$routes->get('auditor/alat/view_alat', 'AlatController::view_alat');
$routes->get('auditor/alat/add_alat', 'AlatController::add_alat');
$routes->post('auditor/alat/store_alat', 'AlatController::store_alat');
$routes->get('auditor/alat/edit_alat/(:num)', 'AlatController::edit_alat/$1');
$routes->post('auditor/alat/update_alat/(:num)', 'AlatController::update_alat/$1');
$routes->get('auditor/alat/hapus_alat/(:num)', 'AlatController::delete_alat/$1');

//RESIKO
$routes->get('auditor/resiko', 'auditor::view_risiko');
$routes->post('auditor/resiko/simpan_risiko', 'Auditor::simpan_risiko');
$routes->get('auditor/resiko/edit_risiko/(:segment)', 'Auditor::edit_risiko/$1');
$routes->post('auditor/resiko/update_risiko', 'Auditor::update_risiko');
$routes->get('auditor/resiko/hapus_risiko/(:any)', 'Auditor::hapus_risiko/$1');

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

//JADWAL
$routes->get('auditor/jadwal', 'Auditor::view_jadwal'); 
$routes->post('auditor/tambah_jadwal', 'Auditor::tambah_jadwal');
$routes->post('auditor/edit_jadwal', 'Auditor::edit_jadwal');
$routes->get('auditor/hapus_jadwal/(:num)', 'Auditor::hapus_jadwal/$1');

// alokasi 
// Rute untuk menampilkan halaman alokasi
$routes->get('auditor/alokasi', 'Auditor::view_alokasi'); // Untuk tampilan

// Rute untuk menyimpan data alokasi (menambahkan data)
$routes->post('auditor/alokasi/simpan', 'Auditor::simpan_alokasi'); // Untuk tambah (dari modal)

// Rute untuk memperbarui data alokasi
$routes->post('auditor/alokasi/update', 'Auditor::update_alokasi'); // Untuk update (dari modal edit)

// Rute untuk menghapus data alokasi
$routes->get('auditor/alokasi/hapus/(:segment)', 'Auditor::hapus_alokasi/$1'); // Untuk hapus
