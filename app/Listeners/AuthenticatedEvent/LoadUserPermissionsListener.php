<?php

namespace App\Listeners\AuthenticatedEvent;

use Illuminate\Auth\Events\Authenticated;

class LoadUserPermissionsListener
{
    public function __construct()
    {
    }

    public function handle(Authenticated $event): void
    {
        /**
         * @TODO THIS IS LAYZY APPROACH THAT IS UNOPTIMIZE SHOULD CHECK USERPERMISSION WITH EXIST SQL AND
         *  FLY WEIGHT AND SHOULD HAVE TWO STRATEGY 1- LAYZY STRATEGY 2- SQL EXIST AND FLY WEIGHT STRATEGY
         */
        $event->user->load('permissions:permissions.name');
    }
}
