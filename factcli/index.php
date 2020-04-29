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
 $app->get('/liste(/:token)', function($token = -1) use($app){
   //Sinon on récupère l'url avec l'id
   $controller = new VueController();

   if($token != -1){
     $controller->construitListeItem($app,$token);
   }
   else{
     $controller->construitListe($app);
   }
 })->name('liste_item');

 //Création du lien vers le formulaire de login
 $app->get('/signin', function() use($app){
   $controller = new VueController();
   $controller->construitFormulaire($app);
 })->name('signIn');

 $app->get('/login', function() use($app){
   $controller = new VueController();
   $controller->construitLogIn($app);
 })->name('login');
 $app->run();

?>
