<?php

namespace App\Http\Controllers;

use App\Mail\VehicleApproved;
use App\Models\Vehicle;
use App\Services\SendEmailService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApproveVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $vehicles = Vehicle::where('is_approved', false)->paginate();

        return view('approve-vehicle.index', compact('vehicles'))
            ->with('i', ($request->input('page', 1) - 1) * $vehicles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->update(['is_approved' => true, 'approved_by' => auth()->id()]);

        $content = new VehicleApproved($vehicle);
        $content = $content->render();
        SendEmailService::sendEmail($vehicle->user->email, 'Vehiculo Aprobado', $content);

        return redirect()->route('approve-vehicles.index')
            ->with('success', 'Vehiculo aprobado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
