@props(['text' => __('lang.cancel') ])

<button type="button" {!! $attributes !!} class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
    <i class="fas fa-close"></i> {{ $text }}
</button>
