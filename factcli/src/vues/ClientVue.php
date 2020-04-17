<?php
namespace factcli\vues;

class ClientVue{

  private $typeVue;

  //Revois une chaine de caractère faite du code html du formulaire de la liste des client
  public function genereClientliste($clients,$url){
    $html ='<form action="'.$url.'" method="get">
            <select name="id">
              <option value="0">Séléctionnez un utilisateur</option>';
    foreach ($clients as $id_client => $nom_client) {
      $html = $html.'<option value="'.$id_client.'">'.$nom_client.'</option>';
    }
    $html = $html.'  </select>
            <p>
              <input type="submit" value="OK">
            </p>
          </form>';
    return $this->genereHtml($html);
  }

  //Revois une chaine de caractère faite du code html du tableau de facture d'un client
  public function genereClientFacture($clients,$nomClient){
    $titre = array('Date de facture','Montant');
    $html = "
    <h2>Tableau d Items de $nomClient</h2>
    <table>
      <tr>";

    foreach ($titre as $value) {
      $html = $html."<th>$value</th>";
    }
    $html = $html."</tr>";

    foreach ($clients as $client) {
      $html = $html."<tr>
              <td>$client[0]</td>
              <td>$client[1]</td>
            </tr>";
    }
    $html = $html."</table>";
    return $this->genereHtml($html);
  }

  //Revois une chaine de caractère faite du code html complet de la page
  public function genereHtml($content){
    $html = "<!DOCTYPE html>
              <html lang=".'"fr"'.">
                <head>
                  <title>Titre du document</title>
                  <meta charset=".'"UTF-8"'.">
                </head>
                <body>
                  $content
                </body>
              </html>";
    return $html;
  }
}
?>
