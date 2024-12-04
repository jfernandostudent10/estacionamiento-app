@props([
    'id' => 'input-' . uniqid(),
    'disabled' => false,
    'label' => null,
    'required' => true,
])

@if($label)
    <x-label for="{{ $id }}" :value="$label" :required="$required" />
@endif

<input id="{{ $id }}" {{ $disabled ? 'disabled' : '' }}  {!! $attributes->merge(['class' => 'form-control']) !!}>

@if($attributes->whereStartsWith('wire:model')->first())
    <x-input-error for="{{ $attributes->whereStartsWith('wire:model')->first() }}" class="mt-2" />
@endif