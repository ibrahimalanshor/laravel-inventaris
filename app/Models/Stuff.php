<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'spec', 'location', 'condition', 'origin', 'description', 'total', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getConditionLabelAttribute()
    {
    	switch ($this->condition) {
    		case 'baru':
    			return 'success';
    			break;
    		case 'bekas':
    			return 'warning';
    			break;
    		default:
    			return 'danger';
    			break;
    	}
    }
}
