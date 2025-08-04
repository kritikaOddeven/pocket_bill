<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    protected $table = 'subcategories';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','cat_id','name'];
}
