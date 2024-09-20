<?php

namespace App\Http\Controllers;


use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Device;
use App\Models\Allocation;
use App\Models\Devrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AllocationsExport;

class AllocationController extends Controller
{
    public function allocate($id)
    {
        // Fetch the Devrequest record
        $devrequest = Devrequest::findOrFail($id);

        // Fetch all available devices
        $devices = Device::where('status', 'Available')->get();

        // Manually group devices by their type
        $devicesByCat = [];
        foreach ($devices as $device) {
            $category = $device->category;
            if (!isset($devicesByCat[$category])) {
                $devicesByCat[$category] = [];
            }
            $devicesByCat[$category][] = $device;
        }

        // Fetch device serial numbers, models, and tags
        $sno = Device::pluck('sno');
        $devModel = Device::pluck('model');
        $devTag = Device::pluck('tag');

        // Fetch other related Allocation records
        $allocations = Allocation::where('iden', $devrequest->iden)->get();

        // Pass data to the view
        return view('admin.allocate', compact('devrequest', 'allocations', 'devicesByCat', 'sno', 'devModel', 'devTag'));
    }

    /**
     * Store or update the allocation records based on Devrequest data.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request, $id)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'status' => 'required|string',
            'sno' => 'required|string',
            'devmodel' => 'required|string',
            'devtag' => 'required|string',
            'ADate' => 'required|date',
            'ERD' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Fetch Devrequest data based on ID
        $devrequest = Devrequest::findOrFail($id);

        // Get all related Allocation records
    
            Allocation::create([
                'iden' => $devrequest->iden,
                'fullname' => $devrequest->fullname,
                'email' => $devrequest->email,
                'phone' => $devrequest->phone,
                'dept' => $devrequest->dept,
                'type' => $devrequest->type,
                'PAD' => $devrequest->PAD,
                'SRD' => $devrequest->SRD,
                'fine' => $devrequest->fine,
                'status' => $request->input('status'),
                'sno' => $request->input('sno'),
                'devmodel' => $request->input('devmodel'),
                'devtag' => $request->input('devtag'),
                'event' => $devrequest->event,
                'ADate' => $request->input('ADate'),
                'ERD' => $request->input('ERD'),
            ]);
        
        $devrequest->status = 'Assigned';
        $devrequest->save();

        // Update the allocated device status to 'Unavailable'
        $devices = Device::where('sno', $request->input('sno'))->first();
        if ($devices) {
            $devices->status = 'Unavailable';
            $devices->save();
        }

        return redirect()->back()->with('success', 'You have successfully assigned a device for this request.');
    }

    public function getDeviceInfo($serial)
    {
        $device = Device::where('sno', $serial)->first();

        if($device) {
            return response()->json([
                'model' => $device->model,
                'tag' => $device->tag,
            ]);
        }

        return response()->json(null);
    }

    public function allocations(Request $request)

    {
        $allocations = Allocation::all();


    // Return a response or pass the data to the view
    return view('admin.allocations', compact('allocations'));

    }

    public function delete($id)
    {
        // Find the staff record by its ID
        $allocations = Allocation::find($id);

        // Check if the staff record exists
        if (!$allocations) {
            return back()->with('error', 'Allocation record not found.');
        }

        // Attempt to delete the staff record
        try {
            $allocations->delete();
            return back()->with('success', 'Allocation record deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error in deleting allocation record. Try again later.');
        }
    }

    public function edit($id)
    {
        $allocations = Allocation::find($id);

        // Fetch all available devices
        $devices = Device::where('status', 'Available')->get();

        // Manually group devices by their type
        $devicesByCat = [];
        foreach ($devices as $device) {
            $category = $device->category;
            if (!isset($devicesByCat[$category])) {
                $devicesByCat[$category] = [];
            }
            $devicesByCat[$category][] = $device;
        }

        // Fetch device serial numbers, models, and tags
        $sno = Device::pluck('sno');
        $devModel = Device::pluck('model');
        $devTag = Device::pluck('tag');

        return view('admin.allocedit', compact('allocations', 'devicesByCat', 'sno', 'devModel', 'devTag'));
    }

    public function update(Request $request, $id)
    {
        // Handle GET request to fetch the allocation record

        $allocations = Allocation::findOrFail($id);

        // Handle PUT request to update the allocation record
        $validatedData = $request->validate([

            'sno' => 'required|string',
            'devmodel' => 'required|string',
            'devtag' => 'required|string',

            // Add other validation rules as needed
        ]);

        $allocations->status = 'Active';
        $allocations->save();

        // Update the retuned device status to 'Unavailable'
        $devices = Device::where('sno', $request->input('sno'))->first();
        if ($devices) {
            $devices->status = 'Unavailable';
            $devices->save();
        }

        $devrequest = Devrequest::where('iden', $request->input('iden'))->first();
        if ($devrequest) {
            $devrequest->status = 'Assigned';
            $devrequest->save();
        }

        $allocations->update(array_filter($validatedData));


        return redirect()->route('admin.allocations.update', ['id' => $allocations->id])->with('success', 'You have successfully changed this alloction.');
    }


    public function myallocations(Request $request)
    {
        $Iden = Auth::guard('staff')->user()->iden;

        // Retrieve check-in information for the authenticated user's sender_id
        $allocations = Allocation::where('iden', $Iden)->get();

    // Return a response or pass the data to the view
    return view('staff.myallocations', compact('allocations'));
    }
    public function generatePDF()
    {
        // Retrieve participant information
        $staff = Auth::guard('staff')->user();
        $Iden = $staff->iden;
        $allocations = Allocation::where('iden', $Iden)->get();


        // Create a new Dompdf instance
        $pdf = new Dompdf();

        // Load the HTML content for the PDF
        $html = view('staff.pdf', compact('staff', 'allocations'))->render();

        // Load HTML content into Dompdf
        $pdf->loadHtml($html);

        // Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Render PDF
        $pdf->render();

        // Output the generated PDF (force download)
        return $pdf->stream('staff_details.pdf');
    }
    public function export()
    {
        return Excel::download(new AllocationsExport, 'allocations.xlsx');
    }

}
