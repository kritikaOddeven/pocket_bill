<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','name','address','city','gst_no','mobile_no','bank_branch','bank_ac_no','bank_ifsc'];
}
