<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = 'contact_id';

    use HasFactory;
  
    protected $fillable = [
        'first_name', 'last_name', 'contact_no', 'user_id'
    ];

}