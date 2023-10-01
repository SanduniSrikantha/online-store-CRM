<?php

namespace App\Http\Controllers;

use App\Events\LoginEvent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    

    protected function authenticated(Request $request, $user)
    {
        // Your code here
        event(new LoginEvent($user->name, $user->email));
    }


}
