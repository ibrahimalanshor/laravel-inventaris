<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'total', 'supplier_id', 'stuff_id'];

    public function stuff()
    {
    	return $this->belongsTo(Stuff::class);
    }

    public function supplier()
    {
    	return $this->belongsTo(Supplier::class);
    }

}
