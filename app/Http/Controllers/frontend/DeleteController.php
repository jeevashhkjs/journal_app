<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
class DeleteController extends Controller
{
    public function index(){
        if(Auth::check()){
        $contents = Post::where('user_id',Auth::id())->whereNotNull('deleted_at')->get();
        return view('frontend.delete',compact('contents'));
        }
    }

    public function restore(request $request){

        if(Auth::check()){

            $post_id = $request->input('post_id');

         if(Post::where('id',$post_id)->where('user_id',Auth::id())->exists()){

        $post = Post::where('id',$post_id)->where('user_id',Auth::id())->first();

        $post->deleted_at = Null;

        $post->update();

        return response()->json(['status'=>'Restored Sucessfully']);
     }
        }
    }

    public function permanentDeleted(request $request){

        if(Auth::check()){
            $post_id = $request->input('post_id');

            if(Post::where('id',$post_id)->where('user_id',Auth::id())->exists()){

           $post = Post::where('id',$post_id)->where('user_id',Auth::id())->first();

           $post->delete();

           return response()->json(['status'=>'Permanently Deleted']);
        }
    }
}
    public function deleteAll(){
        if(Auth::check())
        {
            $post = Post::where('user_id',Auth::id())->whereNotNull('deleted_at')->get();

            foreach($post as $posts){


                $posts->delete();
             }


            return response()->json(['status'=>'Permanently Deleted All Sucessfully']);
        }
    }
}
