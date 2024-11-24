@props(['modalName' => ""])
@props(['modalTitle' => ""])
@props(['actionClose' => null])
<div>
    <div wire:ignore.self class="modal fade" id="{{ $modalName }}" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="{{ $modalName }}-label" aria-hidden="true">
        <div {!! $attributes->merge(['class' => 'modal-dialog modal-dialog-centered']) !!}>
            <div class="modal-content">
                <div class="modal-header py-16 px-24 border border-top-0 border-start-0 border-end-0">
                    <h5 class="modal-title fs-5" id="{{ $modalName }}-label">{{ $modalTitle }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            @if($actionClose) wire:click="{{ $actionClose }}" @endif
                            aria-label="Close">
                    </button>
                </div>

                {{ $slot }}

                @isset($modalBody)
                    <div class="modal-body">
                        {{ $modalBody }}
                    </div>
                @endisset

                @isset($modalFooter)
                    <div class="modal-footer">
                        {{ $modalFooter }}
                    </div>
                @endisset
            </div>
        </div>
    </div>
</div>
