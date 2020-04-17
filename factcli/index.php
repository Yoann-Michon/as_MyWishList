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
 $app->get('/client/liste/facture(/:id)', function($id = -1) use($app){
   //Si id == 0 alors valeur = "Séléctionnez un utilisateur"
   //donc on n'envoie pas le formulaire
   if($id==0){
     $app->redirect($app->urlFor('client_liste'));
   }
   //Sinon on récupère l'url avec l'id
   if($id > -1 ){
     $controller = new ClientController();
     $controller->construitTableClient($id);
   }
   else{
     $app->redirect($app->urlFor('client_factures',array('id' => $app->request->get('id'))));
   }
 })->name('client_factures');

 //Création du lien vers la liste des clients
 $app->get('/client/liste', function() use($app){
   $controller = new ClientController();
   $controller->construitListeClient($app->urlFor('client_factures',array(':id'=>$app->request->get('id'))));
 })->name('client_liste');

 $app->run();

?>
