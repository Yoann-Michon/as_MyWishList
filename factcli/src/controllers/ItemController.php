<?php
namespace factcli\controllers;

require_once 'vendor/autoload.php';

use \factcli\models\Item.php;

class ItemController{

  /**
  * Affiche un item
  */

  public function AfficheItem($id,$token){
    $item = Item::where(["id" => $id, "token"=> $token])->first();
    $vue = new ItemVue();
    $vue->rendreItem();
  }

  /**
  * Suppression de l'item
  */

  public function supprimerItem($id,$token){
    $item = Item::where ("id", "=", $id)->first();
    $liste = Liste::where ("no", "=", $item->liste_id)->first();
      if(isset($_SESSION["id"])){
        $item-> delete();
      }
  }

  /**
  * Création de l'item
  */

  public function creationItem($id,$token){
    $item = Item::where("id", "=", $id)->first();
    $item = new Item();
    $vue = new ItemVue();

    if (!isset($_POST["nom"])) $vue->error ("Saisir un nom");
    if (!isset($_POST["descr"])) $vue->error ("Saisir une description");
    if (!isset($_POST["tarif"])) $vue->error ("Saisir un tarif");

    $img = NULL;
    $url = NULL;
    $nom = $_POST["nom"];
    $descr = $_POST["descr"];
    $tarif = $_POST["tarif"];

    $item->nom = $nom;
    $item->descr = $descr;
    $item->tarif = $tarif;
    $item->img = $img;
    $item->url = $url;

    $item->save();
    $vue = new VueItem($item);
    $vue->render();
  }

  /**
  * Modifier l'item
  */

  public function modifierItem($id,$token){
    $item = Item::where("id", "=", $id)->first();
    if ($_POST["nom"] != ""){
      if ($_POST["nom"] ==  $_POST["nom"]){
        $item->nom = $_POST["nom"];
        $item->save();
      }
    }
    if ($_POST["descr"] != ""){
      if ($_POST["descr"] ==  $_POST["descr"]){
        $item->nom = $_POST["descr"];
        $item->save();
      }
    }
    if ($_POST["tarif"] != ""){
      if ($_POST["tarif"] ==  $_POST["tarif"]){
        $item->nom = $_POST["tarif"];
        $item->save();
      }
    }
    if ($_POST["img"] != ""){
      if ($_POST["img"] ==  $_POST["img"]){
        $item->nom = $_POST["img"];
        $item->save();
      }
    }
    if ($_POST["url"] != ""){
      if ($_POST["url"] ==  $_POST["url"]){
        $item->nom = $_POST["url"];
        $item->save();
      }
    }
    $vue = new modifierItem($item);
    $vue-> render();

  }

}
?>
