<?php

use function Livewire\Volt\{rules, state};

state(['message' => '']);

rules(['message' => 'required|string|max:255']);

$store = function () {

    dump($this->message); //show empty string ("")

    $validated = $this->validate();
    auth()->user()->chirps()->create($validated);
    $this->message = '';
    $this->dispatch('chirp-created');
}

?>

<div>
    <form wire:submit="store">
        <div wire:ignore>
            <x-easy-mde name="chirp"
                wire:model="message"
                class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-opacity-50 focus:ring-indigo-200"
                wire:key="message"
            />
        </div>
        <x-input-error :messages="$errors->get('message')" class="mt-2"></x-input-error>
        <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>
    </form>
    <hr />
</div>