<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BusinessSector;

class Channel extends Model
{
    use HasFactory;
    protected $table = 'channels';
    protected $fillable = ['sector_id','channel_name'];

    public function sector(){
        return $this->belongsTo(BusinessSector::class,'sector_id');
    }


}
