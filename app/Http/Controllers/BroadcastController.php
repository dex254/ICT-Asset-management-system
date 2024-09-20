<?php

namespace App\Http\Controllers;

use App\Models\Broadcasts;
use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    public function broadcast()
    {
        return view('admin.broadcast'); // Assuming 'Admin.login' is the name of your login page view
    }

    public function store(Request $request)
    {
        // Validate the uploaded file
        $validatedData=$request->validate([
            'title' => 'required|string',
            'message' => 'required|string',
            'category' => 'required|string',
            'SD' => 'nullable|date',
            'ED' => 'nullable|date',

        ]);


        // Create a new record record
        $broadcast = new Broadcasts();

        $broadcast->fill($validatedData);
        $broadcast->save();

        return redirect()->back()->with('success', 'You have successfully sent out a new broadcast!!');

    }

    public function broadcastview(Request $request)

    {
    $broadcast = $request->broadcast;


    // Return a response or pass the data to the view
    return view('admin.broadcasts', compact('broadcast'));

    }

    public function delete($id)
    {
        // Find the broadcast record by its ID
        $broadcast = Broadcasts::find($id);

        // Check if the staff record exists
        if (!$broadcast) {
            return back()->with('error', 'Broadcast not found.');
        }

        // Attempt to delete the staff record
        try {
            $broadcast->delete();
            return back()->with('success', 'Broadcast deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error in deleting broadcast data. Try again later.');
        }
    }
}
