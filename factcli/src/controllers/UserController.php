<?php
namespace factcli\controllers;
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use factcli\conf\ConnectionFactory as ConnectionFactory;
use factcli\models\User as User;


class UserController{

  public function __Construct(){
    ConnectionFactory::conn();
  }

}
 ?>
