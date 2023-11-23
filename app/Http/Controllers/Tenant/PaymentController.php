<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'ref_number',
            'image'
        ]);



        $imageName = 'PYMNT-' . uniqid() . '.' . $request->image->extension();
        $dir = $request->image->storeAs('/payment', $imageName, 'public');

        Payment::create([
            'ref_number' => $request->ref_number,
            'image' =>  asset('/storage/' . $dir),
            'bill_id' => $request->bill_id
        ]);


        return back()->with(['message' => 'Payment Success']);
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
