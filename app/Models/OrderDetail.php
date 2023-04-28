<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id')->withDefault();
    }
    public function book()
    {
        return $this->belongsTo('App\Models\Book', 'book_id')->withDefault();
    }
}
