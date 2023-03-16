<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="max-w-2xl py-4 mx-auto">
            <x-jet-validation-errors class="mb-4" />

               @if (session('status'))
                   <div class="mb-4 font-medium text-sm text-green-600">
                       {{ session('status') }}
                   </div>
               @endif
               
                 <form method="get" action="{{ route('events.edit', ['event' => $event->id]) }}">
                       <div>
                           <x-jet-label for="event_name" value="イベント名" />
                          {{ $event->name }}
                       </div>
                       <div class="mt-4">
                           <x-jet-label for="information" value="イベント詳細" />
                           <!-- エラーなどが出ても、文字を残してくれる -->
                           {!! nl2br(e($event->information)) !!}
                       </div>

                       <div class="md:flex justify-between">
                       <div class="mt-4">
                           <x-jet-label for="event_date" value="イベント日付" />
                           {{ $event->eventDate }}
                       </div>
     
                       <div class="mt-4">
                           <x-jet-label for="start_time" value="開始時間" />
                           {{ $event->startTime }}
                       </div>
                       
                       <div class="mt-4">
                           <x-jet-label for="end_time" value="終了時間" />
                           {{ $endTime }}
                       </div>
                     </div>
                     <div class="md:flex justify-between items-end">
                       <div class="mt-4">
                          <x-jet-label for="max_people" value="定員数" />
                          {{ $event->max_people }}
                       </div>
                       <div class="flex space-x-4 justify-around">
                           @if($event->is_visible)
                              表示中
                           @else
                              非表示
                           @endif
                       </div>
                       <!-- // 過去の投稿を編集できなくしてる。 -->
                       @if($event->eventDate >= \Carbon\Carbon::today()->format('Y年m月d日'))
                       <x-jet-button class="ml-4">
                               編集する
                       </x-jet-button>
                       <x-jet-button formaction="{{ route('events.destroy', ['event' => $event->id]) }}" data-id="{{ $event->id }}" onclick="cancelPost(this)" class="ml-4 bg-black text-white py-2 px-4">
                                削除する
                       </x-jet-button>
                       @endif
                    </div>
                 </form>
               </div>
            </div>
        </div>
    </div>
    <div class="pt-4 pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="max-w-2xl py-4 mx-auto">
                    @if (!$users->isEmpty())
                      <div class="text-center pd-2">予約状況</div>
                      <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                          <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約者名</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約人数</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($reservations as $reservation)
                        @if(is_null($reservation['canceled_date']))
                          <tr>
                            <td class="px-4 py-3">{{ $reservation['name'] }}</td>
                            <td class="px-4 py-3">{{ $reservation['number_of_people'] }}</td>
                          </tr>
                        @endif
                        @endforeach
                        </tbody>
                      </table>
                      @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function cancelPost(e) {
                'use strict';
                if (confirm('本当に削除しても宜しいですか？')) {
                    document.getElementById('cancel_' + e.dataset.id).submit();
                }
            }
    </script>
</x-app-layout>
