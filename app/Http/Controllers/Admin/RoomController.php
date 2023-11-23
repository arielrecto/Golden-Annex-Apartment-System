<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Room;
use App\Notifications\NewBill;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $rooms = Room::get();

        return view('users.admin.room.index', compact(['rooms']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.admin.room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required',
            'floor' => 'required'
        ]);


        Room::create([
            'room_number' => $request->room_number,
            'floor' => $request->floor
        ]);


        return back()->with(['message' => 'Rood Added Success']);

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
    public function addBill(Request $request, string $id){



        $room = Room::find($id);

        $user = $room->user;

        $bill = Bill::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'due_date' => $request->due_date,
            'status' => 'Unpaid',
            'balance' => $request->amount,
            'room_id' => $room->id
        ]);

        $content = [
            'title' => 'New Bill ' . $bill->name,
            'amount' => $request->amount,
        ];

        $user->notify( new NewBill($content));

        return back()->with(['message' => 'Bill Added Successfully']);
    }
}
