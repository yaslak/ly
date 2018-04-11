<?php

/**
 * notifications
 */
Route::put('notifications','App\NotificationController@notification')->name('notifications');
Route::post('notifications','App\NotificationController@read')->name('notification.read');

/**
 * language chooser
 */
Route::post('/language-chooser','App\LanguageController@changeLanguage');
Route::post('/language/',array(
    'before' => 'csrf',
    'as' => 'language-chooser',
    'uses' => 'App\LanguageController@changeLanguage'
));

/**
 * auth
 */
Auth::routes();

/**
 * recover
 */
Route::prefix('recover')->namespace('Recover')->middleware('auth')->group(function (){
   Route::get('recover','RecoverController@index')->name('recover');
   Route::put('recover','RecoverController@store')->name('recover.store');
   Route::get('mail','MailController@index')->name('recover.mail');
   Route::put('mail','MailController@store')->name('recover.mail.store');
   Route::get('sq','SqController@index')->name('recover.sq');
   Route::post('sq','SqController@store')->name('recover.sq.store');
});

/**
 * Système password reset
 */
Route::namespace('Auth\Password')->prefix('password')->middleware('guest')->group(function (){
    Route::resource('target', 'TargetController')->only([
        'index', 'store'
    ]);
    Route::resource('mail', 'MailController')->only([
        'show', 'store'
    ]);
    Route::resource('sq', 'SqController')->only([
        'show', 'store'
    ]);
    Route::resource('NPsw', 'NPswController')->only([
        'show', 'store'
    ]);
});

/**
 * home
 */
Route::get('/', 'HomeController@index')->name('home');

/**
 * user
 */
Route::resources(['user'=>'User\UserController']);

/**
 * setting
 */
Route::resources(['setting' => 'SettingController']);