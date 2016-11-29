<?php
namespace App\Helpers;
use Illuminate\Support\Facades\DB;

class SongHelper{

  public function getSongByID($id){
    $so = DB::table('songs')->where('ID', $id)->select("*");
    return $so;
  }

  public function getRealIpAddr() {
      if (!empty($_SERVER['HTTP_CLIENT_IP'])){
        //check ip from share internet
  	  $ip=$_SERVER['HTTP_CLIENT_IP'];
      }
      elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //to check ip is pass from proxy
  	  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
        $ip=$_SERVER['REMOTE_ADDR'];
      }
      return $ip;
  }
}
