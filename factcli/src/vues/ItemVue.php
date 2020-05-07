<?php

namespace factcli\vues;

use Illuminate\Database\Capsule\Manager as DB;
use factcli\conf\ConnectionFactory as ConnectionFactory;
use factcli\models\User as User;
use factcli\vues\UserVue as UserVue;
use factcli\models\Liste as Liste;
use factcli\models\Item as Item;

class ItemVue {
  private $item;

  public function construct($item){
    parent:: construct();
    $this->item =$item;
  }

  function rendreItem(){
    $menu = self::getMenu();
    $footer = self::getFooter();
    $content = $this->affichageItem();
    $html = "
               $menu
               <div class=\"container h - 100\">
                   <div class=\"row h - items - center\">
                          <div class=\"col - 20 text - center\">
                               $content
                          </div>
                   </div>
               </div>
               $footer";
       echo $html;
   }

  function affichageItem(){
    $id = $this->item->id;
    $nom = $this->item->nom;
    $desc = $this->item->descr;
    $tarif = $this->item->tarif;
    $_SESSION['idItemActuel'] = $this->item->id;
    $html = UserVue::afficheHtml($html);
  }

}
 ?>
