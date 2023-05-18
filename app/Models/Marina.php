<?php

namespace App\Models;

use App\Concerns\HasAddress;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marina extends Model
{
    use HasFactory, SoftDeletes, HasAddress;

    protected $fillable = [
        'name', 'address_line_1', 'address_line_2', 'city', 'county',
        'postcode', 'country', 'phone_number', 'website', 'email', 'vhf_channel',
        'lattitude', 'longitude'
    ];

    public function getNextEventsAttribute()
    {
        $tides = $this->tides()
            ->whereDate('tide_at', '>', now())
            ->orderBy('tide_at')
            ->limit(8);
        // $gateEvents = (all gate events and name, dates as above)
        // return combination in date order
        // Event Type (gate or tide) | Event Date Time | Event Name (High, Low, Lowered, Raised) | Gate Name or Null
    }
    
    public function berths(): HasMany
    {
        return $this->hasMany(Berth::class);
    }

    public function gates(): HasMany
    {
        return $this->hasMany(Gate::class);
    }

    public function keys(): HasMany
    {
        return $this->hasMany(Key::class);
    }

    public function berthContracts(): HasManyThrough
    {
        return $this->hasManyThrough(BerthContract::class, Berth::class);
    }

    public function boats(): HasMany
    {
        return $this->hasMany(Boat::class);
    }

    public function boatYard(): HasOne
    {
        return $this->hasone(BoatYard::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function currentMarinaStaff(): HasMany
    {
        return $this->hasMany(MarinaStaff::class, 'current_marina');
    }

    public function tides(): HasMany
    {
        return $this->hasMany(Tide::class);
    }

}
