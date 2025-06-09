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
$routes->get('auditor/risiko', 'auditor::view_risiko');
$routes->get('auditor/laporan_hasil', 'auditor::view_tampilan_hasil');
$routes->get('auditor/aset', 'auditor::view_aset');
$routes->get('auditor/komponen', 'auditor::view_komponen');
$routes->get('auditor/dokumen', 'auditor::view_dokumen');
