<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
      public function userUpdate(request $request){

        $firstname = $request->input('fname');

        $phone = $request->input('phone');

        $bio = $request->input('bio');



          if(User::where('id',Auth::id())->exists()){
             $users = User::where('id',Auth::id())->first();

             $users->name = $firstname;

             $users->phone = $phone;

             $users->bio = $bio;

             $users->update();

             return redirect()->back();

         }
      }
}
