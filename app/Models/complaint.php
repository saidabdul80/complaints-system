<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complaint extends Model
{
    use HasFactory;
     protected $fillable = ['email','fname','matric_number','title','complaints','complaints_ID'];
     public function sub_complaints()
     {
     	return $this->hasMany(Complaints_response::class,'complaints_ID','complaints_ID');
     }
}
