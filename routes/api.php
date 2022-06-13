<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
// your api is integerated but if you want reintegrate no problem
// to configure jwt-auth visit this link https://jwt-auth.readthedocs.io/en/docs/

Route::group(['middleware' => ['ApiLang', 'cors'], 'namespace' => 'Api\V1'], function () {

	Route::get('/', function () {

	});
	// Insert your Api Here Start //
	Route::group(['middleware' => 'guest'], function () {
		Route::post('login', 'Auth\AuthAndLogin@login')->name('api.login');
		Route::post('register', 'Auth\Register@register')->name('api.register');
	});

	Route::group(['middleware' => 'auth:api'], function () {
		Route::get('account', 'Auth\AuthAndLogin@account')->name('api.account');
		Route::post('logout', 'Auth\AuthAndLogin@logout')->name('api.logout');
		Route::post('refresh', 'Auth\AuthAndLogin@refresh')->name('api.refresh');
		Route::post('me', 'Auth\AuthAndLogin@me')->name('api.me');
		Route::post('change/password', 'Auth\AuthAndLogin@change_password')->name('api.change_password');
		//Auth-Api-Start//
	
		
			// Route::apiResource("videos","VideosApi", ["as" => "api.videos"]); 
			// Route::post("videos/multi_delete","VideosApi@multi_delete"); 
			Route::apiResource("images","ImagesApi", ["as" => "api.images"]); 
			Route::post("images/multi_delete","ImagesApi@multi_delete"); 
			Route::apiResource("locations","LocationsApi", ["as" => "api.locations"]); 
			Route::post("locations/multi_delete","LocationsApi@multi_delete"); 
			//Auth-Api-End//
	});


	Route::apiResource("productscontrollrt","productsControllrtApi", ["as" => "api.productscontrollrt"]); 
	Route::post("productscontrollrt/multi_delete","productsControllrtApi@multi_delete"); 
	Route::get("image","ImageControllerApi@index");
	Route::apiResource("videos","VideosApi", ["as" => "api.videos"]); 

	// Route::apiResource("image","ImageControllerApi", ["as" => "api.image"]); 
	// Route::post("image/multi_delete","ImageControllerApi@multi_delete"); 
	// Route::post("image/upload/multi","ImageControllerApi@multi_upload"); 
	// Route::post("image/delete/file","ImageControllerApi@delete_file"); 

	Route::apiResource("categories","categoriesControllerApi", ["as" => "api.categories"]); 
//	Route::post("categories/multi_delete","categoriesControllerApi@multi_delete"); 
	Route::get('supcategories/{id}','Api\categoriesApi@SupCategorise');

	// Insert your Api Here End //GGVP+9QH, Khartoum, Sudan //GGVP+9QH، الخرطوم
});