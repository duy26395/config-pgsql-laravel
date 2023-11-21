<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Models\Coupon;
use App\Models\Train;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class ScheduleAction extends Controller
{
    //
    public function __invoke(ScheduleRequest $request)
    {
        $type = $request->type;
        $coupon = $request->coupon;
        $date_time_start = $request->date_time_start;

        $qty = $request->qty;

        $coupon = Coupon::find($coupon);
        $type = Type::where('code', $type)->firstOrFail();
        $carbonDatetime = Carbon::createFromFormat('d/m/Y H:i', $date_time_start);
        $time = $carbonDatetime->format('H:i');
        $train = DB::table('trains')->where('time_start', '>=', $time)
            ->orderBy('time_start', 'ASC')->get();

        if (!$train->isEmpty()) {
            $first = $train->first();
        } else {
            $first = [];
        }
    }
}
