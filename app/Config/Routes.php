<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('listView','Cont::getList');
$routes->match(['get','post'],'/','Cont::getForm');
$routes->get('insertView','Cont::insertView');
$routes->post( 'dataUpload','Insert::uploadData');