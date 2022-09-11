<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      新規作成
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form method="POST" action="{{ route('calender.store') }}">
            @csrf
            <div class="mb-3">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                カレンダー名
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" type="text" autofocus>
              @error('name')
              <div class="alert alert-danger text-red-700">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="mb-3">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="start_date">
                開始日
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="start_date" type="date" autofocus>
              @error('start_time')
              <div class="alert alert-danger text-red-700">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="end_date">
                終了日
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="end_date" type="date" autofocus>
              @error('end_time')
              <div class="alert alert-danger text-red-700">{{ $message }}</div>
              @enderror
            </div>
            <div class="text-blue-500 ">※開始日より終了日が遅い日付となるようにしてください。</div>
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