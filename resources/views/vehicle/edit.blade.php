<x-app-layout>

    <x-slot name="title">
        Editar Vehiculo
    </x-slot>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Vehiculo</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('vehicles.update', $vehicle->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('vehicle.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
</x-layouts.app>