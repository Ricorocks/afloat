<div>
    Current: {{ $berth->berth_number ?? '' }}
    <form wire:submit.prevent='saveBerth' class="grid grid-cols-2 gap-2 p-8">
        <label for="leg">Leg</label>
        <input type="text" id="leg" name="leg" wire:model.debounce.500ms="currentBerth.leg">
        <div class="col-span-2">
            <p>
                @error('leg')
                    <span class="error">{{ $message }}</span>
                @enderror
            </p>
        </div>

        <label for="birthNumber">Birth Number</label>
        <input type="text" id="berth_number" name="berth_number" wire:model.debounce.500ms="currentBerth.berth_number">
        <div class="col-span-2">
            <p>
                @error('birthNumber')
                    <span class="error">{{ $message }}</span>
                @enderror
            </p>
        </div>

        <label for="birthNumber">Max Length</label>
        <input type="text" id="max_length_in_cm" name="max_length_in_cm" wire:model.debounce.500ms="currentBerth.max_length_in_cm">
        <div class="col-span-2">
            <p>
                @error('max_length_in_cm')
                    <span class="error">{{ $message }}</span>
                @enderror
            </p>
        </div>

        <label for="birthNumber">Max Width</label>
        <input type="text" id="max_width_in_cm" name="max_width_in_cm" wire:model.debounce.500ms="currentBerth.max_width_in_cm">
        <div class="col-span-2">
            <p>
                @error('max_width_in_cm')
                    <span class="error">{{ $message }}</span>
                @enderror
            </p>
        </div>

        <label for="birthNumber">Max Depth</label>
        <input type="text" id="max_draught_in_cm" name="max_draught_in_cm" wire:model.debounce.500ms="currentBerth.max_draught_in_cm">
        <div class="col-span-2">
            <p>
                @error('max_draught_in_cm')
                    <span class="error">{{ $message }}</span>
                @enderror
            </p>
        </div>

        <button wire:target='resetRequired' type="submit">Reset</button>  
        <button wire:target='saveBerth' type="submit">Update</button>  

        <div class="col-span-2 mt-20" x-data>
            <div class="grid grid-cols-3 grid-rows-3 gap-3 w-full text-center">
                <div></div>
                {{-- <input type="button" value="-" class="button-plus p-5" data-field="quantity" x-on:click="count_y--" > --}}
                {{-- <input type="button"  x-on:click="$wire.decrement('overlay_y')" value="-" /> --}}
                <button>
                    <x-heroicon-o-arrow-up x-on:click="$wire.decrement('overlay_y')" class="w-6 h-6 text-gray-500" />
                </button>
                <div></div>

                {{-- <input type="button" value="-" class="button-plus p-5" data-field="quantity" x-on:click="count_x--" > --}}
                {{-- <input type="button"  x-on:click="$wire.decrement('overlay_x')" value="-" /> --}}
                <button>
                    <x-heroicon-o-arrow-left x-on:click="$wire.decrement('overlay_x')" class="w-6 h-6 text-gray-500" />
                </button>
                <div>
                    
                </div>
                {{-- <input type="button" value="+" class="button-plus p-5" data-field="quantity" x-on:click="count_x++" > --}}
                {{-- <input type="button"  x-on:click="$wire.increment('overlay_x')" value="+" /> --}}
                <button>
                    <x-heroicon-o-arrow-right x-on:click="$wire.increment('overlay_x')" class="w-6 h-6 text-gray-500" />
                </button>

                <div></div>
                {{-- <input type="button" value="+" class="button-plus p-5" data-field="quantity" x-on:click="count_y++" > --}}
                {{-- <input type="button"  x-on:click="$wire.increment('overlay_y')" value="+" /> --}}
                <button>
                    <x-heroicon-o-arrow-down x-on:click="$wire.increment('overlay_y')" class="w-6 h-6 text-gray-500" />
                </button>
                <div></div>
            </div> 
            {{-- <input type="number" name="passengers" id="passengers" class="w-full" required min="1" max="100" :value="count_x" > 
            <input type="number" name="passengers2" id="passengers2" class="w-full" required min="1" max="100" :value="count_y">  --}}
            <input type="number" id="overlay_x" name="overlay_x" wire:model.debounce.500ms="currentBerth.overlay_x" min="1" max="100" class="hidden">
            <input type="number" id="overlay_y" name="overlay_y" wire:model.debounce.500ms="currentBerth.overlay_y" min="1" max="100" class="hidden">
            
        </div>      

              
        
    </form>
</div>
