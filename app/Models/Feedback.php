<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'staffiden',
        'staffname',
        'staffphone',
        'staffemail',
        'date',
        'subject',
        'message',
        'reply',
        'replydate',
        'adminname',
        'adminphone',
        'adminemail',

    ];
}
