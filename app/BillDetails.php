<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetails extends Model
{
    protected $table = 'bill_details';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','cust_id','bill_id','cat_id','subcat_id','name','hsncode','number','feet','feet_word','single_price','total_price'];
}
