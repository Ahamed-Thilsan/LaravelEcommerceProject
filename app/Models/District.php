<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
use App\Models\Town;
class District extends Model
{
    use HasFactory;
    protected $table = 'districts';
    protected $fillable = ['province_id','district_name'];

    public function province(){
        return $this->belongsTo(Province::class,'province_id');
    }

    public function towns(){
        return $this->hasMany(Town::class,'province_id');
    }
}
