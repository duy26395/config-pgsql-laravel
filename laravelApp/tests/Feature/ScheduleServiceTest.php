<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Mockery;
use App\Http\Controllers\ScheduleAction;

class ScheduleServiceTest extends TestCase
{
    protected ScheduleAction $scheduleAction;

    protected function setUp(): void
    {
        parent::setUp();
        $this->scheduleAction = new ScheduleAction();
    }

    /**
     * A basic feature test test_schedule_exception.
     *
     * @return void
     */
    public function test_schedule_exception()
    {
        $data = [
            "date_time_start" => "2023-11-22 12:01",
            "type" => "L1",
            "object" => 1
        ];
        $result = $this->scheduleAction->get_schedule("22/11/2023 12:50", "L1", 1);

        $this->assertEquals([], $result);
    }
}
