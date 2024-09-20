<?php

namespace App\Exports;

use App\Models\Devreturn;
use Maatwebsite\Excel\Concerns\FromCollection;

class DevrequestExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Devreturn::all();
    }
}
