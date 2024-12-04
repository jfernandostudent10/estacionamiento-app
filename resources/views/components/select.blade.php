@props([
    'id' => 'input-' . uniqid(),
    'disabled' => false,
    'label' => null,
    'required' => true,
    'options' => [],
])

@if($label)
    <x-label for="{{ $id }}" :value="$label" :required="$required" />
@endif

<select id="{{ $id }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control']) !!}>
    <option value="" selected>-- {{ __('lang.select') }} --</option>
    @foreach($options as $key => $option)
        <option value="{{ $key }}">{{ $option }}</option>
    @endforeach
</select>

@if($attributes->whereStartsWith('wire:model')->first())
    <x-input-error for="{{ $attributes->whereStartsWith('wire:model')->first() }}" class="mt-2" />
@endif