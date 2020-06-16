<?php

use App\Events\YoutubeViewer;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::get('redirect/{service}', 'SocialiteController@redirect');
Route::get('callback/{service}', 'SocialiteController@callback');

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ], function (){
    Route::get('youtube/viewer', function (){
        $video = Video::first();
        event(new YoutubeViewer($video));
        return view('youtubeviewer', compact('video'));
    });
    Route::group(['prefix'=>'offer'], function (){
        Route::get('create', 'Offer@create');
        Route::post('store', 'Offer@store')->name('offer.store');
        Route::get('index', 'Offer@index')->name('offer.index');
        Route::get('edit/{id}', 'Offer@edit')->name('offer.edit');
        Route::patch('update/{id}', 'Offer@update')->name('offer.update');
    });

});



Route::resource('offer/ajax', 'OfferAjaxController');


