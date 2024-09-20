<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Feedback;
use App\Models\Broadcasts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    //
    public function stafflogin()
    {
        return view('staff.login'); // Assuming 'Staff.login' is the name of your login page view
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find Staff by email
        $staff = Staff::where('email', $credentials['email'])->first();

        // Check if Staff exists and password matches
        if  ($staff && Hash::check($credentials['password'], $staff->password)) {
            Auth::guard('staff')->login($staff);
            return redirect()->route('staff.dashboard');
        } else {
            return redirect()->route('staff')->withErrors([
                'email' => 'The provided credentials are incorrect.',
            ]);
        }
    }

    public function staffDashboard()
    {
        $broadcast = Broadcasts::all();



        $staffEmail = Auth::guard('staff')->user()->email;

        // Retrieve check-in information for the authenticated user's sender_id
        $feedback = Feedback::where('staffemail', $staffEmail)->get();

        $feedback = Feedback::all();

        return view('staff.Dashboard', compact('broadcast', 'feedback')); // Example: Load Staff dashboard view
    }

    public function logout(Request $request)
    {
        Auth::guard('staff')->logout(); // Logout the Staff user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect()->route('/staff/Login'); // Redirect to Staff login page
    }
    public function destroy(Request $request)
    {
        Auth::guard('staff')->logout(); // Logout the Staff user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect()->route('staff'); // Redirect to Staff login page
    }
    public function index()
    {
        return view('staff.register');
    }
    public function store(Request $request)
    {
        // Validate form inputs
        $validatedData = $request->validate([
            'fname' => 'required|string',
            'mname' => 'required|string',
            'sname' => 'required|string',
            'iden' => 'required|string|unique:staff',
            'phone' => 'required|string|unique:staff',
            'email' => 'required|string|unique:staff',
            'dept' => 'required|string',
            'des' => 'required|string',
            'password' => 'required|string',


                ]);
                $existingstaff = Staff::where('email', $validatedData['email'])
                ->orWhere('phone', $validatedData['phone'])
                ->orWhere('iden', $validatedData['iden'])
                ->first();

            if ($existingstaff) {
                // staff already exists, show error message
                return redirect()->back()->withErrors([
                    'email' => 'Do you already have an account?',
                    'iden' => 'Do you already have an account?',
                    'phone' => 'Do you already have an account?',
                ]);
            }


        $staff = new Staff();
        $staff->fname = $validatedData['fname'];
        $staff->mname = $validatedData['mname'];
        $staff->sname = $validatedData['sname'];
        $staff->iden = $validatedData['iden'];
        $staff->phone = $validatedData['phone'];
        $staff->email = $validatedData['email'];
        $staff->dept = $validatedData['dept'];
        $staff->des = $validatedData['des'];


        $staff->password =  Hash::make($validatedData['password']);

        $staff->save();

        // Redirect back with a success message
        if ($staff->save()) {
            // Redirect back with a success message
            return redirect()->back()->with('success', 'You have regisatred to the KSG device request system. Welcome!');
        } else {
            // Redirect back with an error message in case of failure
            return redirect()->back()->withErrors([
                'general' => 'An error occurred while storing data. Please try again later.',
            ]);
        }
    }


    public function staff(Request $request)

    {
    $staff = $request->staff;


    // Return a response or pass the data to the view
    return view('admin.staff', compact('staff'));

    }

    public function addstaff(Request $request)

    {
    $staff = $request->staff;


    // Return a response or pass the data to the view
    return view('admin.staff', compact('staff'));

    }

    public function index2()
    {
        return view('admin.add_staff');
    }

    public function delete($id)
    {
        // Find the staff record by its ID
        $staff = Staff::find($id);

        // Check if the staff record exists
        if (!$staff) {
            return back()->with('error', 'Staff data not found.');
        }

        // Attempt to delete the staff record
        try {
            $staff->delete();
            return back()->with('success', 'Staff data deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error in deleting staff data. Try again later.');
        }
    }

    public function edit($id)
    {

        $staff = Staff::find($id);


        return view('admin.staffedit', compact('staff'));
    }
    public function update(Request $request, $id)
    {
        // Handle GET request to fetch the check-in record

        $staff = Staff::findOrFail($id);

        // Handle PUT request to update the check-in record
        $validatedData = $request->validate([

            'fname' => 'nullable|string',
            'mname' => 'nullable|string',
            'sname' => 'nullable|string',
            'iden' => 'nullable|string|unique:admin,iden,' . $id,
            'phone' => 'nullable|string|unique:admin,phone,' . $id,
            'email' => 'nullable|string|unique:admin,email,' . $id,
            'dept' => 'nullable|string',
            'des' => 'nullable|string',
            'password' => 'nullable|string',

            // Add other validation rules as needed
        ]);
        

        $staff->update(array_filter($validatedData));

        return redirect()->route('admin.staff.update', ['id' => $staff->id])->with('success', 'You have successfully updated the staff details.');
    }

    public function profile(Request $request)

    {
    $staff = $request->staff;


    // Return a response or pass the data to the view
    return view('staff.profile', compact('staff'));

    }

    public function selfedit()
    {
        $staff = Auth::guard('staff')->user();

        return view('staff.edit', compact('staff'));
    }
    public function selfupdate(Request $request)
    {
        // Handle GET request to fetch the check-in record
        $staff = Auth::guard('staff')->user();

        // Handle PUT request to update the check-in record
        $validatedData = $request->validate([

            'fname' => 'nullable|string',
            'mname' => 'nullable|string',
            'sname' => 'nullable|string',
            'iden' => 'nullable|string|unique:admin,iden,'. $staff->id,
            'phone' => 'nullable|string|unique:admin,phone,'. $staff->id,
            'email' => 'nullable|string|unique:admin,email,'. $staff->id,
            'dept' => 'nullable|string',
            'des' => 'nullable|string',
          'password' => 'nullable|string',
            // Add other validation rules as needed
        ]);

        $staff->update([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'sname' => $request->sname,
            'iden' => $request->iden,
            'phone' => $request->phone,
            'email' => $request->email,
            'dept' => $request->dept,
            'des' => $request->des,
            
        ]);
        if (!empty($validatedData['password'])) {
            $updateData['password'] = Hash::make($validatedData['password']);
        }
    

        return redirect()->route('staff.profile.edit')->with('success', 'You have successfully updated your profile details.');
    }


    public function passedit()
    {

        $staff = Auth::guard('staff')->user();

        return view('staff.passedit', compact('staff'));

    }

    public function passupdate(Request $request)
    {
        // Validate the input
        $request->validate([
            'cpassword' => 'required',
            'npassword' => 'required|string|min:8|confirmed',
        ]);

        $staff = Auth::guard('staff')->user();

        // Check if the current password is correct
        if (!Hash::check($request->cpassword, $staff->password)) {
            return back()->withErrors(['cpassword' => 'The current password is incorrect.']);
        }

        // Update the password
        $staff->password = Hash::make($request->npassword);
        $staff->save();

        return back()->with('success', 'Password updated successfully.');
    }
    public function userupdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
    
        
        $staff = Auth::guard('staff')->user();
    
        // Check if the provided current password matches the authenticated participant's password
        if (!Hash::check($request->current_password, $staff->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The provided current password is incorrect.']);
        }
    
        // Update the participant's password
        $staff->password = Hash::make($request->password);
        $staff->save();
    
        return redirect()->route('staff')->with('success', 'Password updated successfully.');
    
    }

}

