<?php
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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
  $app->post('request/{id}', ['uses' => 'App\Http\Controllers\nowPlayingController@request' ]);
  $app->get('upcoming', ['uses' => 'App\Http\Controllers\nowPlayingController@upcoming' ]);
  $app->get('upcoming_tracks', ['uses' => 'App\Http\Controllers\nowPlayingController@upcoming_tracks' ]);
  $app->get('nowplaying', ['uses' => 'App\Http\Controllers\nowPlayingController@nowPlaying' ]);
  $app->get('history', ['uses' => 'App\Http\Controllers\nowPlayingController@history' ]);
  $app->get('songs/search/{query}', ['uses' => 'App\Http\Controllers\songController@search']);
  $app->get('songs/count', ['uses' => 'App\Http\Controllers\songController@count_tracks']);
  $app->get('songs/page/{id}', ['uses' => 'App\Http\Controllers\songController@paginate']);
  $app->get('songs', ['uses' => 'App\Http\Controllers\songController@index']);
});
