<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\Province;

class Town extends Model
{
    use HasFactory;
    protected $table = 'towns';
    protected $fillable = ['district_id','town_code','town_name'];

    public function provinces(){
        return $this->belongsTo(Province::class,'district_id');
    }

    public function districts(){
        return $this->belongsTo(District::class,'district_id');
    }


    //dis belogone to
    //pro

}
