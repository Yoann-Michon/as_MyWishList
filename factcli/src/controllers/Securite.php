<?php
namespace factcli\controllers;
class Securite{

  //Renvoie le hash du mdp
  static private getHash($pass){
    return password_hash($pass);
  }

  // Empeche les failles de type XSS
  static public securChaine($chaine){
    return htmlspecialchars($chaine);
  }
}
 ?>
