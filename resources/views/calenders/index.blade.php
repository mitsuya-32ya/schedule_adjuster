<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('カレンダー一覧') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($calenders as $calender)
                <a href="{{ route('calenders.show', $calender->id) }}" class="block mt-8 p-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h3 class="font-semibold text-xl text-gray-800 mb-2">{{ $calender->name }}</h3>
                    <div>
                        <span class="pr-1">member :</span>
                        @foreach ($calender->users as $user)
                            <span>{{ $user->name }}</span>
                                @if(!($loop->last))
                                    <span>,</span>
                                @endif
                        @endforeach
                    </div>
                </a>
            @endforeach
        </div>
    </div> 
</x-app-layout>