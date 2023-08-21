@extends('auth.layouts.front')

@section('title')
    Welcome to our Journals!
@endsection
@section('content')
{{-- delete action buttons --}}
@if($contents->count() > 0)
<main class="mt-16">
    <div class="container text-center mx-auto p-4 justify-end">
      <div class="flex justify-end rounded-lg  gap-4 text-lg" role="group">
        <button class="del-action pt-2 pb-2 pl-4 pr-4 rounded-md restoreAll bg-emerald-600 hover:bg-emerald-800 ">Restore All</button>
        <button class="del-action pt-2 pb-2 pl-4 pr-4 rounded-md deleteAll bg-emerald-600 hover:bg-red-800 ">Empty Trash</button>
      </div>
    </div>
</main>
<div class="flex flex-row gap-5 ml-72">
    <div class="carts flex flex-row gap-5 ml-0">
                @foreach ( $contents as $content )
                <div class=" w-80 mt-2 bg-white border border-gray-200 hover:z-1 rounded-lg shadow duration-500 hover:scale-105  hover:shadow-xl product">
                    <a href="#">
                    <h5 class="text-center mt-2 mb-2 text-2xl font-bold tracking-tight text-gray-900">
                      {{$content->title}}</h5>
                    </a>
                    <p
                    class="h-24 show-view overflow-hidden	m-auto text-justify w-64 mb-3 font-normal text-gray-700 dark:text-gray-400 content"  id="{{$content->id}}">
                     {!!$content->content!!}</p>
                     <input type="hidden" class="post_id" value="{{$content->id}}">
                    <div class="p-5 flex justify-between">
                    <div class="date">
                        <a href="#"
                        class="text-xs inline-flex items-cente,r px-3 py-2 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      Deleted : {{\Carbon\Carbon::parse($content->deleted_at)->diffForHumans()}}
                        </a>
                    </div>
                    <div class="action-btns items-center">
                        <button><i class="fa-solid fa-clock-rotate-left restore"></i></button>
                        {{-- <button><i class="fa-solid fa-star starred-item" style="display: none"></i></button> --}}
                        <button><i class="fa-solid fa-trash delete-post-item-permanent"></i></button>
                    </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="w-full ml-60 m-auto">
                    <img src="{{asset('images/welcome/delete.svg')}}" alt="" srcset="">
                    <p class="mt-7">No Deleted Items here..</p>
                </div>
                @endif
           </div>
        </div>


        <div class="blackScreen de-active"></div>
        <div class="w-full">
            <div class="view-user-contents de-active w-4/5 absolute pr-4 pl-4 pt-4 pb-4 rounded-lg m-auto">
                <div class="view-content-header flex items-center gap-3/6 justify-end">
                    <h1 class="content-title font-bold text-2xl title">My Journal</h1>
                    <span class="show-view pt-0.5 pb-0.5 pl-2 pr-2 rounded-md close-btn"><i class="fa-solid fa-xmark"></i></span>
                </div>
                <p class="text-justify mt-5 overflow-scroll max-h-72 overflow-x-auto    overflow-y-auto fullContent">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic voluptatum, repellat dolorem totam tempora expedita odit nulla maxime numquam consequuntur molestias suscipit quaerat iusto, minima eum nesciunt ab, alias dignissimos veritatis. Distinctio tempora assumenda quam reiciendis non quasi! Nisi blanditiis adipisci ipsum ex, molestiae pariatur, minus animi vel consequuntur illo similique, rem accusantium magni unde omnis delectus quis fuga. Adipisci, nisi, minus nostrum atque minima earum ab illo saepe dolorum obcaecati dolore enim maiores. Saepe consequuntur earum inventore, maiores esse alias quasi perspiciatis culpa, vitae doloremque, odio et. Enim accusantium non sapiente ad quis aliquid sit numquam nobis cum rerum
                </p>
            </div>
        </div>

@endsection



