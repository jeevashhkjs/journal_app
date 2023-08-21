@extends('auth.layouts.front')

@section('title')
    Welcome to our Journals!
@endsection

@section('content')
<div class="ml-56 mt-20">
    <div class="writing-container mt-8">
        <div class="header flex w-11/12 justify-between items-center m-auto rounded-md">
          <div class="calender">
            <p class="text-center text-xl mb-6">Pick your date</p>
            <input type="date" class="dateTime rounded-md"/>
          </div>
          <div class="container-emojs">
          <p class="text-center text-xl mb-6">How do you feel</p>
            <div class="emojs pl-7 pr-7 pt-2 pb-2 flex gap-5 rounded-md relative">
                <div class="emojsList relative">
                    <p class="emojText absolute bottom-10" data-tarid="1">Smile</p>
                    <p class="emoj text-lg" data-tarid="1">&#128517;</p>
                </div>
                <div class="emojsList relative">
                    <p class="emojText absolute bottom-10" data-tarid="2">Love</p>
                    <p class="emoj text-lg" data-tarid="2">&#128525;</p>
                </div>
                <div class="emojsList relative">
                    <p class="emojText absolute bottom-10" data-tarid="3">Happy</p>
                    <p class="emoj text-lg" data-tarid="3">&#128578;</p>
                </div>
                <div class="emojsList relative">
                    <p class="emojText absolute bottom-10" data-tarid="4">Cry</p>
                    <p class="emoj text-lg" data-tarid="4">&#128560;</p>
                </div>
                <div class="emojsList relative">
                    <p class="emojText absolute bottom-10" data-tarid="5">Angry</p>
                    <p class="emoj text-lg" data-tarid="5">&#128545;</p>
                </div>
            </div>
          </div>
        </div>
        {{-- <form action="{{url('update/'.$content->id)}}" method="post">
            @csrf
            @method('PUT') --}}
        <div class="title text-center mt-4 mb-6">
            <input type="text" class="userTitle text-center shadow-md border-0 outline-none bg-white" id="userTitle"  value="{{$content->title}}" placeholder="Title....." name="content_title"/>
        </div>
        <div class="text-editor w-11/12 m-auto">
          <div class="userInput" id="editor">
          <script>
            var quil = new Quill('#editor');
            quil.root.innerHTML = @json($content->content);
          </script>
          </div>
          <div class="subBtn pt-5 text-end">
              <button class="update pl-7 pr-7 pt-2 bg-emerald-600 hover:bg-emerald-800  pb-2 rounded-md" value="{{$content->id}}">Update</button>
          </div>
        </div>
        {{-- </form> --}}
    </div>
    </div>
@endsection

