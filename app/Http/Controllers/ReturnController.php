<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Devreturn;
use App\Models\Allocation;
use App\Models\Devrequest;
use Illuminate\Http\Request;
use App\Exports\DevreturnExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class ReturnController extends Controller
{
    

    public function return($id)
    {
        // Fetch the Devreturn record
        $devreturn = Devreturn::findOrFail($id);

        // Fetch other related Allocation records
        $allocations = Allocation::where('sno', $devreturn->sno)->get();

        // Pass data to the view
        return view('admin.return', compact('devreturn', 'allocations'));
    }

    public function store(Request $request, $id)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'RDate' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Fetch Allocation data based on ID
        $allocation = Allocation::findOrFail($id);

        // Create Devreturn entry
        Devreturn::create([
            'iden' => $allocation->iden,
            'fullname' => $allocation->fullname,
            'email' => $allocation->email,
            'phone' => $allocation->phone,
            'dept' => $allocation->dept,
            'type' => $allocation->type,
            'PAD' => $allocation->PAD,
            'SRD' => $allocation->SRD,
            'fine' => $allocation->fine,
            'status' => $allocation->status,
            'sno' => $allocation->sno,
            'devmodel' => $allocation->devmodel,
            'devtag' => $allocation->devtag,
            'event' => $allocation->event,
            'ADate' => $allocation->ADate,
            'ERD' => $allocation->ERD,
            'RDate' => $request->input('RDate'),
        ]);

        // Update allocation status to 'Returned'
        $allocation->status = 'Returned';
        $allocation->save();

        // Update the device status to 'Available'
        $device = Device::where('sno', $allocation->sno)->first();
        if ($device) {
            $device->status = 'Available';
            $device->save();
        }

        // Update Devrequest status
        $devrequest = Devrequest::where('email', $allocation->email)->first();
        if ($devrequest) {
            $devrequest->status = 'Completed';
            $devrequest->save();
        }

        return redirect()->back()->with('success', 'Device has been successfully returned.');
    }

    public function allreturns(Request $request)
    {
        $devreturn = Devreturn::all();

        // Return a response or pass the data to the staff view
        return view('admin.returns', compact('devreturn'));
    }

    public function myreturns(Request $request)
    {
        $Iden = Auth::guard('staff')->user()->iden;

        // Retrieve check-in information for the authenticated user's iden
        $devreturn = Devreturn::where('iden', $Iden)->get();

        // Return a response or pass the data to the view
        return view('staff.myreturns', compact('devreturn'));
    }
    public function export()
    {
        return Excel::download(new DevreturnExport, 'Returns.xlsx');
    }
}
