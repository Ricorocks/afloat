<?php

namespace Tests\Feature;

use App\Models\Gate;
use App\Models\GateEvent;
use App\Models\Marina;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GateModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_marina()
    {
        $gate = Gate::factory()->create();
        $this->assertInstanceOf(BelongsTo::class, $gate->marina());
        $this->assertInstanceOf(Marina::class, $gate->marina);
    }

    /** @test */
    public function it_can_have_many_events()
    {
        $gate = Gate::factory()
            ->has(GateEvent::factory(3))
            ->create();
        $this->assertInstanceOf(HasMany::class, $gate->gateEvents());
        $this->assertCount(3, $gate->gateEvents);
    }

    /** @test */
    public function it_returns_a_next_event_label_attribute()
    {
        $gate = Gate::factory()->create();
        $this->assertEquals('No Future Events', $gate->nextEventLabel);
        $timeStamp = now()->addMinutes(5);
        $gate->gateEvents()->save(
            GateEvent::factory()->create([
                'happens_at' => $timeStamp
            ])
            );
        $gate->gateEvents()->save(
                GateEvent::factory()->create([
                    'happens_at' => now()->subMinutes(5)
                ])
                );
        $this->assertGreaterThan(0, strpos($gate->nextEventLabel, $timeStamp->format('d/m/Y')));
    }
}