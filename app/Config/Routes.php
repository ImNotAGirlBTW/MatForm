<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('listView','Cont::getList');
$routes->match(['get','post'],'/','Cont::getForm');

$routes->get('insertView','Cont::insertView');
$routes->post( 'dataUpload','Insert::uploadData');

$routes->get('insert', 'Cont::showInsertForm');
$routes->post('insert/book', 'Insert2::insertBook');

$routes->get('edit/books', 'Edit::editBooks');
$routes->get('edit/book/(:num)', 'Edit::editBook/$1');
$routes->post('save/book', 'Edit::saveBook'); 

$routes->get('delete/(:num)', 'Delete::delete/$1');
