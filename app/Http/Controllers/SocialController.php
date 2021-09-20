<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                return redirect('/news');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('admin@123'),
                ]);
                $createUser->profile_photo_path = $user->getAvatar();
                $createUser->settings = [
                    'channel' => 'delfi',
                    'records_count' => 10
                ];
                $createUser->save();

                Auth::login($createUser);
                return redirect('/news');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
