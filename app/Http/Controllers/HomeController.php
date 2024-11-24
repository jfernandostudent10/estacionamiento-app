<?php

namespace App\Http\Controllers;

use App\Models\ParkingSite;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $parkingSites = ParkingSite::wheredate('date', Carbon::now())->get();
        // count with status 0
        $availableParkingSites = $parkingSites->where('status', 0)->count();
        return view('home', compact('parkingSites', 'availableParkingSites'));
    }
}
