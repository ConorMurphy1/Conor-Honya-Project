<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function author()
    {
        return $this->belongsTo('App\Models\Author', 'author_id')->withDefault();
    }

    public function categories()
    {
        return $this->hasMany(BookCategory::class);
    }
}
