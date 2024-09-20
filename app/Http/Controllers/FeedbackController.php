<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function sendfeed()
    {
        return view('staff.feedback'); // Assuming 'Staff.login' is the name of your login page view
    }

    public function store(Request $request)
    {
        // Validate the uploaded file
        $validatedData=$request->validate([
            'staffiden'=> 'required|exists:staff,iden',
            'staffname' => 'required|string',
            'staffphone' => 'required|exists:staff,phone',
            'staffemail' =>'required|exists:staff,email',
            'date' => 'required|date',
            'subject' => 'required|string',
            'message' => 'required|string',
            'reply' => 'nullable|string',
            'replydate' => 'nullable|date',
            'adminname' => 'nullable|string',
            'adminphone' => 'nullable|string',
            'adminemail' => 'nullable|string',

        ]);


        // Create a new record record
        $feedback = new Feedback();

        $feedback->fill($validatedData);
        $feedback->save();

        return redirect()->back()->with('success', 'You have successfully sent feedback to KSG ICT administrators');

    }

    public function allfeed(Request $request)

    {
    $feedback = $request->feedback;


    // Return a response or pass the data to the view
    return view('admin.all_feedback', compact('feedback'));

    }

    public function reply()
    {

        $staffiden = Auth::guard('staff')->user()->iden;

        // Retrieve all the information for the authenticated user's ID
        $feedback = Feedback::where('staffiden', $staffiden)->get();

        return view('admin.reply', compact('feedback'));
    }

    public function edit($id)
    {
        $feedback = Feedback::find($id);


        return view('admin.reply', compact('feedback'));
    }

    public function update(Request $request, $id)
    {
        // Handle GET request to fetch the feedback record


        // Handle PUT request to update the feedback record
        $validatedData = $request->validate([

            'reply' => 'required|string',
            'replydate' => 'required|date',
            'adminname' => 'required|string',
            'adminphone' => 'required|string',
            'adminemail' => 'required|string',
            // Add other validation rules as needed
        ]);



        $feedback = Feedback::findOrFail($id);

        $feedback->update($validatedData);

        return redirect()->route('admin.reply.update', ['id' => $feedback->id])->with('success', 'You have successfully replied to this message.');
    }

    public function delete($id)
    {
        // Find the staff record by its ID
        $feedback = Feedback::find($id);

        // Check if the staff record exists
        if (!$feedback) {
            return back()->with('error', 'Feedback not found.');
        }

        // Attempt to delete the staff record
        try {
            $feedback->delete();
            return back()->with('success', 'Feedback deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error in deleting feedback. Try again later.');
        }
    }

    public function myfeed(Request $request)
    {
        $Iden = Auth::guard('staff')->user()->iden;

        // Retrieve check-in information for the authenticated user's sender_id
        $feedback = Feedback::where('staffiden', $Iden)->get();

    // Return a response or pass the data to the view
        return view('staff.myfeed', compact('feedback'));
    }

}
