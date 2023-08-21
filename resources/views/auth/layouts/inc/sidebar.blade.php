<div class="div">
    <div class="relative min-h-screen  md:flex" id="sidebar" data-dev-hint="container">
        <aside class="bg-emerald-600  text-gray-100 h-screen w-1/6 space-y-6 pt-6 px-0 shadow-2xl fixed "
            data-dev-hint="sidebar; px-0 for frameless; px-2 for visually inset the navigation">
            <div class="flex flex-col space-y-6" data-dev-hint="optional div for having an extra footer navigation">
                <a href="/" class="text-white flex items-center space-x-2 px-4" title="Your App is cool">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-0" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                    <span class="text-2xl font-extrabold whitespace-nowrap truncate">Pen It</span>
                </a>
                <nav data-dev-hint="main navigation">
                    <a href="/"
                        class="flex items-center space-x-2 py-2 px-4 mt-3 rounded-r-xl transition duration-200 hover:bg-emerald-800 hover:rounded-r-xl hover:text-white {{ Request::is('/') ? 'rounded-r-xl bg-emerald-800 hover:rounded-r-xl' : '' }}">
                        <span class="h-6 w-6 text-base">
                            <i
                                class="fa-solid fa-bars mr-3 iconFontsize text-white {{ Request::is('/') ? 'text-black' : '' }}"></i>
                        </span>
                        <span class="text-white font-medium text-black text-xl {{ Request::is('/') ? 'text-black' : '' }}">My Journal</span>
                    </a>
                    <a href="/starredContents"
                        class="flex items-center space-x-2 rounded-r-xl py-2 px-4 mt-3 transition duration-200 hover:bg-emerald-800 hover:rounded-r-xl hover:text-white {{ Request::is('/starredContents') ? 'rounded-r-xl bg-emerald-800 hover:rounded-r-xl' : '' }}">
                        <span class="h-6 w-6 text-base">
                            <i
                                class="fa-regular fa-star mr-3 iconFontsize text-white {{ Request::is('/starredContents') ? 'text-black' : '' }}"></i>
                        </span>
                        <span
                            class="text-white font-medium text-black text-xl {{ Request::is('/starredContents') ? 'text-black' : '' }}">Starred</span>
                    </a>
                    <a href="/share"
                        class="flex items-center space-x-2 rounded-r-xl py-2 px-4 mt-3 transition duration-200 hover:bg-emerald-800 hover:rounded-r-xl hover:text-white {{ Request::is('/share') ? 'rounded-r-xl bg-emerald-800 hover:rounded-r-xl' : '' }}">
                        <span class="h-6 w-6 text-base">
                            <i
                                class="fa-solid fa-share-from-square iconFontsize text-white {{ Request::is('/share') ? 'text-black' : '' }}"></i>
                        </span>
                        <span class="text-white font-medium text-black text-xl {{ Request::is('/share') ? 'text-black' : '' }}">share</span>
                    </a>
                    <a href="/trash"
                        class="flex items-center space-x-2 rounded-r-xl py-2 px-4 mt-3 transition duration-200 hover:bg-emerald-800 hover:rounded-r-xl hover:text-white {{ Request::is('/trash') ? 'rounded-r-xl bg-emerald-800 hover:rounded-r-xl' : '' }}">
                        <span class="h-6 w-6 text-base">
                            <i
                                class="fa-solid fa-trash-can mr-3 iconFontsize text-white {{ Request::is('/trash') ? 'text-black' : '' }}"></i>
                        </span>
                        <span class="text-white font-medium text-black text-xl {{ Request::is('/trash') ? 'text-black' : '' }}">trash</span>
                    </a>



                </nav>
            </div>
            <nav data-dev-hint="second-main-navigation or footer navigation">

                <a href="/settings"
                    class="block py-2 px-4 rounded-r-xl transition duration-200 hover:bg-emerald-800 hover  hover:text-white">
                    <span class="h-6 w-6 text-base">
                        <i class="fa-solid fa-gear mr-3 iconFontsize text-white"></i></span>
                    <Span class="text-white font-medium text-black text-xl">Settings</Span>
                </a>
            </nav>
        </aside>
    </div>
