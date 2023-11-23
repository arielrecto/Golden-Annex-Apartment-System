<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\User;
use App\Notifications\NewAnnouncement;
use Illuminate\Http\Request;

class AnnoucementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $announcements = Announcement::get();

        return view('users.admin.announcement.index', compact(['announcements']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('users.admin.announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $users = User::role('tenant')->get();

        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);


       $appointment = Announcement::create([
        'title' => $request->title,
        'description' => $request->description
       ]);


       $content = [
        'title' => $appointment->title,
        'content' => $appointment->description
       ];


       foreach($users as $user){
            $user->notify(new NewAnnouncement($content));
       }


       return back()->with(['message' => 'Announcement Posted!']);
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
        $announcement = Announcement::find($id);

        $announcement->delete();



        return back()->with(['message' => 'Item Deleted!']);
    }
}
