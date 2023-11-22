<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;

class ScheduleAction extends Controller
{
    //
    public function __invoke(ScheduleRequest $request)
    {
        $type = $request->type;
        $coupon = $request->coupon;
        $date_time_start = $request->date_time_start;

        $qty = $request->qty;
        $res = [];
        $res = $this->get_schedule($date_time_start, $type, $coupon, $qty);
        return response()->json($res);
    }

    public function get_schedule($date_time, $type, $object, $qty = 1)
    {
        $res = [];
        $dateTime = Carbon::createFromFormat('d/m/Y H:i', $date_time);
        // if (!$dateTime || $dateTime->format('d/m/Y H:i') !== $date_time || intval($dateTime->format('Hi')) < intval(date('Hi'))) {
        //     throw new HttpResponseException(
        //         response()->json([
        //             'message' => 'invalid input datetime'
        //         ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        //     );
        // }

        if ($object > 4 || $object < 1) {
            throw new HttpResponseException(
                response()->json([
                    'message' => 'invalid input object'
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            );
        }
        $ar_type = ['L1', 'L2', 'L3'];
        if (!in_array($type, $ar_type)) {
            throw new HttpResponseException(
                response()->json([
                    'message' => 'invalid input type'
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            );
        }

        //--Exception
        //time 2023-11-22 12:01,type L1, object 1
        //time 2023/11/22 11:00,type L1, object 0
        //time 2023/11/22 11:00,type L5, object 1
        //time 2022-11-21 12:01,type L1, object 1

        //time 12:01,type L1, object 1
        //time 09:00, type L1, object 1
        //time 09:00, type L1, object 2
        //time 09:00, type L1, object 3
        //time 09:00, type L1, object 4
        //time 09:00, type L2, object 1
        //time 09:00, type L2, object 2
        //time 09:00, type L2, object 3
        //time 09:00, type L2, object 4
        //time 09:00, type L3, object 1
        //time 09:00, type L3, object 2
        //time 09:00, type L3, object 3
        //time 09:00, type L3, object 4
        //time 07:30, type L1, object 1
        //time 07:30, type L1, object 2
        //time 07:30, type L1, object 3
        //time 07:30, type L1, object 4
        //time 07:30, type L2, object 1
        //time 07:30, type L2, object 2
        //time 07:30, type L2, object 3
        //time 07:30, type L2, object 4
        //time 07:30, type L3, object 1
        //time 07:30, type L3, object 2
        //time 07:30, type L3, object 3
        //time 07:30, type L3, object 4

        $time = intval($dateTime->format('Hi'));

        if ($time <= 1200) {
            if ($time > 830) {
                if ($type === 'L1') {
                    if ($object === 1) {
                        $price = $this->calc_price(150000, 10, $qty);
                    } else {
                        if ($object === 2) {
                            $price = $this->calc_price(150000, 20, $qty);
                        } else {
                            if ($object === 3) {
                                $price = $this->calc_price(150000, 50, $qty);
                            } else {
                                $price =  $this->calc_price(150000, 0, $qty);
                            }
                        }
                    }
                } else {
                    if ($type === 'L2') {
                        if ($object === 1) {
                            $price = $this->calc_price(250000, 10, $qty);
                        } else {
                            if ($object === 2) {
                                $price = $this->calc_price(250000, 20, $qty);
                            } else {
                                if ($object === 3) {
                                    $price = $this->calc_price(250000, 50, $qty);
                                } else {
                                    $price =  $this->calc_price(250000, 0, $qty);
                                }
                            }
                        }
                    } else {
                        if ($object === 1) {
                            $price = $this->calc_price(170000, 10, $qty);
                        } else {
                            if ($object === 2) {
                                $price = $this->calc_price(170000, 20, $qty);
                            } else {
                                if ($object === 3) {
                                    $price = $this->calc_price(170000, 50, $qty);
                                } else {
                                    $price =  $this->calc_price(170000, 0, $qty);
                                }
                            }
                        }
                    }
                }
                //result
                $res = [
                    'train_name' => 'SE2',
                    'time' => '12:00',
                    'price' =>  $price
                ];
            } else {
                if ($type === 'L1') {
                    if ($object === 1) {
                        $price1 = $this->calc_price(100000, 10, $qty);
                        $price2 = $this->calc_price(150000, 10, $qty);
                    } else {
                        if ($object === 2) {
                            $price1 = $this->calc_price(100000, 20, $qty);
                            $price2 = $this->calc_price(150000, 20, $qty);
                        } else {
                            if ($object === 3) {
                                $price1 = $this->calc_price(100000, 50, $qty);
                                $price2 = $this->calc_price(150000, 50, $qty);
                            } else {
                                $price1 = $this->calc_price(100000, 0, $qty);
                                $price2 = $this->calc_price(150000, 0, $qty);
                            }
                        }
                    }
                } else {
                    if ($type === 'L2') {
                        if ($object === 1) {
                            $price1 = $this->calc_price(200000, 10, $qty);
                            $price2 = $this->calc_price(250000, 10, $qty);
                        } else {
                            if ($object === 2) {
                                $price1 = $this->calc_price(200000, 20, $qty);
                                $price2 = $this->calc_price(250000, 20, $qty);
                            } else {
                                if ($object === 3) {
                                    $price1 = $this->calc_price(200000, 50, $qty);
                                    $price2 = $this->calc_price(250000, 50, $qty);
                                } else {
                                    $price1 =  $this->calc_price(200000, 0, $qty);
                                    $price2 =  $this->calc_price(250000, 0, $qty);
                                }
                            }
                        }
                    } else {
                        if ($object === 1) {
                            $price1 = $this->calc_price(150000, 10, $qty);
                            $price2 = $this->calc_price(170000, 10, $qty);
                        } else {
                            if ($object === 2) {
                                $price1 = $this->calc_price(150000, 20, $qty);
                                $price2 = $this->calc_price(170000, 20, $qty);
                            } else {
                                if ($object === 3) {
                                    $price1 = $this->calc_price(150000, 50, $qty);
                                    $price2 = $this->calc_price(170000, 50, $qty);
                                } else {
                                    $price1 = $this->calc_price(150000, 50, $qty);
                                    $price2 =  $this->calc_price(170000, 0, $qty);
                                }
                            }
                        }
                    }
                }
                //result
                $res = [
                    [
                        'train_name' => 'SE1',
                        'time' => '08:30',
                        'price' =>  $price1
                    ],
                    [
                        'train_name' => 'SE2',
                        'time' => '12:00',
                        'price' =>  $price2
                    ]
                ];
            }
        }

        return $res;
    }

    function calc_price(int $price, int $percent, int $qty)
    {
        return $price * $qty * (100 - $percent) / 100;
    }
}
