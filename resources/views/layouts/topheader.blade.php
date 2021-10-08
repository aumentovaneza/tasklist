<!-- Top Header -->
<div class="pr-4 pl-4 relative items-center z-10 flex-shrink-0 flex h-24 bg-accolade-gray content-between">

    <div class="flex-1 px-4 flex">
        <div class="mr-2">
            <a href="#">
                <div class="flex-shrink-0 h-12 w-12">
                        <img class="h-12 w-12 rounded-full" src="{{'https://ui-avatars.com/api/?name='. Auth::user()->name }}" alt="">
                </div>
            </a>
        </div>
        <div class="inline-block w-3/5">
            <div class="pl-3 text-sm font-medium text-gray-900"><a href="#">{{ Auth::user()->name }}</a></div>
        </div>
    </div>
    <div class="flex">
        <div class="flex items-center bg-white border border-2 border-accolade-lightgray px-3 py-2 mr-3">
            <div class="text-sm mr-1 tracking-widest">Date <span class="font-bold">|</span></div> <div class="text-bold text-sm tracking-widest"> {{ \Carbon\Carbon::today()->format('F j,Y') }}</div>
        </div>
        <sign-out-button route="{{ route('login') }}"></sign-out-button>
    </div>
</div>
