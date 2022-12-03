<div>
    <form wire:submit.prevent='store' class="grid grid-cols-2 gap-3">
        <label for="label">Event Label</label>
        <input type="text" id="label" name="label" wire:model.debounce.500ms="label">
        <div class="col-span-2">
            <p>
                @error('label')
                    <span class="error">{{ $message }}</span>
                @enderror
            </p>
        </div>
        <label for="happensAt">Event Time</label>
        <input type="text" id="happensAt" name="happensAt" wire:model.debounce.500ms="happensAt">
        <div class="col-span-2">
            <p>
                @error('happensAt')
                    <span class="error">{{ $message }}</span>
                @enderror
            </p>
        </div>
        <div class="col-span-2">
            <button wire:target='store' type="submit">Add</button>
        </div>
        <div class="col-span-2">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </form>
</div>
