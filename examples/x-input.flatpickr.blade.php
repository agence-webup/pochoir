<x-input.flatpickr wire:model="date"></x-input.flatpickr>
@error('date')
    <span>{{ $message }}</span>
@enderror
