<?php
namespace factcli\conf;
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

class ConnectionFactory {

    public static function conn() {
      $db = new DB();
      $db->addConnection(parse_ini_file('src/conf/conf.ini'));
      $db->setAsGlobal();
      $db->bootEloquent();
  }
}

?>
