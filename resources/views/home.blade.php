@extends('layouts.app')

@section('content')
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
                    <div class="card-body">
                        <div class="display-1 text-primary text-center">{{ str_pad($site->number, 2, "0", STR_PAD_LEFT) }}</div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection