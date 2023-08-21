<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class FrontendController extends Controller
{
   public function index(){
    if(Auth::check()){
    $contents = Post::where('user_id',Auth::id())->whereNull('deleted_at')->get();
    return view('frontend.index',compact('contents'));
    }
   }

   public function delete(request $request)
   {

    if(Auth::check()){

     $post_id = $request->input('post_id');

     if(Post::where('id',$post_id)->where('user_id',Auth::id())->exists()){

        $post = Post::where('id',$post_id)->where('user_id',Auth::id())->first();

        $post->deleted_at = Carbon::now();

        $post->update();

        return response()->json(['status'=>'Deleted Sucessfully']);
     }
    }

    else{
        return response()->json(['status'=>'Login to continue']);
    }
    }

    public function starred(request $request){

    if(Auth::check()){

        $post_id = $request->input('post_id');

        if(Post::where('id',$post_id)->where('user_id',Auth::id())->exists())
        {

           $post = Post::where('id',$post_id)->where('user_id',Auth::id())->first();

           $post->starred = $request->input('isStarorNot');

           $post->update();

        if($request->input('isStarorNot')){
           return response()->json(['status'=>'Starred Sucessfully']);
        }
        else{
           return response()->json(['status'=>'Unstarred Sucessfully']);
        }
    }
}

}

  public function getGmail(request $request){
    $email = $request->input('gmail');

    if(Auth::check()){

       if(User::where('email',$email)->exists()){



        return response()-> json(['status'=>'Email Exists']);;

       }
       else{
        return response()->json(['Not'=>'Email not Exists']);

       }
    }

  }
   public function journalListUsingAjax(){
    $journals =Post::select('title')->whereNull('deleted_at')->get();

    $allDatas = [];

     foreach($journals as $journal){
        $allDatas[] = $journal['title'];
     }
     return $allDatas;
   }

   public function searchJournal(request $request){

    $search_journal = $request->input('journal_name');

    if($search_journal !=""){

       $contents = Post::where('title',"LIKE","%$search_journal%")->get();

       if($contents){
        //  dd($contents);
        return view('frontend.index',compact('contents'));
       }

       else{
           return redirect()->back()->with('status','No requestProducts Found !');
       }
    }

    // else{
    //    return redirect()->back();
    // }
}

  public function restoreAll(request $request){

      $value = $request->input('null');
    if(Auth::check())
    {
        // $post = Post::where('user_id',Auth::id())->whereNotNull('deleted_at')->all();

        $post = Post::where('user_id',Auth::id())->whereNotNull('deleted_at')->get();

         foreach($post as $posts){

            $posts->deleted_at = $value;

            $posts->update();
         }

        return response()->json(['status'=>'Restored All Sucessfully']);
    }

  }

  public function showContent(request $request){
     $post_id = $request->input('post_id');
    if(Auth::check()){

        $contents = Post::where('id',$post_id)->where('user_id',Auth::id())->first();

        return response()->json($contents);
        }

  }


}



