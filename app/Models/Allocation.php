<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    use HasFactory;

    protected $table = 'allocations';

    protected $fillable = [
       'fullname',
        'iden',
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
        'ERD'
    ];
   /**
     * Define a relationship with the Devrequest model.
     */
    public function devrequest()
    {
        return $this->belongsTo(Devrequest::class);
    }

    /**
     * Update the allocation with new data.
     *
     * @param array $data
     * @return bool
     */
    public function updateFromRequest(array $data)
    {
        $this->sno = $data['status'];
        $this->sno = $data['sno'];
        $this->devmodel = $data['devmodel'];
        $this->devtag = $data['devtag'];
        $this->ADate = $data['ADate'];
        $this->ERD = $data['ERD'];

        return $this->save();
    }

}
