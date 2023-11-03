<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToTenant;


class Owner extends Model
{
    use HasFactory, BelongsToTenant, SoftDeletes;
    use SoftDeletes;
    protected $guarded =[];

    public function horse(){

        return $this->belongsToMany(Horse::class);
    }
}
