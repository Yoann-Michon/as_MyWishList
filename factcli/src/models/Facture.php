<?php
namespace factcli\models;
  class Facture extends \Illuminate\Database\Eloquent\Model{
    protected $table = 'facture';
    protected $primaryKey = 'id';
    public $timestamps = false;
  }
 ?>
