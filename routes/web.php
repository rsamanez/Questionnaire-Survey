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
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function(){
   return view('welcome');
});
Route::get('/email', function () {

    Mail::to('rsamanez@gmail.com')->send(new WelcomeMail());
    return new WelcomeMail();
});

$ip = request()->ip();
if (function_exists('newrelic_record_custom_event')) {
    newrelic_record_custom_event("ClientIP", array(
        "ip" => $ip
    ));
}

Route::get('/services', 'ServiceController@index');
Route::post('/services', 'ServiceController@store');

Route::get('/customers', 'CustomerController@index');
Route::get('/customers/create', 'CustomerController@create');
Route::post('/customers', 'CustomerController@store');
Route::get('/customers/{customer}', 'CustomerController@show');
Route::get('/customers/{customer}/edit', 'CustomerController@edit');
Route::patch('/customers/{customer}', 'CustomerController@update');
Route::delete('/customers/{customer}', 'CustomerController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/questionnaires/create', 'QuestionnaireController@create')->name('questionnaires.create');
Route::post('/questionnaires', 'QuestionnaireController@store')->name('questionnaire.store');
Route::get('/questionnaires/{questionnaire}', 'QuestionnaireController@show');


Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create')->name('questions.create');
Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@store')->name('questions.store');
Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@destroy')->name('questions.delete');

Route::get('/surveys/{questionnaire}-{slug}', 'SurveyController@show')->name('surveys.show');
Route::post('/surveys/{questionnaire}-{slug}', 'SurveyController@store')->name('surveys.store');

