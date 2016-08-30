<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use \App\Song;

class songController extends Controller
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

    public function index()
    {
        // Retrieve all songs in the DB (DO NOT PAGINATE)
        $query = DB::table('songs')->where('song_type', 0)->orderBy('artist', 'ASC')->select("*");
        return $query->get();
    }

    public function paginate($skip)
    {
      $pages = 250 * $skip;
      $query = DB::table('songs')->where('song_type', 0)->orderBy('artist', 'ASC')->limit(100)->skip($pages)->select("*");
      return $query->get();
    }

    public function count_tracks()
    {
      //DB::connection()->disableQueryLog();
      $query = DB::table('songs')->where('song_type', 0)->count();
      return $query;
    }

    public function search($query)
    {
      $input = str_replace('%20', ' ', $query);
      //$input = $query;
      $songs = DB::table('songs')
                    ->where('artist', 'like', '%'. $input .'%')
                    ->orWhere('title', 'like', '%'. $input .'%')
                    ->get();
                  
      return $songs;
    }

}
