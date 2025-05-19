<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::auditee');


$routes->get('auditor', 'Home::auditor');


$routes->get('superadmin', 'Home::superadmin');
$routes->get('view/adminauditee','auditee::view_auditee');
