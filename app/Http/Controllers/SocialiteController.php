<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    function googleCallback()  {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id',$user->id)->first();
            
            if ($findUser) {
                Auth::login($findUser);
                return redirect('/');
            } else {
                $newUser = User::create([
                    'id' => fake()->unique()->uuid(),
                    'name' => $user->name,
                    'username' => str_replace(' ', '', $user->name),
                    'email' => $user->email,
                    'password' => null,
                    'google_id' => $user->id,
                    'social_type' => 'google'
                ]); 
                
                Profile::create([
                    'id' => fake()->unique()->uuid(),
                    'user_id' => $newUser->id,
                    'image' => $user->getAvatar()
                ]);

                Auth::login($newUser);
                return redirect('/');
            }    
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
