@props([
    'name' => __('lang.save'),
    'type' => "submit",
    'icon' => "fas fa-save",
    'target' => null,
    'class' => 'btn btn-primary'
 ])

<button
        {{ $attributes }}
        wire:loading.class="opacity-50"
        type="{{ $type }}"
        class="{{ $class }}"
>
    <i class="{{ $icon }}"></i>
    {{ $name }}
    <div wire:loading.delay @if($target) wire:target="{{ $target }}" @endif>
        <span aria-hidden="true" class="spinner-border spinner-border-sm" role="status"></span>
    </div>
</button>
