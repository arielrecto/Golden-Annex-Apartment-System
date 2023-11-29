<?php

namespace App\Http\Controllers;

use App\Mail\InboxResponse;
use App\Models\Inbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $inboxes = Inbox::latest()->get();

        return view('users.admin.inbox.index', compact(['inboxes']));
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
            'email' => 'required',
            'description' => 'required'
        ]);

        Inbox::create([
            'email' => $request->email,
            'description' => $request->description
        ]);


        return back()->with(['message' => 'Request Sent!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inbox = Inbox::find($id);


        return view('users.admin.inbox.show', compact(['inbox']));
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
        $inbox = Inbox::find($id);
        $inbox->delete();
        return back();
    }
    public function sendEmail(Request $request){

        Mail::to($request->email)->send( new InboxResponse($request));



        return back()->with(['message' => 'email send!']);

    }
}
