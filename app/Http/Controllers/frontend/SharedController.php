<?php


namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Share;

class SharedController extends Controller
{
    public function index(){


        $sharedItems = Share::select('users.name','posts.content')
         ->join('users','users.id','=','shares.user_id')
         ->join('posts','posts.id','=','shares.content_id')
         ->where('shares.share_id',Auth::id())->get();

        //  dd($sharedItems);
        return view('frontend.shared',compact('sharedItems'));
    }
    public function shareStore(request $request){

        $emailCheck = $request->input('email');

        $post_id = $request->input('post_id');

        $shared_id = User::where('email', $emailCheck)->first()->id;

       if($shared_id != Auth::id()){
         $request->validate([
            'email'=>'required'
          ]);
            $share = new Share;
            $share->content_id = $post_id;
            $share->user_id = Auth::id();
            $share->share_id = $shared_id;
            $share->save();


        return response()->json(['status'=>'Your Journal Shared to '.$emailCheck]);
        }
        else{
        return response()->json(['status'=>'This Jorunal Cannot share yourself']);
        }
    }
}
