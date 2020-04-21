<?php
/**
 * File:  index.php
 * Creation Date: 04/12/2017
 * description:
 * adresse localhost = http://127.0.0.1/cours/Tavernier-Julien-web/tpnote2/factcli/index.php/client/liste
 */
 require_once __DIR__ . '/vendor/autoload.php';
 use factcli\controllers\ClientController as ClientController;

 $app = new \Slim\Slim();

//Création du lien vers les tableaux de facture des clients
 $app->get('/liste/(:token)', function($token) use($app){
   //Sinon on récupère l'url avec l'id
   $controller = new ClientController();
   $controller->construitListeItem($token);

 })->name('liste_item');


 //Création du lien vers la liste des clients
 $app->get('/liste', function() use($app){
   $controller = new ClientController();
   $controller->construitListe($app);
 })->name('liste');

 $app->run();

?>
