<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('listView','Cont::getList');
$routes->get('/','Cont::getForm');
$routes->get('makePDF', 'Cont::CreatePDF');
$routes->post('genPdf', 'Cont::genPdf');