<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
class StarredController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
        $contents = Post::where('user_id',Auth::id())->whereNull('deleted_at')->where('starred',1)->get();
        return view('frontend.starred',compact('contents'));
        }
    }

}
