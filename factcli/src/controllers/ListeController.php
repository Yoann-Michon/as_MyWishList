<?php
namespace factcli\controllers;
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use factcli\conf\ConnectionFactory as ConnectionFactory;
use factcli\models\Liste as Liste;
use factcli\models\Item as Item;
use factcli\models\Client as Client;
use factcli\vues\ClientVue as ClientVue;

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
    $vue = new ClientVue();
    $listes = $this->getListes();
    $html = $vue->genereClientFactureMosaique($app,$listes);
    $this->afficheHtml($html);
  }

  public function construitListeItem($app,$token){
    $vue = new ClientVue();
    $liste_id = $this->getListeId($token);
    $items = $this->getItems($liste_id);
    $html = $vue->genereListeItem($app,$items);
    $this->afficheHtml($html);
  }

  //affiche la page html
  private function afficheHtml($html){
    echo $html;
  }
}
 ?>
