<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToTenant;

class Treatment extends Model
{
    use HasFactory, BelongsToTenant;
    use SoftDeletes;
    protected $guarded =[];

    public function horse(){
        return $this->belongsTo(Horse::class);
    }

    public function last_updated_by(){
        return  $this->belongsTo(User::class,"last_updated_by");
    }

}
