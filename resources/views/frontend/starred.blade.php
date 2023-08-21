@extends('auth.layouts.front')

@section('title')
    Welcome to our Journals!
@endsection

@section('content')
<div class="flex flex-row ml-64 mt-24">
    <div class="carts flex flex-row gap-5 ml-0">
            @if($contents->count() > 0)
                @foreach ( $contents as $content )
                <div class=" w-80 mt-2 bg-white border border-gray-200 product ronded-md    ">
                    <a href="#">
                    <h5 class="text-center mt-2 mb-2 text-2xl font-bold tracking-tight text-gray-900">
                      {{$content->title}}</h5>
                    </a>
                    <p
                    class="h-24 show-view overflow-hidden	m-auto text-justify w-64 mb-3 font-normal text-gray-700 dark:text-gray-400 content"  id="{{$content->id}}">
                     {!!$content->content!!}</p>
                     <input type="hidden" class="post_id" value="{{$content->id}}">
                     <div class="p-5 flex justify-between relative">
                        <div class="date">
                            <a href="#"
                                class="text-xs inline-flex items-cente,r px-3 py-2 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                               {{\Carbon\Carbon::parse($content->from_date)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($content->end_date)->format('d/m/Y')}}

                            </a>
                        </div>
                    <div class="action-btns items-center">
                        @if($content->starred)
                        <button><i class="fa-solid fa-star starred-item star"></i></button>
                        @endif
                        <button><i class="fa-solid fa-trash delete-post-item"></i></button>
                        <button><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="w-full ml-64 m-auto">
                    <img src="{{asset('images/welcome/star.png')}}" class="h-80" alt="" srcset="">
                    <p class="mt-7">No Starred Items here..</p>
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
