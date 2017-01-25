<?php
namespace app\CustomServiceProviders;


use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;


class NewUsersProvider extends ServiceProvider
{

    public function register()
    {
        /*
         * Bind this service to the app
         * so that any wild card request
         * for the resource will be resolved.
         * by goks
         */
        App::bind('newuser', function($app)
        {
            return new app\helper\NewUser;
        });

    }
}
