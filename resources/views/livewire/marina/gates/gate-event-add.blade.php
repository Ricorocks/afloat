<div>
    <form wire:submit.prevent='store' class="grid grid-cols-2 gap-3">
        <label for="label">Event Label</label>
        <input type="text" id="label" name="label" wire:model.debounce.500ms="label" />
        <div class="col-span-2">
            <p>
                @error('label')
                    <span class="error">{{ $message }}</span>
                @enderror
            </p>
        </div>
        <label for="happensAt">Event Time</label>
        <div class="grid grid-cols-2">
            {{-- <input type="text" id="happensAt" name="happensAt" wire:model="happensAt"
            x-data
    x-ref="input"
    x-init="new Pikaday({ field: $refs.input })"
    type="text"  /> --}}
            <div wire:ignore>
                    <x-input.text.datepicker id="datepicker" />
            </div>
            <input type="text" id="happensAtTime" name="happensAtTime" wire:model.debounce.500ms="happensAtTime" />
            <input type="text" wire:model.debounce.500ms="happensAtDate" id="happensAtDate" />
        </div>
        <div>
            <p>
                @error('happensAtDate')
                    <span class="error">{{ $message }}</span>
                @enderror
            </p>
            <p>
                @error('happensAtTime')
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
        <script src="pikaday.js"></script>
        <script>
            new Pikaday({ 
                field: document.getElementById('datepicker'),
                format:'YYYY-MM-DD',
                onSelect: function() {
                    var data = this.getDate();
                    @this.set('happensAtDate', data);
                }
            });
        </script>
        {{ $happensAtDate }}
    </form>
</div>
