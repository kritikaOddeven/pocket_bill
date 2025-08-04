<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = 'bills';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','cust_id','bill_no','date','estimated_total','cgst','sgst','total','type'];

    public function billDetails()
    {
        return $this->hasMany('App\BillDetails','bill_id','id');
    }

    public function customerDetails()
    {
        return $this->hasOne('App\Customers','id','cust_id');
    }
}
