<?php
namespace factcli\controllers;
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use factcli\conf\ConnectionFactory as ConnectionFactory;
use factcli\models\User as User;
use factcli\vues\UserVue as UserVue;

class UserController{
  
  public function __Construct(){
    ConnectionFactory::conn();
  }

  public function genereForm($app){
    UserVue::genereForm($app);

  }
}
 ?>
