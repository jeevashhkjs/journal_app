<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class LoginController extends Controller
{
    public function loginView(){
        return view('auth.login');
    }

    public function authenticates(request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $user = User::where('email',$email)->first();

            Auth::login($user);

            if(Auth::user() && $user->email_verified_at != Null){

                return redirect('/')->with('status','Welcome to the Journals');
             }
            else{
                return redirect('/login')->with('error','Please Verify Your Mail');
            }
        }

        else{
            return back()->withErrors(['Invaild credentials details']);
        }
    }

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        try {
            //create a user using socialite driver google
            $user = Socialite::driver('google')->user();

            $profile = $user->getAvatar();
            // if the user exits, use that user and login
            $finduser = User::where('google_id', $user->id)->first();


            if($finduser){
                //if the user exists, login and show dashboard
                Auth::login($finduser);
                return redirect('/');
            }else{
                //user is not yet created, so create first
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'avatar'=> $profile,
                    'email_verified_at'=> Carbon::now(),
                    'password' => encrypt('')
                ]);
                //every user needs a team for dashboard/jetstream to work.
                //create a personal team for the user
                $newUser->save();
                // dd($newUser);
                //login as the new user
                Auth::login($newUser);
                // go to the dashboard
                return redirect('/');
            }
            //catch exceptions
        } catch (Exception $e) {
            dd($e->getMessage());
        }

    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
