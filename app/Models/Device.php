<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

  protected $fillable = [
            'image_name1',
            'image_name2',
            'image_name3',
            'model',
            'desc',
            'sno',
            'tag',
            'category',
            'status',
            'con'

        ];

}
