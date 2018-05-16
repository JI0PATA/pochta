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

Route::get('/', 'TerminalController@index')->middleware(['auth', 'group'])->name('home');

Auth::routes();

Route::middleware(['auth', 'group'])->group(function() {
    Route::prefix('terminal')->name('terminal.')->group(function() {
        Route::get('/', 'TerminalController@index')->name('index');

        Route::get('hash', 'TerminalController@hash')->name('hash');
        Route::post('check', 'TerminalController@check')->name('check');
        Route::get('checkActive/{id}', 'TerminalController@checkActive')->name('checkActive');

        Route::name('applications.')->group(function() {
            Route::get('applications/create/{queue_id}', 'ApplicationController@create')->name('create');
        });
    });

    Route::prefix('info')->name('info.')->group(function() {
        Route::get('/', 'InfoController@index')->name('index');

        Route::get('hash', 'InfoController@hash')->name('hash');
        Route::post('check', 'InfoController@check')->name('check');
        Route::get('checkActive/{id}', 'InfoController@checkActive')->name('checkActive');
    });

    Route::prefix('user')->name('user.')->group(function() {
        Route::get('/', 'UserController@index')->name('index');


        Route::name('queues.')->group(function() {
            Route::get('queues', 'QueueController@index')->name('index');

            Route::get('queues/add', 'QueueController@add')->name('add');
            Route::post('queues/create', 'QueueController@create')->name('create');

            Route::get('queues/edit/{id}', 'QueueController@edit')->name('edit');
            Route::post('queues/update/{id}', 'QueueController@update')->name('update');

            Route::get('queues/delete/{id}', 'QueueController@delete')->name('delete');
        });

        Route::name('windows.')->group(function() {
            Route::get('windows', 'WindowController@index')->name('index');

            Route::get('windows/add', 'WindowController@add')->name('add');
            Route::post('windows/create', 'WindowController@create')->name('create');

            Route::get('windows/edit/{id}', 'WindowController@edit')->name('edit');
            Route::post('windows/update/{id}', 'WindowController@update')->name('update');

            Route::get('windows/delete/{id}', 'WindowController@delete')->name('delete');
        });

        Route::name('applications.')->group(function() {
            Route::get('applications', 'ApplicationController@index')->name('index');

            Route::get('applications/join', 'ApplicationController@join')->name('join');
            Route::get('applications/hash', 'ApplicationController@check')->name('hash');
            Route::post('applications/check', 'ApplicationController@check')->name('check');
            Route::get('applications/checkActive/{id}', 'ApplicationController@checkActive')->name('checkActive');
        });

    });
});

Route::get('test', 'TestController@test');

