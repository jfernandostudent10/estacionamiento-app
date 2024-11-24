@props([
    'id' => 'input-text-' . uniqid(),
    'required' => true,
    'label' => null,
    'type' => "text",
    'help' => null,
])

@if($label)
    <label for="{{ $id }}" class="form-label">{{ $label }} @if(!$required)
            {{__('lang.optional')}}
        @endif @if($required)
            <span class="text-danger">*</span>
        @endif</label>
@endif

@if ($slot->isEmpty())
    <input
            id="{{ $id }}"
            autocomplete="off"
            type="{{ $type }}"
            {!! $attributes->merge(['class' => 'form-control']) !!}
    >
    @if($help)
        <small class="text-sm mt-1 mb-0">{{ $help }}</small>
    @endif
@else
    {{ $slot }}
@endif

@if($attributes->whereStartsWith('wire:model')->first())
    <div>@error($attributes->whereStartsWith('wire:model')->first()) <span
                class="text-danger">{{ $message }}</span> @enderror</div>
@endif