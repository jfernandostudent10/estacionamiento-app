<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VehicleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $vehicles = Vehicle::paginate();

        return view('vehicle.index', compact('vehicles'))
            ->with('i', ($request->input('page', 1) - 1) * $vehicles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $vehicle = new Vehicle();

        return view('vehicle.create', compact('vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleRequest $request): RedirectResponse
    {
        Vehicle::create($request->validated());

        return Redirect::route('vehicles.index')
            ->with('success', 'Vehiculo creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $vehicle = Vehicle::find($id);

        return view('vehicle.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $vehicle = Vehicle::find($id);

        return view('vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleRequest $request, Vehicle $vehicle): RedirectResponse
    {
        $vehicle->update($request->validated());

        return Redirect::route('vehicles.index')
            ->with('success', 'Vehiculo actualizado correctamente');
    }

    public function destroy($id): RedirectResponse
    {
        Vehicle::find($id)->delete();

        return Redirect::route('vehicles.index')
            ->with('success', 'Vehiculo eliminado correctamente');
    }
}
