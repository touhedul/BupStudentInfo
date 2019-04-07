<?php
/**
 * Created by PhpStorm.
 * User: touhe
 * Date: 22-Dec-18
 * Time: 6:57 PM
 */

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class UserHelper
{

    public static function middleware($class){
        $class->middleware('auth');

    }

}