<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    //
    public function deviceadd()
    {
        return view('admin.device'); // Assuming 'Admin.login' is the name of your login page view
    }

    public function store(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'images.*' =>  'required',

            'model' => 'required|string',
            'desc' => 'required|string',
            'sno' => 'required|string|unique:device',
            'tag' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|string',
            'con' => 'required|string',

        ]);

       $imageNames = [];

       // Store the image in the public/uploads folder
       if ($request->hasFile('images')) {
           // Store the images in the public/uploads/rooms folder
           foreach ($request->file('images') as $key => $image) {
               $imageName = time() . '_' . $key . '.' . $image->getClientOriginalExtension();
               $image->move(public_path('uploads/devices'), $imageName);
               $imageNames[] = $imageName;
           }

           // Ensure all image slots are filled, replace unfilled slots with null
           $imageFields = ['image_name1', 'image_name2', 'image_name3'];
           for ($i = count($imageNames); $i < count($imageFields); $i++) {
               $imageNames[] = null;
           }
       }


        // Save the image details to the database
        Device::create([
            'image_name1' => $imageNames[0] ?? null,
            'image_name2' => $imageNames[1] ?? null,
            'image_name3' => $imageNames[2] ?? null,
            'model' => $request->model,
            'desc' => $request->desc,
            'sno' => $request->sno,
            'tag' => $request->tag,
            'category' => $request->category,
            'status' => $request->status,
            'con' => $request->con,

        ]);
        session()->flash('success', 'Item saved successfully.');

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

    public function devices(Request $request)

    {
    $devices = $request->devices;


    // Return a response or pass the data to the view
    return view('admin.devices', compact('devices'));

    }

    public function alldevices(Request $request)

    {
    $devices = $request->devices;


    // Return a response or pass the data to the staff view
    return view('admin.alldevices', compact('devices'));

    }

    public function delete($id)
    {
        // Find the staff record by its ID
        $devices = Device::find($id);

        // Check if the staff record exists
        if (!$devices) {
            return back()->with('error', 'Device not found.');
        }

        // Attempt to delete the staff record
        try {
            $devices->delete();
            return back()->with('success', 'Device deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error in deleting device. Try again later.');
        }
    }

    public function edit($id)
    {
        $devices = Device::find($id);


        return view('admin.devedit', compact('devices'));
    }

    public function update(Request $request, $id)
    {
        // Handle GET request to fetch the allocation record

        $devices = Device::findOrFail($id);

        // Handle PUT request to update the allocation record
        $validatedData = $request->validate([

            'model' => 'nullable|string',
            'desc' => 'nullable|string',
            'tag' => 'nullable|string',
            'category' => 'nullable|string',
            'status' =>'nullable|string',
            'con' => 'nullable|string',
            // Add other validation rules as needed
        ]);

        $devices->update(array_filter($validatedData));

        return redirect()->route('admin.device.update', ['id' => $devices->id])->with('success', 'You have successfully updated the device details.');
    }

    public function eachdev($id)
    {

    // Fetch the device by ID
    $devices = Device::findOrFail($id);

    // Return a response or pass the data to the staff view
    return view('admin.eachdev', compact('devices'));

    }


    public function myalldev(Request $request)
    {
        // Get the iden of the logged-in staff user
        $Iden = Auth::guard('staff')->user()->iden;

        // Retrieve devices allocated to the authenticated user with 'Active' status
        $devices = Device::join('allocations', 'devices.sno', '=', 'allocations.sno')
                        ->where('allocations.iden', $Iden)
                        ->where('allocations.status', 'Active')
                        ->select('devices.*',
                                'allocations.status as allocation_status',
                                'allocations.event',
                                'allocations.ADate',
                                'allocations.ERD') // Include additional fields from allocations
                        ->get();

        // Return the view with the devices data
        return view('staff.myalldevs', compact('devices'));
    }


    public function myretdev(Request $request)
    {
        // Get the iden of the logged-in staff user
        $Iden = Auth::guard('staff')->user()->iden;

        // Retrieve devices allocated to the authenticated user with 'Complete' or 'Suspended' status
        $devices = Device::join('allocations', 'devices.sno', '=', 'allocations.sno')
                        ->join('devreturns', 'devices.sno', '=', 'devreturns.sno')
                        ->where('allocations.iden', $Iden)
                        ->whereIn('allocations.status', ['Complete', 'Suspended'])
                        ->select('devices.*',
                                'allocations.status as allocation_status',
                                'allocations.event',
                                'allocations.ADate',
                                'devreturns.RDate')
                        ->get();

        // Return the view with the devices data
        return view('staff.myretdevs', compact('devices'));
    }
    public function staffdevices(Request $request)

    {
    $devices = $request->devices;


    // Return a response or pass the data to the staff view
    return view('device.staffdevices', compact('devices'));

    }
    public function devicedetail($id)
    {

    // Fetch the device by ID
    $devices = Device::findOrFail($id);

    // Return a response or pass the data to the staff view
    return view('device.devicedetail', compact('devices'));

    }



}
