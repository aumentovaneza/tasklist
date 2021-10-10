<header class="bg-white shadow border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex px-2 lg:px-0">
                <div class="flex-shrink-0 flex items-center">
                    <a href="#">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-blue-600.svg" alt="Workflow">
                    </a>
                </div>
                <nav aria-label="Global" class="hidden lg:ml-6 lg:flex lg:items-center lg:space-x-4">
                    <a href="#" class="px-3 py-2 text-gray-900 text-sm font-medium">
                        Dashboard
                    </a>
                </nav>
            </div>
            <div class="flex items-center">
                <sign-out-button route="{{ route('home') }}"></sign-out-button>
            </div>
        </div>
    </div>
</header>
