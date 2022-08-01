<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['ApiLang', 'cors'], 'namespace' => 'Api\V1'], function () {

	Route::get('/', function () {
	});

	Route::group(['middleware' => 'guest'], function () {
		Route::post('login', 'Auth\AuthAndLogin@login')->name('api.login');
	});

	Route::group(['middleware' => 'auth:sanctum'], function () {
		Route::get('account', 'Auth\AuthAndLogin@account')->name('api.account');
		Route::post('logout', 'Auth\AuthAndLogin@logout')->name('api.logout');
		Route::post('UserUpdate','Auth\Register@UserUpdate');
		
		Route::post('Order','Orders@card');
		Route::post('OrderOne','Orders@cardTake');
		
		Route::get('myOrder','MyOrder@getMyOrder');
		Route::post('confirmOrder','Orders@confirmOrder');
		Route::apiResource("favorites", "FavoritesApi", ["as" => "api.favorites"]);


	});

	Route::post('login','Auth\Register@login');


	Route::get("images",'ImagesApi@index');
	Route::get("images/{id}",'ImagesApi@show');

	Route::apiResource("productscontrollrt", "productsControllrtApi", ["as" => "api.productscontrollrt"]);
	Route::get('search/{name}', 'productsControllrtApi@search');
	Route::apiResource("videos", "VideosApi", ["as" => "api.videos"]);

	Route::apiResource("categories", "categoriesApi", ["as" => "api.categories"]);
	Route::get('supcategories/{id}', 'categoriesApi@SupCategorise');


	Route::apiResource("locations", "LocationsApi", ["as" => "api.locations"]);

	Route::apiResource("contacts", "ContactsApi", ["as" => "api.contacts"]);
	Route::apiResource("services", "servicesApi", ["as" => "api.services"]);

	Route::post('register', 'Auth\Register@Sigin');
});
