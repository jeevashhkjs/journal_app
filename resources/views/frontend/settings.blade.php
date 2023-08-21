@extends('auth.layouts.front')

@section('title')
    Welcome to our Journals!
@endsection

@section('content')
<div class="profile-container ml-72 mt-24 ">
    <div class="flex rounded-md">
        <div class="sidebar bg-emerald-800 rounded-l-md">
            <h3 class="pt-8 pb-8 pl-16 pr-16 text-center text-2xl">My Profile</h3>
            <div class="actionsBtns-list flex flex-col justify-start items-start gap-4 pl-10 pr-10">
                <button class="flex flex-row gap-3"><span><i class="fa-solid fa-shield-halved"></i></span>Security and Privacy</button>
                <button class="flex flex-row gap-3" type="submit" data-modal-toggle="password-model"><span><i class="fa-solid fa-key"></i></span>Password</button>                <button class="flex flex-row gap-3"><span><i class="fa-solid fa-globe"></i></span>Languages</button>
                <button class="flex flex-row gap-3"><span><i class="fa-solid fa-circle-info"></i></i></span>About</button>
                <a class="" href="/logout"><button class="flex flex-row gap-3"><span><i class="fa-solid fa-right-from-bracket"></i></span>Log out</button></a>
            </div>
        </div>
        <div class="userDiv w-8/12 pl-4 pr-4 pt-6">
            <div class="user-header flex justify-between items-center">
                <div class="user-image flex gap-6 items-center">
                    <p class="user-img profile w-20	h-20 rounded-full">
                        <a href="{{Auth::user()->avatar}}" target=”_blank” ><img src="{{Auth::user()->avatar}}" alt="" class="rounded-full"></a>
                    </p>
                    <label class="label-input-img"><input type="file" class="user-input-img"/><span class="bg-emerald-950 user-img-file"><i class="fa-solid fa-camera"></i></span></label>
                    <p>{{Auth::user()->name}}</p>
                    {{-- <p>{{Auth::user()->bio}}</p> --}}
                </div>
                <button title="Edit" class="editBtn bg-emerald-800 hover:bg-emerald-600 pt-1 pb-1 pl-2.5 pr-2.5 h-8 rounded-md" type="button" data-modal-toggle="default-modal"> Edit Profile</button>
            </div>
            <div class="user-details flex justify-around gap-24 mt-5 pt-12 pb-14 rounded-md">
                <div class="column1 flex flex-col gap-7">
                    <div class="name flex flex-col gap-4">
                        <p class="text-normal">First Name</p>
                        <h4 class="font-medium">{{Auth::user()->name}}</h4>
                    </div>
                    {{-- <div class="name flex flex-col gap-4">
                        <p class="text-normal">Last Name</p>
                        <h4 class="font-medium">C</h4>
                    </div> --}}
                    <div class="name flex flex-col gap-4">
                        <p class="text-normal">Email</p>
                        <h4 class="font-medium">{{Auth::user()->email}}</h4>
                    </div>

                    <div class="name flex flex-col gap-4">
                        <p class="text-normal">Bio</p>
                        <h4 class="font-medium">{{Auth::user()->bio}}</h4>
                    </div>
                </div>

                <div class="column2 flex flex-col gap-7">
                    <div class="name flex flex-col gap-4">
                        <p class="text-normal">Last Name</p>
                        <h4 class="font-medium">C</h4>
                    </div>
                </div>
            </div>
    </div>
</div>

<div class="up">
     <div class="max-w-2xl mx-auto ">
        <div id="default-modal" aria-hidden="true"
            class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
            <div class="relative w-3/5 h-2/3">
                <form action="/userUpdate" method="post">
                    <div class="bg-white bg-emerald-600 rounded-lg shadow relative dark:bg-gray-700 pt-5 pb-5">
                        <div class="user-columns flex justify-evenly">
                            <div class="user-column1 flex flex-col gap-4">
                                    @csrf
                                    @method('PUT')
                                <div class="name">
                                    <label class="block">First Name</label>
                                    <input type="text" class="h-11 w-60 rounded-md" placeholder="{{Auth::user()->name}}" name="fname"/>
                                </div>
                                <div class="email">
                                    <label class="block">Email</label>
                                    <input type="email" disabled class="h-11 w-60 rounded-md" placeholder="{{Auth::user()->email}}"/>
                                </div>
                            </div>
                            <div class="user-column2 flex flex-col gap-4">
                                <div class="last-name">
                                    <label class="block">Last Name</label>
                                    <input type="text" class="h-11 w-60 rounded-md" placeholder="C"/>
                                </div>
                                <div class="phone-no">
                                    <label class="block">Phone</label>
                                    <input type="number" class="h-11 w-60 rounded-md" placeholder="+918765468279" name="phone"/>
                                </div>
                            </div>
                        </div>
                        <div class="profile-footer text-center m-5">
                            <textarea class="profile-bio h-32 w-9/12 pl-4 pt-3" placeholder="Add Bio" name="bio"></textarea>
                        </div>
                        <div class="update-btn w-10/12 flex justify-end gap-5">
                            <button data-modal-toggle="default-modal" type="button" class="updateBtn bg-emerald-800 hover:bg-emerald-600 pt-2 pb-2 pl-6 pr-6 font-medium rounded-lg text-center">Cancel</button>
                            <button data-modal-toggle="default-modal" type="submit" class="updateBtn bg-emerald-800 hover:bg-emerald-600 pt-2 pb-2 pl-6 pr-6 font-medium rounded-lg text-center">Update</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="up">
    <div class="max-w-2xl mx-auto ">
       <div id="password-model" aria-hidden="true"
           class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
           <div class="relative w-1/3 h-2/3">
               <div class="bg-white bg-gray-400 rounded-lg shadow relative dark:bg-gray-700 pt-5 pb-5">
                   <div class="user-columns flex justify-evenly">
                       <div class="user-column1 flex flex-col gap-4">
                           <h2 class="text-center text-bold text-2xl">Manage Passwords</h2>
                           <div class="name">
                               <label class="block">Old Password</label>
                               <input type="text" class="h-11 w-72 rounded-md" placeholder="name"/>
                           </div>
                           <div class="email">
                               <label class="block">New Password</label>
                               <input type="email" class="h-11 w-72 rounded-md" placeholder="email"/>
                           </div>
                           <div class="last-name">
                               <label class="block">Confirm Password</label>
                               <input type="text" class="h-11 w-72 rounded-md" placeholder="last name"/>
                           </div>
                       </div>
                   </div>
                   <div class="update-btn w-10/12 flex justify-evenly mt-5 ml-9">
                       <button data-modal-toggle="password-model" type="button" class="updateBtn bg-emerald-800 hover:bg-emerald-600 pt-2 pb-2 pl-6 pr-6 font-medium rounded-lg text-center">Cancel</button>
                       <button data-modal-toggle="password-model" type="submit" class="updateBtn bg-emerald-800 hover:bg-emerald-600 pt-2 pb-2 pl-6 pr-6 font-medium rounded-lg text-center">Update</button>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>

@endsection
