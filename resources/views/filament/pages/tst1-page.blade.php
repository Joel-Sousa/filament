<x-filament-panels::page>
Nome: {{ auth()->user()['name'] }}<br />
    tst
    {{-- {{ $this->data[0] }} --}}
    {{-- {{dd($this)}} --}}
    {{-- {{dd(auth()->user())}} --}}
    <x-filament-panels::form wire:submit="save">
        {{ $this->form }}
        <x-filament-panels::form.actions :actions="$this->getFormActions()" />
    </x-filament-panels::form>
</x-filament-panels::page>
