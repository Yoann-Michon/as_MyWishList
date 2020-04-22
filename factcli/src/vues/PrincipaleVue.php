<?php
namespace factcli\vues;

class PrincipaleVue{
  public static function genereHtml($content){
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
