@extends('layouts.app')

@section('template_title')
    {{ $vehicle->name ?? __('Show') . " " . __('Vehicle') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Vehicle</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('vehicles.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Vehicle Type:</strong>
                                    {{ $vehicle->vehicle_type }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Plate:</strong>
                                    {{ $vehicle->plate }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Disabled Person:</strong>
                                    {{ $vehicle->disabled_person }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Has Conadis Distinctive:</strong>
                                    {{ $vehicle->has_conadis_distinctive }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Application Date:</strong>
                                    {{ $vehicle->application_date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Is Approved:</strong>
                                    {{ $vehicle->is_approved }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Approved By:</strong>
                                    {{ $vehicle->approved_by }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $vehicle->user_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
