<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DatabaseController extends Controller
{
    public function downloadDump()
    {
        // Find the latest SQL dump file
        $files = Storage::files();
        $sqlFiles = array_filter($files, function ($file) {
            return strpos($file, '.sql') !== false;
        });

        if (empty($sqlFiles)) {
            return redirect()->back()->with('error', 'No SQL dump files found.');
        }

        // Get the latest file
        $latestFile = max($sqlFiles);
        $filename = basename($latestFile);

        return response()->download(storage_path('app/' . $filename));
    }
}
