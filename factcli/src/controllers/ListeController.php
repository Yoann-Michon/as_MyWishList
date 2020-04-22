<?php
namespace factcli\controllers;
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use factcli\conf\ConnectionFactory as ConnectionFactory;
use factcli\models\Liste as Liste;
use factcli\models\Item as Item;
use factcli\models\Client as Client;
use factcli\vues\ClientVue as ClientVue;
use factcli\vues\PrincipaleVue as PrincipaleVue;


class ListeController{

  public function __Construct(){
    ConnectionFactory::conn();
  }

  private function getListes($nbLignes = 10){
    $listes = array();
    $reqListe = Liste::select('titre','description','token')->get();
    foreach ($reqListe as $row) {
      $listes[] = array($row->titre,$row->description,$row->token);
    }
    return $listes;
  }

  private function getListeId($token){
    $listeId = array();
    $reqListe = Liste::select('no')->where('token','=',$token)->get();
    foreach ($reqListe as $row) {
      $listeId[0] = $row->no;
    }
    return $listeId[0];
  }

  private function getItems($liste_id){
    $listes = array();
    $reqListe = Item::select('nom','descr','img','tarif')->where('liste_id','=',$liste_id)->get();
    foreach ($reqListe as $row) {
      $listes[] = array($row->nom,$row->descr,$row->img,$row->tarif);
    }
    return $listes;
  }

  public function construitListe($app){
    $listes = $this->getListes();

    $html = ClientVue::genereClientFactureMosaique($app,$listes);
    $html = PrincipaleVue::genereHtml($html);
    $this->afficheHtml($html);
  }

  public function construitListeItem($app,$token){
    $liste_id = $this->getListeId($token);
    $items = $this->getItems($liste_id);

    $html = ClientVue::genereListeItem($app,$items);
    $html = PrincipaleVue::genereHtml($html);
    $this->afficheHtml($html);
  }

  //affiche la page html
  private function afficheHtml($html){
    echo $html;
  }
}
 ?>
