<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Channel;
use App\Models\Subchannel;

class BusinessSector extends Model
{
    use HasFactory;

    protected $table = 'business_sectors';
    protected $fillable = ['sector_name'];

    public function channel(){
        return $this->hasMany(Channel::class,'sector_id');
    }
    public function subchannel(){
        return $this->hasMany(Subchannel::class,'channel_id');
    }
}
