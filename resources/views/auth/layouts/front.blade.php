<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
 <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
 <script src="https://cdn.tailwindcss.com"></script>
 <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css" rel="stylesheet" />
 <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<script src="https://kit.fontawesome.com/122ac14709.js"crossorigin="anonymous"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

<link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">
<link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.core.css">
<script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
      @include('auth.layouts.inc.sidebar')
    <div class="main">
       @include('auth.layouts.inc.frontnav')
        {{-- <main class="mt-16"> --}}
            {{-- <div class="container text-center mx-auto p-4 justify-end">
              <div class="flex justify-end rounded-lg text-lg" role="group">
                <button
                  class="bg-white text-grey-500 hover:bg-red-700 hover:text-white border border-r-0 border-blue-500 rounded-l-lg px-4 py-2 mx-0 outline-none focus:shadow-outline"><i class="fa-solid fa-calendar-days"></i></button>
                <button
                  class="bg-white text-grey-500 hover:bg-red-700 hover:text-white border border-blue-500  px-4 py-2 mx-0 outline-none focus:shadow-outline"><i class="fa-solid fa-bars"></i></button>
                <button
                  class="bg-white text-grey-500 hover:bg-red-700 hover:text-white border border-l-0 border-blue-500 rounded-r-lg px-4 py-2 mx-0 outline-none focus:shadow-outline"><i class="fa-solid fa-table-cells"></i></button>
              </div>
            </div> --}}
      {{-- </main> --}}
      @yield('content')
    </div>
    <script src="{{ asset('frontend/js/jquery-3.7.0.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
          var availableTags = [];

          $.ajax({
            method: 'GET',
            url: '/journal-list',
            success: function (response) {
                startAutoComplete(response)
            }
        })
         function startAutoComplete(availableTags){
          $( "#tags" ).autocomplete({
            source: availableTags
          })
        };
    </script>


    <script src="{{ asset('frontend/js/custom.js') }}" defer></script>
    <script src="{{ asset('frontend/js/tailwind.config.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    @if (session('status'))
        <script>
            // swal("{{ session('status') }}");
            let timerInterval
                Swal.fire({
                title: 'Welcome to the DCKAP Journals',
                html: 'I will close in <b></b> milliseconds.',
                timer: 1500,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
                })
        </script>
    @endif


</body>

</html>
