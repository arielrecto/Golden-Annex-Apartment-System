<?php

namespace App\Http\Controllers\Tenant;

use App\Models\User;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\MaintenanceRequest;
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

       $adminRole = User::role('admin')->first();


       $imageName = 'MNTNNC-' . uniqid() . '.' . $request->image->extension();
       $dir = $request->image->storeAs('/maintenance', $imageName, 'public');


      $maintenance = Maintenance::create([
        'description' => $request->description,
        'time' => $request->time,
        'image' =>  asset('/storage/' . $dir),
        'room_id' => $user->room->id
       ]);

        $content = [
            'title' => 'New Maintenance',
            'content' => $maintenance->description
        ];


        $adminRole->notify(new MaintenanceRequest($content));


       return back()->with(['message' => 'Request Sent']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $maintenance = Maintenance::find($id);
        $status = $request->status;

        if($status !== null){

            $maintenance->update([
                'status' => $status,
                'status_message' => null
            ]);
        }



        return view('users.tenant.Maintenance.show', compact(['maintenance']));
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
        $maintenance = Maintenance::find($id);

        $maintenance->delete();


        return back()->with(['message' => 'Item Deleted !']);
    }
}
