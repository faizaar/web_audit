<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// superadmin- Putri
$routes->get('/', 'Home::auditee');


$routes->get('auditor', 'Home::auditor');


$routes->get('superadmin', 'Home::superadmin');
$routes->get('view/adminauditee','auditee::view_auditee');








// Auditee- Fito





// Auditor- Faiza Fina