<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ $calender->name }}
    </h2>
  </x-slot>
    
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          @foreach ($dates as $date)
          <table class="table-fixed w-full border-separate border">
            <tbody>
              <tr>
                <th class="cursor-pointer text-blue-500 underline hover:text-blue-700 open-popup-button border border w-1/4 px-4 py-2">{{$date}}</th>
                <td class="px-4 py-2">
                  @php
                  $authUserSchedule = $calender->getAuthUserScheduleAt($date)
                  @endphp
                  @if($authUserSchedule->start_time == '00:00:00' && $authUserSchedule->end_time == '23:59:59')
                  <span>○</span>
                  @elseif ($authUserSchedule->start_time && $authUserSchedule->end_time)
                  <span>{{ substr($authUserSchedule->start_time, 0, 5) }}</span>
                  <span>〜</span>
                  <span>{{ substr($authUserSchedule->end_time, 0, 5) }}</span>
                  @else
                  <span>×</span>
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
          <div class="schedule-detail">
            <div tabindex="0" class="popup hidden z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
              <div class="z-50 relative p-3 mx-auto my-0 max-w-full" style="width: 600px;">
                <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                  <div class="px-6 py-3 text-xl border-b font-bold">{{$date}}</div>
                  <div class="p-6 flex-grow">
                    <table class="table-fixed w-full border-separate border">
                      <tbody>
                        @foreach ($calender->getSchedulesAt($date) as $schedule)
                        <tr>
                          <th class="border w-1/4 px-4 py-2">
                            {{ $schedule->user->name }}
                          </th>
                          <td class="border px-4 py-2">
                            @if($schedule->start_time == '00:00:00' && $schedule->end_time == '23:59:59')
                            <span>○</span>
                            @elseif ($schedule->start_time && $schedule->end_time)
                            <span>{{ substr($schedule->start_time, 0, 5) }}</span>
                            <span>〜</span>
                            <span>{{ substr($schedule->end_time, 0, 5) }}</span>
                            @else
                            <span>×</span>
                            @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="px-6 py-3 border-t">
                    <div class="flex justify-center">
                      <button type="button" class="close-popup-button bg-gray-700 text-gray-100 rounded px-10 py-3 mr-1 switchDisplayDetailSchedule">閉じる</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50">
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <script>
    const scheduleDetail = document.querySelectorAll('.schedule-detail');
    const openPopupButtons = document.querySelectorAll('.open-popup-button');
    const popups = document.querySelectorAll('.popup');
    const closePopupButtons = document.querySelectorAll('.close-popup-button');
    for (let i = 0; i < scheduleDetail.length; i++) {
      const openPopupButton = openPopupButtons[i];
      const popup = popups[i];
      const closePopupButton = closePopupButtons[i];
      openPopupButton.addEventListener('click', function() {
        popup.classList.remove('hidden');
        closePopupButton.addEventListener('click', function() {
          popup.classList.add('hidden');
        });
      });
    }
  </script>
</x-app-layout>