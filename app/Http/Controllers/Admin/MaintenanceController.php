<?php

namespace App\Http\Controllers\Admin;

use App\Enums\MaintenanceStatus;
use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenances = Maintenance::latest()->get();


        return view('users.admin.maintenance.index', compact(['maintenances']));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {

        $maintenance = Maintenance::find($id);

        $status = $request->status;

        if($status !== null){

            $massage =  'Available Date: '. $request->date  . ' ' . $request->message;

            if(MaintenanceStatus::ACCEPT->value === $status){
                $massage = "Your Request is Accepted";
            }


            $maintenance->update([
                'status' => $status,
                'status_message' => $massage
            ]);



            return view('users.admin.maintenance.show', compact(['maintenance']))->with(['message' => "Maintenance Request Status " . $status]);

        }


        return view('users.admin.maintenance.show', compact(['maintenance']));
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
