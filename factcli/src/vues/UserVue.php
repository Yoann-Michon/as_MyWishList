<?php
namespace factcli\vues;
class ClientVue{
  public static function genereLogin($app){
    $html ='<form action="" method="get">
              <label>Nom</label>
              <input type="text" placeholder="Ex: Toto" name="nom" required>

              <label>Prénom</label>
              <input type="text" placeholder="Ex: Dupont" name="prenom" required>

              <label>Username</label>
              <input type="text" placeholder="Ex: toto18" name="identifiant" required>

              <label>Email</label>
              <input type="text" placeholder="Ex: t.dupon@messagerie.org" name="mail" required>

              <label>Mot de passe</label>
              <input type="password" placeholder="" name="pass" required>

              <label>Vérification du mot de passe</label>
              <input type="password" placeholder="" name="verifPass" required>

              <input type="submit" value="Valider">
            </form>';
    return $html;
  }
}
 ?>
