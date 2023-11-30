<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('listView','Cont::getList');
$routes->match(['get','post'],'/','Cont::getForm');