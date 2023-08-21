<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Contact Form Template</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        li {
            list-style: none;
        }

        .danger {
            color: red;
        }
    </style>
</head>

<body class>
    <div class="lg:flex">
        <div class="lg:w-1/2 xl:max-w-screen-sm">
            <div class="py-6 bg-emerald-600 lg:bg-white flex justify-center lg:justify-start lg:px-10">
                <div>
                    <img class="w-24 text-emerald-600" src="{{ asset('images/welcome/2-removebg-preview (1) 1.png') }}"
                        alt="">
                </div>
            </div>
            <div class="mt-4 px-10 sm:px-24 md:px-48 lg:px-10 lg:mt-4 xl:px-24 xl:max-w-2xl">
                <h2
                    class="text-center text-4xl text-emerald-950 font-display font-medium lg:text-center xl:text-4xl
                    xl:text-bold">
                    Log in</h2>
                <div class="mt-12">
                    <form action="/authenticate" method="POST">
                        @csrf
                        <div>
                            <div class="text-sm font-bold text-gray-700 tracking-wide">Email Address</div>
                            <input
                                class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-emerald-600"
                                type="email" placeholder="mike@gmail.com" name="email">
                            @if ($errors->has('email'))
                                <li class="danger">{{ $errors->first('email') }}</li>
                            @endif
                        </div>
                        <div class="mt-8">
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">
                                    Password
                                </div>
                                <div>
                                    <a href="{{ route('forgot.password.get') }}"
                                        class="text-xs font-display font-semibold text-emerald-600 hover:text-emerald-800
                                        cursor-pointer">
                                        Forgot Password?
                                    </a>
                                </div>
                            </div>
                            <input
                                class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-emerald-600"
                                type="password" placeholder="Enter your password" name="password">
                            @if ($errors->has('password'))
                                <li class="danger">{{ $errors->first('password') }}</li>
                            @endif

                        </div>
                        <div class="mt-10">
                            <button type="submit"
                                class="bg-emerald-600 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-emerald-800
                                shadow-lg">
                                Log In
                            </button>
                        </div>
                    </form>
                    <div class="mt-12 text-sm font-display font-semibold text-gray-700 text-center">
                        Don't have an account ? <a href="/register"
                            class="cursor-pointer hover:underline text-emerald-800 hover:text-emerald-600">Sign
                            up</a>
                    </div>
                    <div class="flex py-2">
                {{-- <a href="{{ url('auth/google') }}">
                <button type="button" data-te-ripple-init data-te-ripple-color="light"
                            class="m-auto justify-center bg-blue-700  inline-block rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M7 11v2.4h3.97c-.16 1.029-1.2 3.02-3.97 3.02-2.39 0-4.34-1.979-4.34-4.42 0-2.44 1.95-4.42 4.34-4.42 1.36 0 2.27.58 2.79 1.08l1.9-1.83c-1.22-1.14-2.8-1.83-4.69-1.83-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.721-2.84 6.721-6.84 0-.46-.051-.81-.111-1.16h-6.61zm0 0 17 2h-3v3h-2v-3h-3v-2h3v-3h2v3h3v2z"
                                    fill-rule="evenodd" clip-rule="evenodd" />
                            </svg>
                        </button></a> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full h-auto bg-white hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
            style="background-image: url('{{ asset('images/welcome/Poetry-pana.png') }}')">
        </div>


    </div>

    </div>
</body>

</html>



{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('frontend/css/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <style>
        li{
            list-style: none;
        }
        .danger{
            color: red;
        }
        .form_container{
            position: relative;
        }
        .forgot{
            position: absolute;
            top: 113px;
            right: 13px;
            text-decoration: none;
            width: 129px;
            color: #111827

        }
    </style>
</head>

<body>
    <!-- <div class="user_alert"></div> -->

    <div class="main_container">
        <div class="logo_container">
            <img src="../images/Logo.svg" alt="" srcset="">
        </div>
        <!-- //toast notification container -->
        <div class="container2">
            <div class="toast">
                <div class="toast-content">
                    <i class="fas fa-solid fa-check check"></i>
                    <div class="message">
                        <span class="text-2"></span>
                    </div>
                </div>
                <i class="fa-solid fa-xmark close"></i>
                <div class="progress"></div>
            </div>

        <div class="container">
            <div class="gif">
                <img src="{{asset('images/welcome/welcome.png')}}" class="gif_welcome" alt="" srcset="" width="500px">

                <a href="{{ url('auth/google') }}"><img src="{{asset('images/welcome/googl.png')}}"  width="200px" class="google" height="45px"></a>
            </div>
            <div class="form_container">
                @if ($errors->any())
                <ul>
                 {!! implode('',$errors->all('<li class="danger">:message</li>'))!!}
                </ul>
                @endif
               <H2 class="welcome_notice">Welcome to DCKAP Palli's Journal <span> &#128075;</span></H2>
               @if (Session::has('error'))
               <div class="alert alert-danger" style="color: red" role="alert">
                  {{ Session::get('error') }}
              </div>
               @endif
                <form action="/authenticate" method="POST">
                    @csrf
                    <div class="form_div">
                        <div class="email_div">
                            <label for="emailId">Email:</label><span class="color">*</span><br>
                            <input class="email" id="emailId" type="email" placeholder="Example@gmail.com"  name="email">
                            @if ($errors->has('email'))
                            <li class="danger">{{$errors->first('email')}}</li>
                            @endif
                        </div>

                       <div class="password_div">
                            <label for="password">Password:</label><span class="color">*</span><br>
                            <input class="password" id="password" type="password" placeholder="Password" name="password">
                            <span class="passicon"><i id="passwordicon" class="fa-solid fa-eye-slash"></i></span>
                            @if ($errors->has('password'))
                            <li class="danger">{{$errors->first('password')}}</li>
                            @endif
                       </div>
                    <button class="loginbtn" type="submit">Login</button>
                </form>
                <div class="forgot">
                    <a href="{{ route('forgot.password.get') }}" class="forgot">Forgot password?</a>
                </div>
                <p class="add-signup">New to Journal's?<a class="add-signup-a" href="/register">signup</a></p>
            </div>
        </div>
    </div>
    <script src="../js/Login.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('status'))
    <script>
        swal("{{ session('status') }}");
    </script>
    @endif
</body>
</html> --}}
