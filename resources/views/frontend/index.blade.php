@extends('auth.layouts.front')

@section('title')
    Welcome to our Journals!
@endsection

@section('content')
    {{-- header actions --}}
            <main class="mt-16 ml-52">
            <div class="container text-center mx-auto p-4 justify-end">
              <div class="flex justify-end rounded-lg text-lg" role="group">
                <button
                  class="bg-white text-grey-500 hover:bg-emerald-800 hover:text-white border border-r-0 rounded-l-lg px-4 py-2 mx-0 outline-none focus:shadow-outline"><i class="fa-solid fa-calendar-days"></i></button>
                <button
                  class="bg-white text-grey-500 hover:bg-emerald-800 hover:text-white border  px-4 py-2 mx-0 outline-none focus:shadow-outline"><i class="fa-solid fa-bars"></i></button>
                <button
                  class="bg-white text-grey-500 hover:bg-emerald-800 hover:text-white border border-l-0 rounded-r-lg px-4 py-2 mx-0 outline-none focus:shadow-outline"><i class="fa-solid fa-table-cells"></i></button>
              </div>
            </div>
      </main>

    <div class="flex flex-row ml-60">

        <div class="carts flex flex-row w-full items-center gap-5">
            @if ($contents->count() > 0)
                <div class="w-80 bg-white h-56 w-80 rounded-md flex flex-col items-center justify-evenly">
                    <a href="/writing"><img src="{{ asset('images/welcome/Group.svg') }}" class="h-28" /></a>
                    <h3>Add New Journal</h3>
                </div>
                @foreach ($contents as $content)
                    <div class="w-80 bg-white border border-gray-200 rounded-lg product"   value="{{$content->id}}">
                        {{-- <a href="/showContent"> --}}
                            <h5 class="text-center mt-2 mb-2 text-2xl font-medium tracking-tight text-gray-900">
                                {{ $content->title }}</h5>
                        </a>
                        <p class="h-24 show-view overflow-hidden m-auto text-justify w-64 mb-3 font-normal text-gray-700 dark:text-gray-400 content" id="{{$content->id}}">
                            {!! Illuminate\Support\str::limit($content->content, 200) !!}</p>
                        <input type="hidden" class="post_id" value="{{ $content->id }}">
                        <div class="p-5 flex justify-between relative">
                            <div class="date">
                                <a href="#"
                                    class="text-xs inline-flex items-cente,r px-3 py-2 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                   {{\Carbon\Carbon::parse($content->from_date)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($content->end_date)->format('d/m/Y')}}
                        
                                </a>
                            </div>
                            <div class="action-btns items-center">
                                @if ($content->starred)
                                    <button title="UnStar"><i class="fa-solid fa-star starred-item star"></i></button>
                                @else
                                    <button title="Star"><i class="fa-regular fa-star starred-item unstar"></i></button>
                                @endif
                                <button title="Share" class="block text-black share shareBtn" type="button"
                                    data-modal-toggle="default-modal">
                                    <i class="fa-solid fa-share share"></i>
                                </button>
                                <button title="More" class="moreBtn notTarget" id="{{ $content->id }}"><i
                                        class="notTarget fa-solid fa-ellipsis-vertical"></i></button>
                            </div>
                            <div class="action-more-btns absolute top-20 right-4 bg-white w-24 flex flex-col rounded-md invisible"
                                id="{{ $content->id }}">
                                <button class="hiddenBtn hover:bg-emerald-800 hover:text-white notTarget edit rounded-t mb-1 flex pl-1.5 gap-x-2 items-center">
                                    <i class="fa-solid fa-pen notTarget edit-post-item"></i>
                                    <a href="{{ 'editContent/'.$content->id }}">Edit</a>
                                </button>
                                <button class="hiddenBtn notTarget hover:bg-emerald-800 hover:text-white delete rounded-b flex pl-1.5 gap-x-2 items-center delete-post-item">
                                    <i class="fa-solid notTarget fa-trash-can delete-post-item"></i>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="share-tab invisible">
                        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                            <div class="fixed inset-0 z-10 overflow-y-auto">
                                <div
                                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                    <div
                                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                        <div class="containers px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                            <div class="header pb-5">
                                                <p class="greeting">Share Your Journal</p>
                                            </div>
                                            <div class="search-mail mt-4">
                                                <p>Enter the shared Email</p>
                                                <p class="emailExists text-green-500"></p>
                                                <p class="emailnotExists text-rose-500"></p>
                                                <div class="relative w-full flex">
                                                    <input type="text" class="search-mail w-full rounded-s-lg sendEmail"
                                                        placeholder="Add People" name="sendEmail" />
                                                    <button
                                                        class="search-btn rounded-e-lg pt-2 pb-2 pl-6 pr-6">Search</button>
                                                </div>
                                            </div>
                                            <div
                                                class="users mt-5 flex justify-between h-48 overflow-x-auto overflow-y-auto">
                                                <div class="user flex gap-3 mb-4">
                                                    <div class="img">
                                                        <img class="w-10 h-10 rounded-full"
                                                            src="https://igimages.gumlet.io/tamil/gallery/actress/trisha/trisha30122022_006.jpg?w=600&dpr=1.0"
                                                            alt="Rounded avatar">
                                                    </div>
                                                    <div class="user-details">
                                                        <p class="user-name">Jeeva S</p>
                                                        <p class="user-email">jeevasdckap@gmail.com</p>
                                                    </div>
                                                </div>
                                                <div class="select-auth">
                                                    <select id="small"
                                                        class="selectAuth block w-20 p-2 mb-6 bg-transparent border-0">
                                                        <option selected>view</option>
                                                        <option value="US">Comment</option>
                                                        <option value="CA">view</option>
                                                        <option value="FR">Remove</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="footer mt-3">
                                                <div class="footer-head flex items-baseline justify-between">
                                                    <div class="info">
                                                        <p>Anyone with link can edit</p>
                                                    </div>
                                                    <select id="small"
                                                        class="selectAuth block w-20 p-2 mb-6 bg-transparent border-0">
                                                        <option selected>view</option>
                                                        <option value="US">Comment</option>
                                                        <option value="CA">view</option>
                                                        <option value="FR">Remove</option>
                                                    </select>
                                                </div>
                                                <div class="footer-foot flex justify-between items-center">
                                                    <p class="copyLink flex gap-3"><span><i
                                                                class="fa-solid fa-link"></i></span>Copy Link</p>
                                                    <div class="action-btns flex gap-5">
                                                        <button class="close-btn shareBtn">Cancel</button>
                                                        <button
                                                            class="close-btn btn-color pt-2 pb-2 pl-4 pr-4 rounded-md sendBtn shareBtn">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

        </div>
    </div>
    {{-- view content tab --}}

    <div class="blackScreen de-active"></div>
    <div class="w-full">
        <div class="view-user-contents de-active w-4/5 absolute pr-4 pl-4 pt-4 pb-4 rounded-lg m-auto">

            <div class="view-content-header flex items-center gap-3/6 justify-end">
                <div class="load"></div>

                <h1 class="content-title font-bold text-2xl title"></h1>
                <span class="show-view pt-1 pb-0 pl-2 pr-2 rounded-md close-btn"><i class="fa-solid fa-xmark"></i></span>
            </div>
            <p class="text-justify mt-5 overflow-scroll max-h-72 overflow-x-auto   overflow-y-auto fullContent">
            </p>

        </div>
    </div>


</div>
        @else
        <div class=" mt-28 m-auto">
            <a href="/writing"><img src="{{ asset('images/welcome/first.svg') }}" alt="" srcset=""></a>
            <p class="mt-7">Write Your first Jorunal here</p>
        </div>
        @endif
@endsection
