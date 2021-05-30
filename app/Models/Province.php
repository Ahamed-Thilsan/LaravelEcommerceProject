<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;
class Province extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    protected $fillable = ['province_name'];

    public function district(){
        return $this->hasMany(District::class,'province_id');
    }

    public function towns(){
        return $this->hasMany(Town::class,'province_id');
    }
}
