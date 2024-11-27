<x-app-layout>

    <x-slot name="title">
        Crear Vehiculo
    </x-slot>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Vehiculo</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('vehicles.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('vehicle.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
