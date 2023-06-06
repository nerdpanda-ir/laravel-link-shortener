<?php

Route::get('/','HomeController')->name('home');

Route::name('permission.')->prefix('permission')->namespace('Permission')
        ->group(function (){
            Route::get('all','ViewAllController')
                ->name('view-all')->middleware('can:view-all-permissions');

            Route::get('create','CreateController')
                    ->name('create')->middleware('can:create-permission');

            Route::post('store','SaveController')
                    ->name('store')->middleware('can:create-permission');

            Route::get('edit/{id}/{name}','EditController')
                ->name('edit')->middleware('can:edit-permission');

            Route::put('update/{id}/{name}','UpdateController')
                ->name('update')->middleware('can:edit-permission');

            Route::delete('delete/{id}/{name}','DeleteController')
                ->name('delete')->middleware('can:delete-permission');
        });

Route::name('role.')->prefix('role')->namespace('Role')
        ->group(function (){
            Route::get('view-all','ViewAllController')
                    ->name('view-all')->middleware('can:view-all-roles');

            Route::get('create','CreateController')
                    ->name('create')->middleware('can:create-role');

            Route::post('save','SaveController')
                    ->name('save')->middleware('can:create-role');

            Route::get('edit/{id}/{name}','EditController')
                    ->name('edit')->middleware('can:edit-role');

            Route::put('update/{id}/{name}','UpdateController')
                    ->name('update')->middleware('can:edit-role');

            Route::delete('delete/{id}/{name}','DeleteController')
                    ->name('delete')->middleware('can:delete-role');
        });

Route::name('user.')->prefix('user')->namespace('User')
        ->group(function (){
            Route::get('view-all','ViewAllController')
                    ->name('view-all')->middleware('can:view-all-users');
            Route::get('create','CreateController')
                    ->name('create')->middleware('can:create-user');

            Route::post('save','SaveController')
                    ->name('save')
                    ->middleware([
                        'can:create-user' ,
                        'couldHaveFillFields:
                                             password|roles|email_verified,
                                             set-password-for-user|attach-role-to-user|verify-user-email'
                    ]);

            Route::get('edit/{id}/{name}','EditController')
                    ->name('edit')->middleware('can:edit-user');

            Route::put('update/{id}/{name}','UpdateController')
                    ->name('update')
                    ->middleware([
                        'can:edit-user' ,
                        'couldHaveFillFields:password|roles|email_verified,
                                             set-password-for-user|attach-role-to-user|verify-user-email'
                    ]);
            Route::delete('delete/{id}/{name}','DeleteController')
                    ->name('delete')->middleware('can:delete-user');
        });

Route::name('link.')->prefix('link')->namespace('Link')
        ->group(function (){
            Route::get('view-all','ViewAllController')->name('view-all');
            Route::get('create','CreateController')->name('create');
            Route::post('save','SaveController')->name('save');
        });

Route::name('admin_link.')->prefix('admin-link')->namespace('AdminLink')
        ->group(function (){
            Route::get('view-all','ViewAllController')->name('view-all')
                    ->middleware('can:view-all-links');
        });
