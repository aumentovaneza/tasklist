@extends('layouts.app')
@section('content')
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
        <generic-button text='New Task' color="blue" action="create_new_task"></generic-button>
    </div>
</div>
<div class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
    <div class="space-y-6 lg:col-start-1 lg:col-span-2">
        <!-- Description list-->
        <section>
            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h2 class="text-lg leading-6 font-medium text-gray-900">
                        Task List for {{ \Carbon\Carbon::now()->format('m-d-Y') }}
                    </h2>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Here lists all your current tasks
                    </p>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white shadow overflow-hidden sm:rounded-md">
                        <ul role="list" class="divide-y divide-gray-200">
                            @foreach($tasks as $task)
                                <task-item-component
                                    id = "{{ $task->id }}"
                                    name="{{ $task->name }}"
                                    description="{{ $task->description }}"
                                    started = "{{ $task->start_date }}"
                                    status = "{{ $task->status->name }}"
                                 ></task-item-component>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
        <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
            <h2 id="timeline-title" class="text-lg font-medium text-gray-900">Other Actions</h2>
            <div class="mt-6 flex flex-col justify-stretch">
                <generic-button text='View Statistics' color="blue" action="show_statistics"></generic-button>
                <generic-button text='Archived Tasks' color="yellow" action="restore_task"></generic-button>
                <generic-button text='Create new status' color="purple" action="create_new_status"></generic-button>
                <generic-button text='Download Data' color="green" action="download_data"></generic-button>
            </div>
        </div>
    </section>
</div>
@endsection
