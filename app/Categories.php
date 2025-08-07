<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','name'];

    public function subcategories()
    {
        return $this->hasMany(Subcategories::class, 'cat_id');
    }
}
