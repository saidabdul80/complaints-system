<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complaints_response extends Model
{
    use HasFactory;
    protected $fillable = ['complaints_ID', 'response', 'date_time', 'is_user'];

    protected $table = 'complaints_response';
}
