<?php
namespace factcli\models;
  class Client extends \Illuminate\Database\Eloquent\Model{
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function authentification($hash,$pseudo){
      $listes = array();
      $reqListe = Client::select('nom','prenom','droit')
      ->where('pseudo','=',$pseudo)->where('hash','=',$hash)->get();
      foreach ($reqListe as $row) {
        $listes[] = array($row->nom, $row->prenom, $row->droit);
      }
      return $listes[0];
    }
  }
 ?>
