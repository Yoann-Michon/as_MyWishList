<?php
namespace factcli\vues;

class PrincipaleVue{
  // TODO: rajouter des parametres pour mettre differents css ou autre 
  public static function afficheHtml($content){
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
    echo $html;
  }
}
 ?>
