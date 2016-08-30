<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
      $Now = new \GuzzleHttp\Client();
      $res = $Now->request('GET', env('BASE_URL').'/nowplaying');
      $np = json_decode( $res->getBody() );
      $His = new \GuzzleHttp\Client();
      $res2 = $His->request('GET', env('BASE_URL').'/history');
      $history = json_decode( $res2->getBody() );
      $Upc = new \GuzzleHttp\Client();
      $res3 = $Upc->request('GET', env('BASE_URL').'/upcoming');
      $upcoming = json_decode( $res3->getBody() );
      return view('index', ['np' => $np, 'history' => $history, 'upcoming' => $upcoming]);
    }
}
