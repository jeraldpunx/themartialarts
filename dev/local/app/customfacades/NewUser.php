<?php
namespace app\customfacades;

use Illuminate\Support\Facades\Facade;

class NewUser extends Facade
{
    protected $user;
    protected $token;

    /*
     *
     *  used in resolving object instantiation for constructor injection
     */
    protected static function getFacadeAccessor()
    {
        return 'newuser';
    }


}
