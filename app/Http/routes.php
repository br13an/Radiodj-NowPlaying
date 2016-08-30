<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', ['uses' => 'SiteController@index']);

$app->group(['prefix' => 'api/v1'], function () use ($app) {
  $app->get('foo', function () {
      return 'Hello World';
  });
  $app->get('upcoming', ['uses' => 'App\Http\Controllers\nowPlayingController@upcoming' ]);
  $app->get('upcoming_tracks', ['uses' => 'App\Http\Controllers\nowPlayingController@upcoming_tracks' ]);
  $app->get('nowplaying', ['uses' => 'App\Http\Controllers\nowPlayingController@nowPlaying' ]);
  $app->get('history', ['uses' => 'App\Http\Controllers\nowPlayingController@history' ]);

});
