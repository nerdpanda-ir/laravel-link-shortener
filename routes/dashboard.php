<?php

Route::get('/','HomeController')->name('home');

Route::name('permission.')->prefix('permission')->namespace('Permission')
        ->group(function (){
            Route::get('all','ViewAllController')
                ->name('view-all')->middleware('can:view-all-permissions');

            Route::get('create','CreateController')
                    ->name('create')->middleware('can:create-permission');

            Route::post('store','StoreController')
                    ->name('store')->middleware('can:create-permission');

            Route::get('edit/{name}','EditController')
                ->name('edit')->middleware('can:edit-permission');
        });
