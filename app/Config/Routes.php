<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('listView','Cont::getList');
$routes->get('allBooks','Cont::allBooksPdf');
$routes->match(['get','post'],'/','Cont::getForm');


$routes->get('insertView','Cont::insertView');
$routes->post( 'dataUpload','Insert::uploadData');

$routes->get('insert', 'Cont::showInsertForm');
$routes->post('insert/book', 'Insert2::insertBook');

$routes->get('edit/books', 'Edit::editBooks');
$routes->get('edit/book/(:num)', 'Edit::editBook/$1');
$routes->post('save/book', 'Edit::saveBook'); 

$routes->get('delete/(:num)', 'Delete::delete/$1');
$routes->get('delete/Cond1/(:num)', 'Delete::delete2/$1');
$routes->get('delete/Cond2/(:num)', 'Delete::delete3/$1');
$routes->get('delete/User/(:num)','Delete::deleteuser/$1');

$routes->get('editCond', 'Edit::loadChar');
$routes->get('editChar(:num)','Edit::EditChar/$1');
$routes->post('editChar/save','Edit::saveChar');
$routes->get('editOkruh(:num)','Edit::EditOkruh/$1');
$routes->post('editOkruh/save','Edit::saveOkruh');
$routes->post('saveEditCond','Edit::saveCondition');
$routes->post('editYear','Edit::editYear');

$routes->get('editUsers','Users::showUsers');
$routes->get('editUsers/(:num)','Users::editUser/$1');
$routes->post('editUsers/save','Users::saveUser');

$routes->get('insertCond','Insert::showCondForm');
$routes->post('insert/cond', 'Insert::addCond');

$routes->get('insertCond2','Insert::showCondForm2');
$routes->post('insert/cond2', 'Insert::addCond2');

//$routes->get('login','Login::showLog');


$routes->get('login', 'AuthLog::login');
$routes->get('callback', 'AuthLog::callback');
$routes->get('logout', 'AuthLog::logout');

//$routes->post('saveData','Insert2::saveData');

//$routes->post('editForm','Login::process_data');