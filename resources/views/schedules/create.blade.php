<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{$calender->name }},スケジュール登録
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-1 sm:p-6 bg-white border-b border-gray-200">
          <div class="text-sm text-slate-500 mb-3">都合の良い時間を選択してください。</div>
          <form method="POST" action="{{ route('schedule.store', $calender->id) }}">
            @csrf
            @foreach($dates as $date)

            @if($isOldSchedules)
            @php
            $schedule = $calender->getAuthUserScheduleAt($date);
            @endphp
            <input class="shadow mr-1 appearance-none border rounded w-full py-2 px-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="id[{{$date}}]" type="hidden" value="{{$schedule->id}}" autofocus>
            <div class="w-full mb-3">
              <label class="w-auto inline-block text-gray-700 text-sm font-bold mb-2 mr-3">{{$date}}</label>
              <input class="shadow appearance-none border rounded w-4/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="start_time[{{$date}}]" type="time" value="{{$schedule->start_time}}" autofocus>
              <span>〜</span>
              <input class="shadow appearance-none border rounded w-4/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="end_time[{{$date}}]" type="time" value="{{$schedule->end_time}}" autofocus>
              @error('name')
              <div class="alert alert-danger text-red-700">{{ $message }}</div>
              @enderror
            </div>

            @else
            <div class="w-full mb-3">
              <label class="w-auto inline-block text-gray-700 text-sm font-bold mb-2 mr-3">{{$date}}</label>
              <input class="shadow appearance-none border rounded w-4/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="start_time[{{$date}}]" type="time" value="00:00:00" autofocus>
              <span>〜</span>
              <input class="shadow appearance-none border rounded w-4/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="end_time[{{$date}}]" type="time" value="23:59:00" autofocus>
              @error('name')
              <div class="alert alert-danger text-red-700">{{ $message }}</div>
              @enderror
            </div>
            @endif

            @endforeach
            <div class="flex justify-center">
              <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-20 rounded focus:outline-none focus:shadow-outline" type="submit">
                登録
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>