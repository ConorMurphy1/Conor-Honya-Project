<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id')->withDefault();
    }
}
