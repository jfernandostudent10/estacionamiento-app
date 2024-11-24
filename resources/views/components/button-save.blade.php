@props([
    'name' => __('lang.save'),
    'type' => 'submit',
    'icon' => 'fas fa-save',
    'target' => null,
    'loader' => false,
])

@if($slot->isEmpty())
    <button
            {{ $attributes }}
            wire:loading.class="opacity-50"
            type="{{ $type }}"
            class="btn btn-primary"
    >
        <i class="{{ $icon }}"></i>
        {{ $name }}
        <div wire:loading.delay @if($target) wire:target="{{ $target }}" @endif>
            <span aria-hidden="true" class="spinner-border spinner-border-sm" role="status"></span>
        </div>

        @if($loader)
            <span aria-hidden="true" class="spinner-border spinner-border-sm" role="status"></span>
        @endif
    </button>
@else
    {{ $slot }}
@endif
