<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded =[];
    protected $table ='bills';


    public function billItems(){
        return  $this->hasMany('App\Models\BillItem');
    }

    public function customer(){
        return  $this->belongsTo('App\Models\Customer');
    }

}
