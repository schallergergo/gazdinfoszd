<?php

namespace App\Models;

use App\Models\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HorseMessage extends Model
{
    use HasFactory, BelongsToTenant, SoftDeletes;

    protected $guarded = [];

    public function horse(){
        return $this->belongsTo(Horse::class);
    }

        public function user(){
        return $this->belongsTo(User::class);

    }

     public function toUser(){
        return $this->belongsTo(User::class,"to_user_id");
        
    }
}
