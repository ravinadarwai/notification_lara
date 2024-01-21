<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                @foreach(auth()->user()->unreadnotifications as $notification)
                            <div class="bg-blue-300 p-3 m-2">
                              <h>{{ $notification->data['name'] }}</h> started following you!!!
                              <a href="{{ route('markasread', $notification->id) }}" class="p-2 bg-red-400 text-white rounded-lg">mark as read</a>
                            </div>
                        @endforeach
</div>
            </div>
        </div>
    </div>
</x-app-layout>
