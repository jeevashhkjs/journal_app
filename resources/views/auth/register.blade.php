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
            <div class="pt-6 pb-2.5 bg-emerald-100 lg:bg-white flex justify-center lg:justify-start lg:px-10">
                <div class="cursor-pointer flex items-center">
                    <div>
                        <svg class="w-10 text-emerald-600" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px"
                            y="0px" viewBox="0 0 225 225" style="enable-background:new 0 0 225 225;"
                            xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    fill: none;
                                    stroke: currentColor;
                                    stroke-width: 20;
                                    stroke-linecap: round;
                                    stroke-miterlimit: 3;
                                }
                            </style>
                            <g transform="matrix( 1, 0, 0, 1, 0,0) ">
                                <g>
                                    <path id="Layer0_0_1_STROKES" class="st0"
                                        d="M173.8,151.5l13.6-13.6 M35.4,89.9l29.1-29 M89.4,34.9v1 M137.4,187.9l-0.6-0.4     M36.6,138.7l0.2-0.2 M56.1,169.1l27.7-27.6 M63.8,111.5l74.3-74.4 M87.1,188.1L187.6,87.6 M110.8,114.5l57.8-57.8" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="text-2xl text-emerald-800 tracking-wide ml-2 font-semibold">Penit</div>
                </div>
            </div>
            <div class=" px-10 sm:px-24 md:px-48 lg:px-10  xl:px-24 xl:max-w-2xl">
                <h2 class="text-center text-2xl text-emerald-950 font-display font-medium lg:text-center xl:text-4xl">
                    Sign In</h2>
                <div class="mt-6">
                    <form action="/store" method="POST">
                        @csrf
                        <div>
                            <div class=" text-sm font-bold text-gray-700 tracking-wide">
                                User Name

                            </div>
                            <input
                                class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-emerald-500"
                                type="text" placeholder="Journal" name="username">
                            @if ($errors->has('username'))
                                <li class="danger">{{ $errors->first('username') }}</li>
                            @endif
                        </div>
                        <div class=" text-sm font-bold text-gray-700 tracking-wide mt-3">
                            Email

                        </div>
                        <input
                            class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-emerald-500"
                            type="email" placeholder="Journal@gmail.com" name="email">
                        @if ($errors->has('email'))
                            <li class="danger">{{ $errors->first('email') }}</li>
                        @endif

                        <div>
                            <div class="text-sm font-bold text-gray-700 tracking-wide mt-3">Password </div>
                            <input
                                class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-emerald-500"
                                type="password" placeholder="Journal@gmail.com" name="password">
                            @if ($errors->has('password'))
                                <li class="danger">{{ $errors->first('password') }}</li>
                            @endif
                        </div>

                        <div>
                            <div class="text-sm font-bold text-gray-700 tracking-wide mt-3">Confirm Password</div>
                            <input
                                class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-emerald-500"
                                type="password" placeholder="Journal@gmail.com" name="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                                <li class="danger">{{ $errors->first('password_confirmation') }}</li>
                            @endif
                        </div>
                        <div class="mt-4">
                            <button type="submit"
                                class="bg-emerald-600 h-12 text-white p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-emerald-800
                                shadow-lg">
                                Sign up
                            </button>
                        </div>
                    </form>
                    <div class="mt-4  text-sm font-display font-semibold text-gray-700 text-center">
                        Already have an account ? <a href="/login"
                            class="cursor-pointer text-emerald-800 no-underline hover:underline hover:text-emerald-600">Log
                            in</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full h-auto bg-white hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
            style="background-image: url('{{asset('images/welcome/Poetry-pana.png')}}')">
        </div>
    </div>
</body>

</html>


























{{--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="{{asset('frontend/css/register.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        li{
            list-style: none;
        }
        .danger{
            color: red;
        }
    </style>
</head>

<body>

    <div class="main_container">
        <div class="logo_container">
            <img src="../images/Logo.svg" alt="" srcset="">
        </div>
        <div class="container">
            <div class="toast">
                <div class="toast-content">
                    <i class="fa-solid fa-xmark check"></i>
                    <div class="message">
                        <span class="text text-2"></span>
                    </div>
                </div>
                <i class="fa-solid fa-xmark close"></i>
                <div class="progress"></div>
            </div>
            <div class="gif">
                <img src="{{asset('images/welcome/welcome.svg')}}" class="gif_welcome" alt="" srcset="">
                <div class="sign-btn">
                <form action="/registrationLogic" method="post">
                </form>
                </div>
            </div>
            <div class="form_container">
                @if (Session::has('message'))
                <div class="alert alert-success" style="color: green" role="alert">
                   {{ Session::get('message') }}
               </div>
               @endif
               @if (Session::has('error'))
               <div class="alert alert-danger" style="color: red" role="alert">
                  {{ Session::get('error') }}
              </div>
               @endif
               <H2 class="welcome_notice">Welcome to DCKAP Palli's Journal <span>👋</span></H2>
                <form action="/store" method="POST">
                    @csrf
                    <div class="form_div">
                        <div class="name_div">
                            <label for="your-name">Your name:</label><span class="color">*</span><br>
                            <input class="yourname" id="your-name"type="text" name="username" placeholder="Enter your Name">
                            @if ($errors->has('username'))
                            <li class="danger">{{$errors->first('username')}}</li>
                            @endif
                        </div>
                       <div>
                        <label for="emailId">Email:</label><span class="color">*</span><br>
                        <input class="email" id="emailId" name="email" type="email" placeholder="Example@gmail.com"><br><br>
                        @if ($errors->has('email'))
                        <li class="danger">{{$errors->first('email')}}</li>
                        @endif
                       </div>

                       <div>
                        <label for="password">Password:</label><span class="color">*</span><br>
                        <input class="password" id="password" name="password" type="password" placeholder="Password">
                        <span class="passicon"><i id="passwordicon" class="fa-solid fa-eye-slash"></i></span>
                        @if ($errors->has('password'))
                        <li class="danger">{{$errors->first('password')}}</li>
                        @endif
                        <br><br>
                       </div>

                       <div>
                        <label for="conform-password">Confirm Password:</label><span class="color">*</span><br>
                        <p class="Password_alert"></p>
                        <input class="confirmpassword" name="password_confirmation" id="conform-password" type="password" placeholder="Confirm password">
                        <span class="passicon"><i id="passwordicon" class="fa-solid fa-eye-slash"></i></span>
                        @if ($errors->has('password_confirmation'))
                        <li class="danger">{{$errors->first('password_confirmation')}}</li>
                        @endif
                        <br><br>
                       </div>

                        <button class="signbtn" type="submit">Sign Up </button>
                        <p class="add-login">Already have an Account?<a class="add-login-a" href="/login">Login Here</a></p>
                </form>
            </div>
        </div>
    </div>
    <script type="module" src="../js/signup.js"></script>
</body>

</html> --}}
