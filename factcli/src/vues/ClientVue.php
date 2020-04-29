<?php
namespace factcli\vues;

class ClientVue{

  //Revois une chaine de caractère faite du code html du tableau de facture d'un client
  public static function genereListeItem($app,$items){
    $titre = array('nom','descr','img','tarif');
    $html = '
    <h2>Liste</h2>
    <a href = "'.$app->urlFor('liste_item').'">Retour</a>
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
    return $html;
  }

  public static function genereClientFactureMosaique($app,$clients){
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
    return $html;
  }
}
?>
