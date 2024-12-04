<div wire:poll.60s>
    <div class="page-title-container mb-3">
        <div class="row">
            <!-- Title Start -->
            <div class="col mb-2">
                <h1 class="mb-2 pb-0 display-4" id="title">Home</h1>
            </div>

            <div class="col-12 col-sm-auto d-flex align-items-center justify-content-end">

            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12">
            <h1 class="mb-0 pb-0 display-4">Sitios disponibles: <strong>{{ $availableParkingSites }}</strong></h1>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4">
        @foreach($parkingSites as $site)
            <div class="col mb-5">
                <div class="card h-100">
                    @role('vigilant')
                    <span class="rounded-pill  me-1 position-absolute e-3 t-n2 z-index-1">
                        <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" {{ $site->status ? 'checked' : '' }} id="flexSwitchCheckChecked-{{ $loop->index }}" wire:change="updateStatus({{ $site->id }})">
                        <label class="form-check-label" for="flexSwitchCheckChecked-{{ $loop->index }}">{{ $site->status ? 'Ocupado' : 'Libre' }}</label>
                      </div>
                    </span>
                    @endrole
                    <div class="card-body {{ $site->status ? 'bg-danger-subtle' : 'bg-success-subtle' }} rounded">
                        <div class="display-1 text-primary text-center">{{ str_pad($site->number, 2, "0", STR_PAD_LEFT) }}</div>
                        <div class="display-6 text-primary text-center">{{ $site->status ?  $site->parking_reserveds->last()?->start_time->diffForHumans() : '' }}</div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    @push('modals')
        @role('vigilant')
            @livewire('modal-parking-reserved-user')
        @endrole
    @endpush
</div>
