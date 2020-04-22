<?php
/**
 * File:  index.php
 * Creation Date: 04/12/2017
 * description:
 * adresse localhost = http://127.0.0.1/cours/Tavernier-Julien-web/tpnote2/factcli/index.php/client/liste
 */
 require_once __DIR__ . '/vendor/autoload.php';
 use factcli\controllers\VueController as VueController;

 $app = new \Slim\Slim();

//Création du lien vers les tableaux de facture des clients
 $app->get('/liste/(:token)', function($token = -1) use($app){
   //Sinon on récupère l'url avec l'id
   if($token != -1){
     $controller = new VueController();
     $controller->construitListeItem($app,$token);
   }
 })->name('liste_item');

 //Création du lien vers la liste des clients
 $app->get('/liste', function() use($app){
   $controller = new VueController();
   $controller->construitListe($app);
 })->name('liste');

 //Création du lien vers le formulaire de login
 $app->get('/login', function() use($app){
   $controller = new VueController();
   $controller->construitFormulaire($app);
 })->name('login');
 
 $app->run();

?>
