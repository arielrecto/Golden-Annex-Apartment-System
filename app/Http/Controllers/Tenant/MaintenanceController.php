<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $maintenances = Maintenance::latest()->get();

        return view('users.tenant.Maintenance.index', compact(['maintenances']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.tenant.Maintenance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'description' => 'required',
        'time' => 'required',
        'image' => 'required'
       ]);

       $user = Auth::user();


       $imageName = 'MNTNNC-' . uniqid() . '.' . $request->image->extension();
       $dir = $request->image->storeAs('/maintenance', $imageName, 'public');


       Maintenance::create([
        'description' => $request->description,
        'time' => $request->time,
        'image' =>  asset('/storage/' . $dir),
        'room_id' => $user->room->id
       ]);


       return back()->with(['message' => 'Request Sent']);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
