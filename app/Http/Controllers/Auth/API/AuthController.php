<?php

namespace App\Http\Controllers\Auth\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SharedTraits\ApiBaseResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;

            return ApiBaseResponseTrait::sendResponse($success, 'User signed in');
        }
        else
        {
            return ApiBaseResponseTrait::sendError(
                'Credentials are not correct!',
                [],
                401);
        }
    }

    public function logout(Request $request)
    {
        $authUser = Auth::user();
        $authUser->tokens()->delete();
        return ApiBaseResponseTrait::sendResponse([], 'User signed out');
    }
}
