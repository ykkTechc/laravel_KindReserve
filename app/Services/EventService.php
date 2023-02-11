<?php
//ファイルが存在する場所
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventService {

  public  static function checkEventDuplication($eventDate, $startTime, $endTime) {
    $check = DB::table('events')
    ->whereDate('start_date', $eventDate) //日にち
    ->whereTime('end_date', '>', $startTime)
    ->whereTime('start_date', '<', $endTime)
    ->exists();
    return $check;
  }

  public  static function countEventDuplication($eventDate, $startTime, $endTime) {
    $check = DB::table('events')
    ->whereDate('start_date', $eventDate) //日にち
    ->whereTime('end_date', '>', $startTime)
    ->whereTime('start_date', '<', $endTime)
    ->count();
  }

  public static function joinDateAndTime($date, $time)
  {
    $join = $date. " " . $time;
    $dateTime = Carbon::createFromFormat('Y-m-d H:i', $join);
    return $dateTime;
  }


}