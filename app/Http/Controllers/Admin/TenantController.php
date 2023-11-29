<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tenants = User::role('tenant')->get();

        return view('users.admin.tenant.index', compact(['tenants']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $rooms = Room::whereStatus('Available')->get();

        return view('users.admin.tenant.create', compact(['rooms']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'household_people' => 'required'
        ]);

        $tenantRole = Role::where('name', 'tenant')->first();

        $user = User::create([
            'name' => $request->last_name . ', ' . $request->first_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        $user->assignRole($tenantRole);


        Profile::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name == null ? 'N\A' : $request->middle_name,
            'age' => $request->age,
            'sex' => $request->sex,
            'user_id' => $user->id
        ]);



        $room = Room::find($request->room);


        $room->update([
            'user_id' => $user->id,
            'household_people' => $request->household_people,
            'status' => 'Unavailable'
        ]);

        return back()->with(['message' => 'Tenant Added Success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tenant = User::find($id);


        $bills = Bill::where('room_id', $tenant->room->id)->get();


        return view('users.admin.tenant.show', compact(['tenant','bills']));
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
        $tenant = User::find($id);


        $tenant->room->update(['status' => 'Available', 'user_id' => null, 'household_people' => null]);


        $tenant->delete();


        return back()->with(['message' => 'Tenant Removed!']);
    }
}
