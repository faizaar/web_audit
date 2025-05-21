<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// superadmin- Putri
$routes->get('/', 'Home::auditee');


// $routes->get('auditor', 'Home::auditor');


$routes->get('superadmin', 'Home::superadmin');
$routes->get('view/adminauditee','auditee::view_auditee');








// Auditee- Fito





// Auditor- Faiza Fina
$routes->get('auditor', 'auditor::view_auditor');
$routes->get('auditor/alat', 'auditor::view_alat');
$routes->get('auditor/audit', 'auditor::view_audit');
$routes->get('auditor/risiko', 'auditor::view_risiko');
$routes->get('auditor/laporan_hasil', 'auditor::view_tampilan_hasil');

$routes->get('auditor/aset', 'auditor::view_aset');
$routes->get('auditor/komponen', 'auditor::view_komponen');
$routes->get('auditor/dokumen', 'auditor::view_dokumen');