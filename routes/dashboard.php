<?php

Route::get('/','HomeController')->name('home');

Route::name('permission.')->prefix('permission')
        ->group(function (){
            Route::get('create','Permission\CreateController')
                    ->name('create')->middleware('can:create-permission');
        });
