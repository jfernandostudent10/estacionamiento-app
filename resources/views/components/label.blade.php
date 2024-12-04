@props(['value', 'required' => true])

<label {{ $attributes->merge(['class' => 'form-label']) }}>
    {{ $value ?? $slot }}  @if($required) <span class="text-danger">*</span> @endif
</label>
