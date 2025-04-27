<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
service('auth')->routes($routes);
$routes->get('/', 'Home::index', ['as' => 'index']);

$routes->get('contact', 'Home::contact', ['as' => 'contact']);

$routes->get('communes/gestion_clients', 'Commune::clients', ['as' => 'clients']);

//----------------------------------------------- Commune
$routes->get('ajout_commune', 'Commune::ajout', ['as' => 'ajoutCommune']);
$routes->post('ajout_commune', 'Commune::create', ['as' => 'createCommune']);

$routes->get('modifier_commune(:num)', 'Commune::modif/$1', ['as' => 'modifCommune']);
$routes->post('modifier_commune', 'Commune::update', ['as' => 'updateCommune']);

$routes->post('suppr_commune', 'Commune::delete', ['as' => 'supprCommune']);
//-----------------------------------------------

$routes->get('gestion_panneaux', 'Panneau::index', ['as' => 'panneaux']);

//----------------------------------------------- Panneau
$routes->get('ajout_panneaux', 'Panneau::ajout', ['as' => 'ajoutPanneau']);
$routes->post('ajout_panneaux', 'Panneau::create', ['as' => 'createPanneau']);

$routes->get('modifier_panneaux(:num)', 'Panneau::modif/$1', ['as' => 'modifPanneau']);
$routes->post('modifier_panneaux', 'Panneau::update', ['as' => 'updatePanneau']);

$routes->post('suppr_panneaux', 'Panneau::delete', ['as' => 'supprPanneau']);

//----------------------------------------------- Message

$routes->get('gestion_message', 'Message::index', ['as' => 'message']); // Liste des messages

$routes->get('message/(:num)', 'Message::view/$1', ['as' => 'viewMessage']); // Détails du message

$routes->get('ajout_message', 'Message::ajout', ['as' => 'ajoutMessage']);
$routes->post('ajout_message', 'Message::create', ['as' => 'createMessage']);

$routes->get('modifier_message/(:num)', 'Message::modif/$1', ['as' => 'modifMessage']);
$routes->post('modifier_message', 'Message::update', ['as' => 'updateMessage']);

$routes->post('suppr_message', 'Message::delete', ['as' => 'supprMessage']);
//-----------------------------------------------

$routes->get('gestion_utilisateur', 'Utilisateur::index', ['as' => 'utilisateur']);

//----------------------------------------------- Utilisateur
$routes->get('ajout_utilisateur', 'Utilisateur::ajout', ['as' => 'ajoutUtilisateur']);
$routes->post('ajout_utilisateur', 'Utilisateur::create', ['as' => 'createUtilisateur']);

$routes->get('modifier_utilisateur(:num)', 'Utilisateur::modif/$1', ['as' => 'modifUtilisateur']);
$routes->post('modifier_utilisateur', 'Utilisateur::update', ['as' => 'updateUtilisateur']);

$routes->post('suppr_utilisateur', 'Utilisateur::delete', ['as' => 'supprUtilisateur']);

