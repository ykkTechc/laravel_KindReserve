<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\CarbonImmutable;
use App\Services\EventService;


class Calendar extends Component
{
    public $currentDate;
    public $currentWeek;
    public $day;
    public $sevenDaysLater;
    public $events;

    public function mount () 
    {
        $this->currentDate = CarbonImmutable::today(); //　今日の日付を取得
        $this->sevenDaysLater =$this->currentDate->addDays(7);//今日から7日分
        $this->currentWeek = []; //1週間の日付の値を配列に入れる
        // EventServiceフォルダのgetWeekEventsメソッドを使っている
        $this->events = EventService::getWeekEvents(
            $this->currentDate->format('Y-m-d'),
            $this->sevenDaysLater->format('Y-m-d'),
         );

        // 7日分の日付を取得
        for ($i = 0; $i < 7 ; $i++) {

            $this->day = CarbonImmutable::today()->addDays($i)->format('m月d日');
            array_push($this->currentWeek, $this->day);
            
        }
        ($this->currentWeek);
    }

    public function getDate($date)
    {
        $this->currentDate = $date; //　今日の日付を取得
        $this->currentWeek = []; //1週間の日付の値を配列に入れる
        $this->sevenDaysLater = CarbonImmutable::parse($this->currentDate)->addDays(7);//今日から7日分

        $this->events = EventService::getWeekEvents(
            $this->currentDate,
            $this->sevenDaysLater->format('Y-m-d'),
         );

        // 1週間の日付を取得
        for ($i = 0; $i < 7 ; $i++) {

            $this->day = CarbonImmutable::parse($this->currentDate)->addDays($i)->format('m月d日');
            array_push($this->currentWeek, $this->day);
        }
        // dd($this->currentWeek);
    }

    public function render()
    {

            return view('livewire.calendar');

    }
}
