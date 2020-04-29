<?php
namespace factcli\models;
  class Item extends \Illuminate\Database\Eloquent\Model{
    protected $table = 'item';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function getItems($liste_id){
      $listes = array();
      $reqListe = Item::select('nom','descr','img','tarif')->where('liste_id','=',$liste_id)->get();
      foreach ($reqListe as $row) {
        $listes[] = array($row->nom,$row->descr,$row->img,$row->tarif);
      }
      return $listes;
    }

  }
 ?>
