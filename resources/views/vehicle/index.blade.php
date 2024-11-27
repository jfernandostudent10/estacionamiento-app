
<x-app-layout>

    <x-slot name="title">
        {{ __('Vehículos') }}
    </x-slot>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Vehículos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('vehicles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Crear nuevo vehículo
                                </a>
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
									<th >¿Está aprobado?</th>
									<th >Aprobado por</th>

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
										<td >{{ $vehicle->getIsApprovedLabel() }}</td>
										<td >{{ $vehicle->getApprovedByLabel() }}</td>

                                            <td>
                                                <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('vehicles.show', $vehicle->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('vehicles.edit', $vehicle->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Está seguro?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> Borrar</button>
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
</x-layouts.app>