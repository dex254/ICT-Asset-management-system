<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devreturn extends Model
{
    use HasFactory;

    protected $fillable = [
         'iden',
         'fullname',
         'email',
         'phone',
         'dept',
         'type',
         'PAD',
         'SRD',
         'status',
         'fine',
         'sno',
         'devmodel',
         'devtag',
         'event',
         'ADate',
         'ERD',
         'RDate',
     ];
     public function allaocation()
    {
        return $this->belongsTo(Allocation::class);
    }
}
