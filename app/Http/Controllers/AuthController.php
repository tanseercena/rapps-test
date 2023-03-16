<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\SkeletonApi;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view("auth.login");
    }

    public function processLogin(Request $request) {
        // Validate form request
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Check if email already exists and token is not expired in db
        $user = User::where("email", $request->email)
//                    ->where("token_expire_at", ">=", now())
                    ->first();

        if($user) {
            // TODO: Check if token expires, then generate new token

        }else{
            // Get Token from Skeleton Api
            $token_resp = SkeletonApi::getToken($request->email, $request->password);
            $token = $token_resp['token_key'];

            // Save user to db
            $user = User::create([
               'name' => $token_resp['user']['first_name'] . ' ' . $token_resp['user']['last_name'],
                'email' => $token_resp['user']['email'],
                'password' => $token,
                'refresh_token' => $token_resp['refresh_token_key'],
                'token_expire_at' => Carbon::parse($token_resp['expires_at']),
            ]);
        }



        if($user) {
            Auth::login($user);

            return redirect()->route('profile');
        }

        return back()->withErrors(['token_error' => 'Error while getting Token!']);
    }
}
