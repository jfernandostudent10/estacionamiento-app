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
                                    <strong>Tipo Vehículo:</strong>
                                    {{ $vehicle->vehicle_type }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Placa:</strong>
                                    {{ $vehicle->plate }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>¿Persona con discapacidad?:</strong>
                                    {{ $vehicle->disabled_person }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>¿Cuenta con distintivo vehicular otorgado por el conadis?:</strong>
                                    {{ $vehicle->has_conadis_distinctive }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha de registro:</strong>
                                    {{ $vehicle->application_date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>¿Está aprobado?:</strong>
                                    {{ $vehicle->is_approved }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Aprobado por:</strong>
                                    {{ $vehicle->approved_by }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
