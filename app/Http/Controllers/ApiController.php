<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Config;
use JWTAuth;
use JWTAuthException;
use App\User;
use App\Admin;

class ApiController extends Controller
{

    public function __construct()
    {
        $this->user = new User;
        $this->admin = new Admin;
    }
    
    public function userLogin(Request $request){
        Config::set('jwt.user', 'App\User'); 
        Config::set('auth.providers.users.model', \App\User::class);
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'invalid_email_or_password',
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'failed_to_create_token',
            ]);
        }
        return response()->json([
            'response' => 'success',
            'result' => [
                'token' => $token,
                'message' => 'I am front user',
            ],
        ]);
    }

    public function adminLogin(Request $request){
        Config::set('jwt.user', 'App\Admin'); 
        Config::set('auth.providers.users.model', \App\Admin::class);
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'invalid_email_or_password',
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'failed_to_create_token',
            ]);
        }
        return response()->json([
            'response' => 'success',
            'result' => [
                'token' => $token,
                'message' => 'I am Admin user',
            ],
        ]);
    }
}