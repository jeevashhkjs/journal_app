<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class WritingController extends Controller
{
    public function index(){
        return view('frontend.writing');
       }

    public function Writingstore(request $request){

        $content = new Post;
        $content->title = $request->input('content_title');
        $content->content = $request->input('content');
        $content->user_id = Auth::id();

        $content->save();

        return response()->json(['status'=>'Your Journal Posted Successfully']);

    }


    public function editContent($id){
        $content = Post::find($id);
        return view('frontend.edit',compact('content'));
    }

    public function updateContent(request $request,$id){
        $editContent = Post::find($id);
        $editContent->title = $request->input('content_title');
        $editContent->content = $request->content;
        $editContent->update();

        return response()->json(['status'=>'Your Journal Updated Successfully']);


    }
}
