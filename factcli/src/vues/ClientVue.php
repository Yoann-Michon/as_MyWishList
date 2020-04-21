<?php
namespace factcli\vues;

class ClientVue{

  private $typeVue;

  //Revois une chaine de caractère faite du code html du tableau de facture d'un client
  public function genereListeItem($app,$items){
    $titre = array('nom','descr','img','tarif');
    $html = '
    <h2>Liste</h2>
    <a href = "'.$app->urlFor('liste').'">Retour</a>
    <table>
      <tr>';

    foreach ($titre as $value) {
      $html = $html."<th>$value</th>";
    }
    $html = $html."</tr>";

    foreach ($items as $item) {
      $html = $html."<tr>
              <td>$item[0]</td>
              <td>$item[1]</td>
              <td>$item[2]</td>
              <td>$item[3]</td>
            </tr>";
    }
    $html = $html."</table>";
    return $this->genereHtml($html);
  }

  public function genereClientFactureMosaique($app,$clients){
    $titre = array('titre','description');
    $html = "<h2>Liste</h2>";
    $html = $html.'<div id="mosaique">';
    foreach ($clients as $client) {
      $html = $html.'<a href="'.$app->urlFor('liste_item',array('token' => $client[2])).'">
                      <div class="element"'.">
                        <h3>$client[0]</h3>
                        <p>$client[1]</p>
                      </div>
                     </a>";
    }
    $html = $html.'</div>';
    return $this->genereHtml($html);
  }

  //Revois une chaine de caractère faite du code html complet de la page
  public function genereHtml($content){
    $html = "<!DOCTYPE html>
              <html lang=".'"fr"'.">
                <head>
                  <title>Titre du document</title>
                  <meta charset=".'"UTF-8"'.">
                  <link rel=".'"stylesheet"'." href=".'"../src/www/main.css"'."/>
                </head>
                <body>
                  $content
                </body>
              </html>";
    return $html;
  }
}
?>
