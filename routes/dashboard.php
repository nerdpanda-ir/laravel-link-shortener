<?php

Route::get('/','HomeController')->name('home');

Route::name('permission.')->prefix('permission')->namespace('Permission')
        ->group(function (){
            Route::get('create','CreateController')
                    ->name('create')->middleware('can:create-permission');
        });
