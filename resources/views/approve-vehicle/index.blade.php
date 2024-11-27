<x-app-layout>

    <x-slot name="title">
        {{ __('Vehículos por aprobar') }}
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Vehículos por aprobar') }}
                            </span>

                            <div class="float-right">

                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                <tr>

                                    <th >Tipo Vehículo</th>
                                    <th >Placa</th>
                                    <th >¿Persona con discapacidad?</th>
                                    <th >¿Cuenta con distintivo vehicular otorgado por el conadis?</th>
                                    <th >Fecha de registro</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($vehicles as $vehicle)
                                    <tr>
                                        <td >{{ $vehicle->vehicle_type }}</td>
                                        <td >{{ $vehicle->plate }}</td>
                                        <td >{{ $vehicle->getDisabledPersonLabel() }}</td>
                                        <td >{{ $vehicle->getHasConadisDistinctiveLabel() }}</td>
                                        <td >{{ $vehicle->application_date }}</td>

                                        <td>
                                            <form method="POST" action="{{ route('approve-vehicles.update', $vehicle->id) }}"  role="form" enctype="multipart/form-data">
                                                {{ method_field('PATCH') }}
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm" onclick="event.preventDefault(); confirm('Está seguro?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Aprobar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $vehicles->withQueryString()->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
