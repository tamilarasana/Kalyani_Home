<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BroucherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExteriorController;
use App\Http\Controllers\FullviewController;
use App\Http\Controllers\InteriorController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\AmentitiesController;
use App\Http\Controllers\MasterplanController;
use App\Http\Controllers\MaplocationController;
use App\Http\Controllers\ProducttypeController;
use App\Http\Controllers\SpecificationController;
use App\Http\Controllers\WalkthroughvedioController;

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
    return view('auth.login');
    // return view('welcome');
});
    

Route::get('/create', function () {
    return view('createData');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('banner',BannerController::class);
    Route::resource('aboutus',AboutusController::class);
    Route::resource('amentities',AmentitiesController::class);
    Route::resource('blog',BlogController::class);
    Route::resource('broucher',BroucherController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('enquiry',EnquiryController::class);
    Route::resource('exterior',ExteriorController::class);
    Route::resource('faq',FaqController::class);
    Route::resource('fullview',FullviewController::class);
    Route::resource('highlight',HighlightController::class);
    Route::resource('interior',InteriorController::class);
    Route::resource('images',ImageController::class);
    Route::resource('location',LocationController::class);
    Route::resource('maplocation',MaplocationController::class);
    Route::resource('masterplan',MasterplanController::class);
    Route::resource('product',ProductController::class);
    Route::resource('producttype',ProducttypeController::class);
    Route::resource('property',PropertyController::class);
    Route::resource('season',SeasonController::class);
    Route::resource('specification',SpecificationController::class);
    Route::resource('walkthroughvedio',WalkthroughvedioController::class); 
    Route::post('destroy-image',[ImageController::class,'destroyImage'])->name('destroy.image');
   
    // Route::get('/destroy/image/{image?}', [ImageController::class,'destroyImage'])->name('destroy.image');

});

