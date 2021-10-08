<!-- Navbar -->
<nav class="flex-shrink-0 bg-accolade-darkblue">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <!-- Logo section -->
            <div class="flex items-center px-2 lg:px-0 xl:w-64">
                <div class="flex-shrink-0">
{{--                    <img class="h-8 w-auto" src="{{asset('storage/accolade-logo.png')}}" alt="Workflow">--}}
                </div>
            </div>
            <div class="flex lg:hidden">
                <!-- Mobile menu button -->
                <button
                    class="bg-accolade-blue inline-flex items-center justify-center p-2 rounded-md text-accolade-lightblue hover:text-white hover:bg-accolade-lightblue focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-accolade-lightblue focus:ring-white"
                    aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed. -->
                    <!--
                      Heroicon name: outline/menu-alt-1

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                    <!-- Icon when menu is open. -->
                    <!--
                      Heroicon name: outline/x

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Links section -->
            <div class="hidden lg:block lg:w-max-full">
                <div class="flex items-center justify-end">
                    <div class="flex">
                        <a href="{{ url('log-activity')  }}"
                           class="px-3 py-2 rounded-md text-sm font-medium text-accolade-lightgray hover:text-white">Tasks</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
