<nav class="bg-white w-10/12	 h-16 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none fixed right-0">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">

      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <form class="ml-40 flex items-center w-8/12" method="POST" action="{{url('search-journal')}}">
            @csrf
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
              </div>
              <input type="search" id="tags"
                class="bg-gray-50 border border-emerald-600 text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5 focus:outline-none focus:border-emerald-700 focus:ring-1 focus:ring-emerald-700"
                name="journal_name" placeholder="Search Here" required>
            </div>
          </form>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <div class="relative ml-3">
          <button>
            <a href="" class="dark-mode">
              <img src="./img/dark_mode.svg" alt="">
            </a>
          </button>

        </div>
       <p>Hello,{{Auth::user()->name}}</p>
        <div class="relative ml-3 text-center ">
          <button>
            <a href="" class="alert">
              <img src="./img/Alert.svg" alt="">
            </a>
          </button>
        </div>
        <!-- Profile dropdown -->
        <div class="relative ml-3 text-center">
            <div class="max-w-lg mx-auto">
             @if(Auth::user()->avatar)
              <button type="button" >
                <img class="h-8 w-8 rounded-full" data-dropdown-toggle="dropdown"
                  src={{Auth::user()->avatar}}
                  alt="">
              </button>
              @else
              <button type="button head-profile-img h-8 w-8" >
                  <div class="profileImg h-11 w-11" data-dropdown-toggle="dropdown"></div>
              </button>
              @endif

              <!-- Dropdown menu -->
              <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4"
                id="dropdown">
                <div class="px-4 py-3">
                  <span class="block text-sm">{{Auth::user()->name}}</span>
                  <span class="block text-sm font-medium text-gray-900 truncate">{{Auth::user()->email}}</span>
                </div>
                <ul class="py-1" aria-labelledby="dropdown">
                  <li>
                    <a href="/settings" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"><i
                    class="fa-regular fa-user pr-5"></i>Profile</a>
                  </li>
                  <li>
                    <a href="logout" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"><i
                    class="fa-solid fa-arrow-right-from-bracket pr-5"></i>Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
 </nav>
