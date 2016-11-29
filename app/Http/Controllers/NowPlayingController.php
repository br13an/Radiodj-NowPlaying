<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use \App\Song;

class NowPlayingController extends Controller
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

    public function nowPlaying(){
      $query = DB::table('history')->where('song_type', 0)
        ->orderBy('date_played', 'DESC')->limit(1)->select("*")->get();
      return $query;
    }

    public function upcoming(){
      $nextLimit		= 3;				// How many upcoming tracks to display?
      $shufleUpcoming = True;				// Don't show the correct order of upcoming tracks
      $resLimit		= 5;				// How many history tracks to display?
      $shuffleQuery = null;        // Shuffle upcoming tracks?

      if ($shufleUpcoming == True) {
        $shuffleQuery = " ORDER BY RAND()";
        $getQueue = DB::table('queuelist')->select("*")
          ->orderBy(DB::raw('RAND()'))->get();
      }
      else{
        $getQueue = DB::table('queuelist')->select("*")->get();
      }

      return $getQueue;

    }

    public function upcoming_tracks(){
      $array = array();
      $song = new \app\Helpers\SongHelper;
      foreach(\app\Http\Controllers\NowPlayingController::upcoming() as $upcoming){
        foreach($song->getSongByID($upcoming->songID)->get() as $track){
          $so = new \App\Song;
          $so->ID = $track->ID;
          $so->artist = $track->artist;
          $so->title = $track->title;
          $so->album = $track->album;
          $array[] = $so;
        }
      }

      return response()->json($array);
    }

    public function request($id)
    {
      // Assuming we've already found the track.
      // We're only interested in requesting.
      $songHelper = new \app\Helpers\SongHelper;
      $username = 'API';
      $userIP = $songHelper->getRealIpAddr();
      $message = 'Requested by API';
      $songID = $id;

      // Demo data filled. Now create a new db object to post.
      try
      {
        DB::table('requests')->insert(
          [
            'songID'        =>    $songID,
            'username'      =>    $username,
            'userIP'        =>    $userIP,
            'message'       =>    $message,
            'requested'     =>    DB::raw('NOW()')
          ]
        );
        $trackName = $songHelper->getSongByID($songID);
        return response()->json($trackName);
      }
      catch(\Exception $e)
      {
        return response('[ { "message" : "failed" } ]', 503)
              ->header('Content-Type', 'json');
      }

    }

    public function history(){
      $query = DB::table('history')->where('song_type', 0)
        ->orderBy('date_played', 'DESC')->limit(6)->skip(1)->select("*")->get();
      return $query;
    }
}
