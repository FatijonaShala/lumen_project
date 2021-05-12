<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_details extends Model
{
    //

  protected $fillable = [
        'phone', 'adress'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
