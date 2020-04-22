<?php
namespace factcli\controllers;
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use factcli\conf\ConnectionFactory as ConnectionFactory;
use factcli\models\Liste as Liste;
use factcli\models\Item as Item;
use factcli\models\Client as Client;

class DataController{

  public function __Construct(){
    ConnectionFactory::conn();
  }

  public function getListes($nbLignes = 10){
    $listes = array();
    $reqListe = Liste::select('titre','description','token')->get();
    foreach ($reqListe as $row) {
      $listes[] = array($row->titre,$row->description,$row->token);
    }
    return $listes;
  }

  public function getListeId($token){
    $listeId = array();
    $reqListe = Liste::select('no')->where('token','=',$token)->get();
    foreach ($reqListe as $row) {
      $listeId[0] = $row->no;
    }
    return $listeId[0];
  }

  public function getItems($liste_id){
    $listes = array();
    $reqListe = Item::select('nom','descr','img','tarif')->where('liste_id','=',$liste_id)->get();
    foreach ($reqListe as $row) {
      $listes[] = array($row->nom,$row->descr,$row->img,$row->tarif);
    }
    return $listes;
  }
}
 ?>
