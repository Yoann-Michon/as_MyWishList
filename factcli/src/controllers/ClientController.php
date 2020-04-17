<?php
namespace factcli\controllers;
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use factcli\conf\ConnectionFactory as ConnectionFactory;
use factcli\models\Client as Client;
use factcli\models\Facture as Facture;
use factcli\vues\ClientVue as ClientVue;

class ClientController{

  public function __Construct(){
    ConnectionFactory::conn();
  }

  //Revois un tableau de tout les clients de la base de forme id = id_client, valeur = nom_client
  private function getListeClient(){
    $clients = array();
    $req1 = Client::select('id','nomcli')->get();
    foreach ($req1 as $row) {
      $clients[$row->id] = $row->nomcli;
    }
    return $clients;
  }

  //Revois un tableau de toutes les factures d'un client de forme valeur = {date_facture,montant}
  private function getTableauClient($id){
    $factures = array();
    $req1 = Facture::select('datefact','montant')->where('client_id','=',$id)->get();
    foreach ($req1 as $row) {
      $factures[] = array($row->datefact,$row->montant);
    }
    return $factures;
  }

  //Revois la vue liste au client
  public function construitListeClient($url){
    $vue = new ClientVue();
    $clients = $this->getListeClient();
    $html = $vue->genereClientliste($clients,$url);
    $this->afficheHtml($html);
  }

  //Revois la vue tableau au client
  public function construitTableClient($id){
    $vue = new ClientVue();
    $client = $this->getTableauClient($id);
    $nomClient = $this->getClient($id);
    $html = $vue->genereClientFacture($client,$nomClient);
    $this->afficheHtml($html);
  }

  //Revois le nom du client qui a l'identifiant $id
  private function getClient($id){
    $client = array();
    $req1 = Client::select('id','nomcli')->where('id','=',$id)->get();
    foreach ($req1 as $row) {
      $client[0] = $row->nomcli;
    }
    return $client[0];
  }

  //affiche la page html
  private function afficheHtml($html){
    echo $html;
  }
}
 ?>
