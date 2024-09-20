<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Broadcasts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function adminlogin()
    {
        return view('admin.login'); // Assuming 'Admin.login' is the name of your login page view
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find Admin by email
        $admin = Admin::where('email', $credentials['email'])->first();

        // Check if Admin exists and password matches
        if  ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin')->withErrors([
                'email' => 'The provided credentials are incorrect.',
            ]);
        }
    }

    public function adminDashboard()
    {
        $broadcast = Broadcasts::all();


        return view('admin.Dashboard', compact('broadcast')); // Example: Load Admin dashboard view

    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // Logout the Admin user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect()->route('admin'); // Redirect to Admin login page
    }

    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout(); // Logout the Admin user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect()->route('admin'); // Redirect to Admin login page
    }


    public function index()
    {
        return view('admin.register');

    }

    public function index2()
    {
        return view('admin.add_admin');

    }
    public function store(Request $request)
    {
        // Validate form inputs
        $validatedData = $request->validate([
            'fname' => 'required|string',
            'mname' => 'required|string',
            'sname' => 'required|string',
            'iden' => 'required|string|unique:admin',
            'phone' => 'required|string|unique:admin',
            'email' => 'required|string|unique:admin',
            'dept' => 'required|string',
            'des' => 'required|string',
            'password' => 'required|string',


                ]);
                $existingadmin = Admin::where('email', $validatedData['email'])
                ->orWhere('phone', $validatedData['phone'])
                ->orWhere('iden', $validatedData['iden'])
                ->first();

            if ($existingadmin) {
                // admin already exists, show error message
                return redirect()->back()->withErrors([
                    'email' => 'Do you already have an account?',
                    'iden' => 'Do you already have an account?',
                    'phone' => 'Do you already have an account?',
                ]);
            }


        $admin = new Admin();
        $admin->fname = $validatedData['fname'];
        $admin->mname = $validatedData['mname'];
        $admin->sname = $validatedData['sname'];
        $admin->iden = $validatedData['iden'];
        $admin->phone = $validatedData['phone'];
        $admin->email = $validatedData['email'];
        $admin->dept = $validatedData['dept'];
        $admin->des = $validatedData['des'];


        $admin->password =  Hash::make($validatedData['password']);

        $admin->save();

        // Redirect back with a success message
        if ($admin->save()) {
            // Redirect back with a success message
            return redirect()->back()->with('success', 'You have regisatred to the KSG device request system. Welcome!');
        } else {
            // Redirect back with an error message in case of failure
            return redirect()->back()->withErrors([
                'general' => 'An error occurred while storing data. Please try again later.',
            ]);
        }
    }

    public function admins(Request $request)

    {
    $admin = $request->admin;


    // Return a response or pass the data to the view
    return view('admin.admins', compact('admin'));

    }

    public function addadmins(Request $request)

    {
    $admin = $request->admin;


    // Return a response or pass the data to the view
    return view('admin.admins', compact('admin'));

    }

    public function delete($id)
    {
        // Find the admin record by its ID
        $admin = Admin::find($id);

        // Check if the admin record exists
        if (!$admin) {
            return back()->with('error', 'Admin data not found.');
        }

        // Attempt to delete the admin record
        try {
            $admin->delete();
            return back()->with('success', 'Admin data deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error in deleting admin data. Try again later.');
        }
    }

    public function profile(Request $request)

    {
    $admin = $request->admin;


    // Return a response or pass the data to the view
    return view('admin.profile', compact('admin'));

    }

    public function selfedit()
    {
        $admin = Auth::guard('admin')->user();

        return view('admin.edit', compact('admin'));
    }
    public function selfupdate(Request $request)
    {
        // Handle GET request to fetch the check-in record
        $admin = Auth::guard('admin')->user();

        // Handle PUT request to update the check-in record
        $validatedData = $request->validate([

            'fname' => 'nullable|string',
            'mname' => 'nullable|string',
            'sname' => 'nullable|string',
            'iden' => 'nullable|string|unique:admin,iden,'. $admin->id,
            'phone' => 'nullable|string|unique:admin,phone,'. $admin->id,
            'email' => 'nullable|string|unique:admin,email,'. $admin->id,
            'dept' => 'nullable|string',
            'des' => 'nullable|string',

            // Add other validation rules as needed
        ]);

        $admin->update([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'sname' => $request->sname,
            'iden' => $request->iden,
            'phone' => $request->phone,
            'email' => $request->email,
            'dept' => $request->dept,
            'des' => $request->des,
        ]);

        return redirect()->route('admin.profile.edit')->with('success', 'You have successfully updated your profile details.');
    }

    public function uadminupdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
    
        
        $admin = Auth::guard('admin')->user();
    
        // Check if the provided current password matches the authenticated participant's password
        if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The provided current password is incorrect.']);
        }
    
        // Update the participant's password
        $admin->password = Hash::make($request->password);
        $admin->save();
    
        return redirect()->route('admin')->with('success', 'Password updated successfully.');
    
    }
}
