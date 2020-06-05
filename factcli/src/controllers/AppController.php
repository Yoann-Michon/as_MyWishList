<?php
namespace factcli\controllers;
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use factcli\conf\ConnectionFactory as ConnectionFactory;
use factcli\controllers\Securite as Securite;
use factcli\vues\ClientVue as ClientVue;
use factcli\vues\PrincipaleVue as PrincipaleVue;
use factcli\vues\UserVue as UserVue;
use factcli\models\Liste as Liste;
use factcli\models\Item as Item;
use factcli\models\User as User;

class AppController{

  public function __Construct(){
    ConnectionFactory::conn();
  }

  public function construitListe(){
    $app = \Slim\Slim::getInstance();
    $listes = Liste::getListes();
    $html = ClientVue::genereClientFactureMosaique($app,$listes);
    $html = ClientVue::afficheHtml($html);
  }

  public function construitListeItem($token){
    $app = \Slim\Slim::getInstance();
    $liste_id = Liste::getListeId($token);
    $items = Item::getItems($liste_id);
    $html = ClientVue::genereListeItem($app,$items);
    $html = ClientVue::afficheHtml($html);
  }

  public function construitFormulaire(){
    $app = \Slim\Slim::getInstance();
    $html = UserVue::genereSignIn($app);
    $html = UserVue::afficheHtml($html);
  }

  public function construitLogIn(){
    $app = \Slim\Slim::getInstance();
    $html = UserVue::genereLogin($app);
    $html = UserVue::afficheHtml($html);
  }

  public function authentification(){
    $app = \Slim\Slim::getInstance();
    $logs = array($slim->request->post('login'),$slim->request->post('password'));
    
    echo "<script>alert($logs[0]+' '+$logs[1])</script>";
    //$pass = Securite::securChaine($pass);
    //$user = Securite::securChaine($user);
    //$userInfo = User::authentification($hash,$pseudo);

  }
}
 ?>
