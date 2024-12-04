@props([
    'type' => 'submit',
])
<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn btn-primary _effect--ripple waves-effect waves-light']) }}>
    {{ $slot }}
</button>
