<?php

namespace Tests\Feature;

use App\Models\BerthBooking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BerthBookingModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_return_a_confirmed_status()
    {

        $berthBooking = BerthBooking::factory([
            'confirmed_at' => null
        ])->create();
        
        $this->assertNull($berthBooking->confirmed_at);
        $this->assertFalse($berthBooking->confirmed);

        $berthBooking->update([
            'confirmed_at' => now()
        ]);
        $this->assertNotNull($berthBooking->confirmed_at);
        $this->assertTrue($berthBooking->confirmed);
    }
}
