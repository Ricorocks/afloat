<?php

namespace Tests\Feature;

use App\Models\Berth;
use App\Models\BerthContract;
use App\Models\Boat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BerthModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_return_an_active_contract()
    {
        $berth = Berth::factory()->create();
        $this->assertEquals(0, $berth->berthContracts->count());
        $this->assertFalse($berth->activeContract);

        $berthContract = BerthContract::factory()->create();

        $berth->berthContracts()->save(
            $berthContract 
        );
        $berth->refresh();

        $this->assertEquals(1, $berth->berthContracts->count());
        $this->assertTrue($berth->activeContract);
    }
}
