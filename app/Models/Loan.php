<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['stuff_id', 'name', 'condition', 'total', 'loan_date', 'return_date', 'status'];

    public function getStatusLabelAttribute()
    {
    	return $this->status ? 'success' : 'primary';
    }

    public function getStatusTextAttribute()
    {
    	return $this->status ? 'Dikembalikan' : 'Dipinjam';
    }

    public function getLoanDateNormalAttribute()
    {
    	return date('d M Y', strtotime($this->loan_date));
    }

    public function getReturnDateNormalAttribute()
    {
    	return date('d M Y', strtotime($this->return_date));
    }

    public function stuff()
    {
    	return $this->belongsTo(Stuff::class);
    }
}
