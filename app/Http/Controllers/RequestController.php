<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Devrequest;
use Illuminate\Http\Request;
use App\Exports\DevrequestExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RequestController extends Controller
{
    public function devrequest()
    {

        return view('staff.request');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string',
            'iden' => 'required|exists:staff,iden',
            'email' => 'required|exists:staff,email',
            'phone' => 'required|exists:staff,phone',
            'dept' => 'required|string',
            'type' => 'required|string',
            'event' => 'required|string',
            'PAD' => 'required|date',
            'SRD' => 'required|date',
            'status' => 'required|string',
            'fine' => 'nullable|string',
        ]);

        $validatedData['type'] = json_encode($validatedData['type']);

        $devrequest = new Devrequest();
        $devrequest->fill($validatedData);
        $devrequest->save();

        return redirect()->back()->with('success', 'You have successfully made a request for a device.');
    }

    public function requestview(Request $request)

    {
    $devrequest = $request->devrequest;


    // Return a response or pass the data to the view
    return view('admin.requests', compact('devrequest'));

    }

    public function myrequests(Request $request)
    {
        $Iden = Auth::guard('staff')->user()->iden;

        // Retrieve request information for the authenticated user's sender_id
        $devrequest = Devrequest::where('iden', $Iden)->get();

    // Return a response or pass the data to the view
    return view('staff.requests', compact('devrequest'));
    }


    public function cancel($id)
    {
        $devrequest = Devrequest::findOrFail($id);

        // Check devreuqest status
        if ($devrequest->status === 'Pending') {

            $devrequest->status = 'Cancelled';
            $devrequest->save();

            return redirect()->back()->with('success', 'Request has been cancelled.');
        } else {
            return redirect()->back()->with('error', 'Request can only be cancelled if it is pending.');
        }
    }

    public function decline($id)
    {
        $devrequest = Devrequest::findOrFail($id);

        // Check devreuqest status
        if ($devrequest->status === 'Pending') {

            $devrequest->status = 'Declined';
            $devrequest->save();

            return redirect()->back()->with('success', 'Request has been declined.');
        } else {
            return redirect()->back()->with('error', 'Request can only be declined if it is pending.');
        }
    }

    public function confirmalloc($id)
    {
        $devrequest = Devrequest::findOrFail($id);

        // Check devreuqest status
        if ($devrequest->status === 'Assigned') {

            $devrequest->status = 'Allocated';
            $devrequest->save();

            return redirect()->back()->with('success', 'Request has been succefully allocated.');
        } else {
            return redirect()->back()->with('error', 'Request can only be rightfully allocated if it is already assigned.');
        }
    }
    public function export()
    {
        return Excel::download(new DevrequestExport, 'Requests.xlsx');
    }


}
