<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use HasFactory,SoftDeletes;
    // protected $table='categories' ;
    protected $guarded = [];

      // One level child
      public function child() {
        return $this->hasMany(Categories::class, 'parent_id');
    }

    // Recursive children
    public function children() {
        return $this->hasMany(Categories::class, 'parent_id')->with('children');
    }

    // One level parent
    public function parent() {
        return $this->belongsTo(Categories::class, 'parent_id');
    }

    // Recursive parents
    public function parents() {
        return $this->belongsTo(Categories::class, 'parent_id')->with('parent');
    }


}
