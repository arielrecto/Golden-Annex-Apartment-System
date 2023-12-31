<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // dd($request->all());

        $bills = Bill::latest()->get();

        $billMonthsQuery = $request->month;

        $billName = $request->name;


        if($billMonthsQuery !== null){
            $bills = Bill::whereMonth('created_at', $billMonthsQuery)->latest()->get();
        }


        if($billName !== null && $billMonthsQuery !== null){
            $bills = Bill::where('name', $billName)->whereMonth('created_at', $billMonthsQuery)->latest()->get();
        }


        return view('users.admin.bill.index', compact(['bills']));
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
    public function show(string $id)
    {
        $bill = Bill::find($id);


        return view('users.admin.bill.show', compact(['bill']));
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

    }
}
