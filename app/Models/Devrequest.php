<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devrequest extends Model
{
    use HasFactory;

    protected $table = 'devrequest';

    protected $fillable = [
        'fullname',
        'iden',
        'email',
        'phone',
        'dept',
        'type',
        'event',
        'PAD',
        'SRD',
        'status',
        'fine',
    ];

    public function getTypeFormattedAttribute()
    {
        $typeString = json_encode($this->type);

        // Remove all punctuation except commas
        $formattedType = preg_replace('/[^\w\s,]/', '', $typeString);

        return $formattedType;
    }

}

