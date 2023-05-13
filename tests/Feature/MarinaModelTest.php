<?php

namespace Tests\Feature;

use App\Models\Berth;
use App\Models\Boat;
use App\Models\BoatYard;
use App\Models\Gate;
use App\Models\Invoice;
use App\Models\Key;
use App\Models\Marina;
use App\Models\MarinaStaff;
use App\Models\Tide;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MarinaModelTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_can_have_many_berths()
    {
        $marina = Marina::factory()
            ->has(Berth::factory()->count(3))
            ->create();
        $this->assertInstanceOf(HasMany::class, $marina->berths());
        $this->assertCount(3, $marina->berths);
    }

    /** @test */
    public function it_can_have_many_gates()
    {
        $marina = Marina::factory()
            ->has(Gate::factory()->count(3))
            ->create();
        $this->assertInstanceOf(HasMany::class, $marina->gates());
        $this->assertCount(3, $marina->gates);
    }

    /** @test */
    public function it_can_have_many_keys()
    {
        $marina = Marina::factory()
            ->has(Key::factory()->count(3))
            ->create();
        $this->assertInstanceOf(HasMany::class, $marina->keys());
        $this->assertCount(3, $marina->keys);
    }

    /** @test */
    public function it_can_have_many_boats()
    {
        $marina = Marina::factory()
            ->has(Boat::factory()->count(3))
            ->create();
        $this->assertInstanceOf(HasMany::class, $marina->boats());
        $this->assertCount(3, $marina->boats);
    }

    /** @test */
    public function it_can_have_many_boatyards()
    {
        // $marina = Marina::factory()
        //     ->for(BoatYard::factory())
        //     ->create();
        // $this->assertInstanceOf(HasOne::class, $marina->boatYard());
        // $this->assertCount(1, $marina->boatYard);
    }

    /** @test */
    public function it_can_have_many_invoices()
    {
        $marina = Marina::factory()
            ->has(Invoice::factory()->count(3))
            ->create();
        $this->assertInstanceOf(HasMany::class, $marina->invoices());
        $this->assertCount(3, $marina->invoices);
    }

    /** @test */
    public function it_can_have_many_current_staff()
    {
        // $marina = Marina::factory()
        //     ->has(MarinaStaff::factory()->count(3))
        //     ->create();
        // $this->assertInstanceOf(HasMany::class, $marina->currentMarinaStaff());
        // $this->assertCount(3, $marina->currentMarinaStaff);
    }

    /** @test */
    public function it_can_have_many_tides()
    {
        $marina = Marina::factory()
            ->has(Tide::factory()->count(3))
            ->create();
        $this->assertInstanceOf(HasMany::class, $marina->tides());
        $this->assertCount(3, $marina->tides);
    }
    
}
