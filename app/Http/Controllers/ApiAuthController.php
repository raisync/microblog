<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiAuthController extends Controller
{
    public function authenticate() {
    	$credentials = request()->only('username', 'password');

    	try {
    		$token = JWTAuth::attempt($credentials);

    		if(!$token) {
    			return response()->json(false);
    		}
    	} catch(JWTException $e) {
    		return response()->json(false);
    	}

    	return response()->json(['token' => $token], 200);
    }

    public function register() {
    	$firstname = request()->firstname;
    	$lastname = request()->lastname;
    	$email = request()->email;
    	$username = request()->username;
    	$password = request()->password;

    	$user = User::create([
        	'firstname' => $firstname, 
    		'lastname' => $lastname,
    		'email' => $email,
    		'username' => $username,
    		'password' => bcrypt($password)
    		]);
    	$token = JWTAuth::fromUser($user);

    	return response()->json(['token' => $token], 200);
    }
}
