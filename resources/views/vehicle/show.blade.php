<x-app-layout>

    <x-slot name="title">
        Mostrar Vehículo
    </x-slot>
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
                                    {{ $vehicle->getDisabledPersonLabel() }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>¿Cuenta con distintivo vehicular otorgado por el conadis?:</strong>
                                    {{ $vehicle->getHasConadisDistinctiveLabel() }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha de registro:</strong>
                                    {{ $vehicle->application_date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>¿Está aprobado?:</strong>
                                    {{ $vehicle->getIsApprovedLabel() }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Aprobado por:</strong>
                                    {{ $vehicle->getApprovedByLabel() }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
</x-layouts.app>