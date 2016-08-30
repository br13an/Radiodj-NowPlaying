<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;

class SongHelper{
  public function getSongByID($id){
    $so = DB::table('songs')->where('ID', $id)->select("*");
    return $so;
  }
}
