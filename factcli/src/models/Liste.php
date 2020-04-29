<?php
namespace factcli\models;
  class Liste extends \Illuminate\Database\Eloquent\Model{
    protected $table = 'liste';
    protected $primaryKey = 'no';
    public $timestamps = false;

    public static function getListes($nbLignes = 10){
      // TODO: faire en sorte qu il remonte $nbLignes lignes (pour les filtres).
      $listes = array();
      $reqListe = Liste::select('titre','description','token')->get();
      foreach ($reqListe as $row) {
        $listes[] = array($row->titre,$row->description,$row->token);
      }
      return $listes;
    }

    public static function getListeId($token){
      $listeId = array();
      $reqListe = Liste::select('no')->where('token','=',$token)->get();
      foreach ($reqListe as $row) {
        $listeId[0] = $row->no;
      }
      return $listeId[0];
    }

  }
 ?>
