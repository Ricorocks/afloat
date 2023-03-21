<x-marina.layouts.layout>
    <div class="text-lg font-bold">Berths Manager</div>
    <div class="grid grid-cols-4">
        <div class="col-span-3">
            <livewire:marina.berths.manage :marina="$marina" />
        </div>
        <livewire:marina.berths.add :marina="$marina" />
    </div>
</x-marina.layouts.layout>
