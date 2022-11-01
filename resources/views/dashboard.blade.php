@extends('layouts.app')
@section('content')
    <div class="py-10">
        <header>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8">
                    <div class="flex items-center space-x-5">
                        <div class="flex-shrink-0">
                            <div class="relative">
                                <img class="h-16 w-16 rounded-full" src="{{'https://ui-avatars.com/api/?name='. Auth::user()->name }}"  alt="">
                                <span class="absolute inset-0 shadow-inner rounded-full" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">{{ Auth::user()->name }}</h1>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3">
{{--                        <generic-button text='New Group' color="blue" action="group_modal"></generic-button>--}}
                        <generic-button text='New Group Item' color="blue" action="group_item_modal"></generic-button>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 mt-10">
                <!-- Replace with your content -->
                <group-list-component></group-list-component>
            </div>
        </main>
    </div>
@endsection
