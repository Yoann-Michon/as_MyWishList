<?php
namespace factcli\controllers;
require_once 'vendor/autoload.php';

use factcli\controllers\DataController as DataController;
use factcli\controllers\UserController as UserController;
use factcli\vues\ClientVue as ClientVue;
use factcli\vues\PrincipaleVue as PrincipaleVue;
use factcli\vues\UserVue as UserVue;


class VueController{

  public function construitListe($app){
    $data = new DataController();
    $listes = $data->getListes();
    $html = ClientVue::genereClientFactureMosaique($app,$listes);
    $html = PrincipaleVue::genereHtml($html);
    $this->afficheHtml($html);
  }

  public function construitListeItem($app,$token){
    $data = new DataController();
    $liste_id = $data->getListeId($token);
    $items = $data->getItems($liste_id);
    $html = ClientVue::genereListeItem($app,$items);
    $html = PrincipaleVue::genereHtml($html);
    $this->afficheHtml($html);
  }

  public function construitFormulaire($app){
    $html = UserVue::genereLogin($app);
    $html = PrincipaleVue::genereHtml($html);
    $this->afficheHtml($html);
  }

  //affiche la page html
  private function afficheHtml($html){
    echo $html;
  }
}
 ?>
