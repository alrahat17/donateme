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

// Route::get('/', function () {
// 	return view('welcome');
// });

Route::get('/','HomeController@show_welcome_page');
Route::get('/about','HomeController@show_about_page');
Route::get('/all_campaigns','HomeController@show_campaigns');
Route::get('/campaign_by_category/{id}','HomeController@show_campaign_by_category');
Route::get('/campaign_details/{id}','HomeController@show_campaign_details');
Route::get('/all_categories','HomeController@show_categories');
Route::get('/all_blogs','HomeController@show_blogs');
Route::post('/update_profile/{id}','HomeController@update_profile');
Route::get('/my_comments','HomeController@show_my_comments');
Route::get('/my_donations','HomeController@show_my_donations');
Route::get('/my_campaigns','HomeController@show_my_campaigns');
Route::get('/create_campaign','HomeController@create_campaign');
Route::post('/save_campaign','HomeController@save_campaign');
Route::get('/create_donation','HomeController@create_donation');
Route::get('/my_withdrawals','HomeController@show_my_withdrawals');
Route::post('/charge','HomeController@generate_token');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{

	Route::get('admins','AdminController@index');
		
	

	Route::get('all_user', 'AdminController@all_user')->name('users');
	//for datatable ajax data
	Route::get('users','AdminController@getUsers')->name('get.users');



	
	Route::get('/users/create','AdminController@create_user');
	Route::post('/users','AdminController@save_user');
	Route::get('/users/{id}/edit','AdminController@edit_user');
	Route::post('/update_user/{id}','AdminController@update_user');
	Route::get('/delete_user/{id}','AdminController@delete_user')->name('delete.user');
	Route::resource('categories','CategoryController');
	Route::resource('general_settings','GeneralSettingController');
	Route::resource('payment_settings','PaymentSettingController');
	Route::resource('media_settings','MediaSettingController');
	Route::resource('campaigns','CampaignController');
	Route::resource('pages','PageController');
	Route::resource('blogs','BlogController');
	Route::resource('donations','DonationController');
	Route::resource('testimonials','TestimonialController');
	Route::get('/com_don/{id}','DonationController@com_donation');
	Route::resource('galleries','GalleryController');
	Route::resource('withdrawals','WithdrawalController');
	Route::get('/com_payment/{id}','WithdrawalController@com_payment');

	Route::post('/users/create', 'AdminController@check')->name('email_available.check');


});
