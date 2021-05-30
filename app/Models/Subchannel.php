<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BusinessSector;
use App\Models\Channel;

class Subchannel extends Model
{
    use HasFactory;
    protected $table = 'subchannels';
    protected $fillable = ['channel_id','sub_channel'];

    public function sectors(){
        return $this->belongsTo(BusinessSector::class,'sector_id');
    }
    public function channels(){
        return $this->belongsTo(Channel::class,'channel_id')->select('channels.*','business_sectors.sector_name')->join('business_sectors','business_sectors.id','=','channels.sector_id');
    }
}
