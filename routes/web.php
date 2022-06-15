<?php

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

use App\Http\Controllers\FrontEnd\HomeController;

use Illuminate\Support\Facades\Route;


    Route::get('test-mail-template', function (){
        $inputs = [
            'document'=>'["Chopgwe sdfsdfdsfdsfdfdfsdfds","Leonard sdffsd fds fdsfds","Alah fsdflkdsfjlsdk lkjfs lksdjflksdjflksd"]',
            'code'=>'64484894',
            'city'=>'Destination name',
            'msg'=>'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.',
            'name'=>'Choppyleo',
            'country'=>'Cameroon',
            'email'=>'email of writer'
        ];
        return view('frontend.about-me',compact('inputs'));
    });

    Route::get('notre-flyer', function (){
        return view('frontend.notre-flyer');
    })->name('ourFlyer');

    Route::get('/404', function(){
    return view('errors.404');
});
    //Frontend
    Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
    Route::get('/adherer', [HomeController::class, 'joinUs'])->name('join-us');
    Route::post('/adherer', [HomeController::class, 'joinUs'])->name('submit.membership');
    Route::get('/donner', [HomeController::class, 'donate'])->name('donate');
    Route::get('/manifeste', [HomeController::class, 'manifeste'])->name('manifeste');
    Route::get('/contactez-nous', [HomeController::class, 'contactUs'])->name('contact-us');
    Route::get('/organisation', [HomeController::class, 'organisation'])->name('organisation');
    Route::get('/hubs-communales', [HomeController::class, 'hubsCommunale'])->name('hubsCommunale');
    Route::get('/statuts', [HomeController::class, 'statuts'])->name('status');
    Route::get('/a-propos-de-nous', [HomeController::class, 'aboutUs'])->name('a-propos');
    Route::post('/send-enquiry', [HomeController::class, 'enquiry'])->name('enquiry');
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::resource('hub-communale', HomeController::class);
    });
